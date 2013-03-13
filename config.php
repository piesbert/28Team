<?php
session_start();
header('Cache-control: private'); // IE 6 fix

function baseLoader($className) {
    include_once(strtolower($className) . ".php");
}

spl_autoload_register('baseLoader');

include_once 'language.php';
?>