<?php
/**
 * Token CSRF basato su sessione.
 * Richiede una sessione già avviata (vedi includes/language.php).
 */

if (!function_exists('csrf_token')) {

    function csrf_token() {
        if (empty($_SESSION['csrf_token']) || !is_string($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['csrf_token'];
    }

    function csrf_validate($submitted) {
        if (!is_string($submitted) || $submitted === '') {
            return false;
        }
        if (empty($_SESSION['csrf_token'])) {
            return false;
        }
        return hash_equals($_SESSION['csrf_token'], $submitted);
    }
}
