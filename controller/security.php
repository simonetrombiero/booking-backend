<?php
/*Verifica che la pagina sia stata raggiunta passando per la index e non direttamente*/
function antiHack() {
    if (!defined('sito')) {
        ob_clean();
        header("location: index.php");
        exit;
    }
}