<?php

if (!isset($_GET['path'])) {
    echo json_encode(['error' => 'Missing path']);
    exit;
}

$path = $_SERVER['DOCUMENT_ROOT'] . "/assets/images/" . $_GET['path'] . "/";

// Prevent directory traversal attacks
if (strpos(realpath($path), realpath($_SERVER['DOCUMENT_ROOT'] . "/assets/images/")) !== 0) {
    echo json_encode(['P\'ti malin' => 't\'essayer de faire quoi la hein ?']);
    exit;
}

echo json_encode(array_diff(scandir($path), array('.', '..')));

?>