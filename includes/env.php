<?php
/**
 * Mini parser .env senza dipendenze.
 * Carica le variabili nel superglobale $_ENV e le rende disponibili via env().
 */

if (!function_exists('env')) {

    function loadEnv($path) {
        if (!is_readable($path)) {
            return false;
        }

        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            $line = trim($line);
            if ($line === '' || $line[0] === '#') {
                continue;
            }

            $eqPos = strpos($line, '=');
            if ($eqPos === false) {
                continue;
            }

            $name  = trim(substr($line, 0, $eqPos));
            $value = trim(substr($line, $eqPos + 1));

            // Strip wrapping quotes (single or double)
            $len = strlen($value);
            if ($len >= 2) {
                $first = $value[0];
                $last  = $value[$len - 1];
                if (($first === '"' && $last === '"') || ($first === "'" && $last === "'")) {
                    $value = substr($value, 1, -1);
                }
            }

            if (!array_key_exists($name, $_ENV)) {
                $_ENV[$name] = $value;
            }
        }

        return true;
    }

    function env($key, $default = null) {
        if (array_key_exists($key, $_ENV)) {
            return $_ENV[$key];
        }
        $val = getenv($key);
        return $val === false ? $default : $val;
    }

    // Auto-load del file .env nella root del progetto
    loadEnv(__DIR__ . '/../.env');
}
