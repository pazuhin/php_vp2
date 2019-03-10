<?php
require __DIR__ . '/../vendor/autoload.php';
define('SRC_DIRECTORY', realpath(__DIR__ . '/../src'));
require_once SRC_DIRECTORY . '/Tools/Application.php';
$app = new Application();

try {
    $app->run();
} catch (Exception $e) {
    echo $e->getMessage();
}




