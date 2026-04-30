<?php
/**
 * Rate limiter file-based, semplice ma efficace.
 * Strategia: sliding window di N secondi con max M richieste per chiave (di solito IP).
 *
 * Uso:
 *   if (!rate_limit_check('contact_form', $clientIp(), 5, 3600)) {
 *       // Too many requests
 *   }
 *
 * I file di stato vivono in cache/rate-limit/ (bloccato da .htaccess).
 */

if (!function_exists('rate_limit_check')) {

    function rate_limit_dir() {
        $dir = __DIR__ . '/../cache/rate-limit';
        if (!is_dir($dir)) {
            @mkdir($dir, 0700, true);
        }
        return $dir;
    }

    function rate_limit_client_ip() {
        // Ignoriamo intentionally proxy headers (X-Forwarded-For) per non essere spoofabili
        // a livello applicativo. Se il sito è dietro un reverse proxy fidato, configurarlo
        // per riscrivere REMOTE_ADDR via mod_remoteip a livello Apache.
        return $_SERVER['REMOTE_ADDR'] ?? 'unknown';
    }

    function rate_limit_check($bucket, $key, $maxRequests, $windowSeconds) {
        $dir = rate_limit_dir();
        if (!is_writable($dir) && !@mkdir($dir, 0700, true)) {
            // Se non possiamo scrivere il file di stato, non blocchiamo (fail-open)
            // ma loggare per visibilità.
            error_log("rate_limit: cache dir non scrivibile: $dir");
            return true;
        }

        $safeBucket = preg_replace('/[^a-z0-9_-]/i', '', $bucket);
        $safeKey    = hash('sha256', $key);
        $file       = $dir . '/' . $safeBucket . '_' . $safeKey . '.json';

        $fh = @fopen($file, 'c+');
        if ($fh === false) {
            error_log("rate_limit: impossibile aprire $file");
            return true; // fail-open
        }

        if (!flock($fh, LOCK_EX)) {
            fclose($fh);
            return true; // fail-open
        }

        $contents = stream_get_contents($fh);
        $state    = json_decode($contents, true);
        if (!is_array($state) || !isset($state['timestamps']) || !is_array($state['timestamps'])) {
            $state = ['timestamps' => []];
        }

        $now    = time();
        $cutoff = $now - $windowSeconds;

        // Drop entries fuori finestra
        $state['timestamps'] = array_values(array_filter(
            $state['timestamps'],
            function ($t) use ($cutoff) { return is_int($t) && $t >= $cutoff; }
        ));

        $allowed = count($state['timestamps']) < $maxRequests;
        if ($allowed) {
            $state['timestamps'][] = $now;
        }

        ftruncate($fh, 0);
        rewind($fh);
        fwrite($fh, json_encode($state));
        fflush($fh);
        flock($fh, LOCK_UN);
        fclose($fh);

        return $allowed;
    }
}
