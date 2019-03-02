<?php

define('SRC_DIRECTORY', realpath(__DIR__ . '/src'));
require_once SRC_DIRECTORY . '/Tools/Application.php';
$app = new Application();
var_dump($_SERVER["REQUEST_URI"]);
try {
    $app->run();
} catch (Exception $e) {
    echo $e->getMessage();
}




