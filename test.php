<?php
// Test file per verificare se PHP funziona
echo "PHP funziona correttamente!";
echo "<br>";
echo "Versione PHP: " . phpversion();
echo "<br>";
echo "Data corrente: " . date('Y-m-d H:i:s');

// Test sessioni
session_start();
if (session_status() === PHP_SESSION_ACTIVE) {
    echo "<br>Sessioni PHP: FUNZIONANTI";
} else {
    echo "<br>Sessioni PHP: NON FUNZIONANTI";
}

// Test percorsi
echo "<br>Directory corrente: " . __DIR__;
echo "<br>File includes esiste: " . (file_exists(__DIR__ . '/includes') ? 'SI' : 'NO');
echo "<br>File lang esiste: " . (file_exists(__DIR__ . '/lang') ? 'SI' : 'NO');
echo "<br>File it.php esiste: " . (file_exists(__DIR__ . '/lang/it.php') ? 'SI' : 'NO');
echo "<br>File en.php esiste: " . (file_exists(__DIR__ . '/lang/en.php') ? 'SI' : 'NO');

// Test caricamento file
echo "<br><br>Test caricamento file di lingua:";
try {
    if (file_exists(__DIR__ . '/lang/it.php')) {
        $translations = require __DIR__ . '/lang/it.php';
        echo "<br>File italiano caricato con successo - chiavi: " . count($translations);
    } else {
        echo "<br>ERRORE: File italiano non trovato";
    }
} catch (Exception $e) {
    echo "<br>ERRORE nel caricamento: " . $e->getMessage();
}
?>