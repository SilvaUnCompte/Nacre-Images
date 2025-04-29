<?php

if (!isset($_GET['path'])) {
    echo json_encode(['error' => 'Missing path']);
    exit;
}

$path = ROOT_DIR . "/assets/images/" . $_GET['path'] . "/";

// Prevent directory traversal attacks
if (strpos(realpath($path), realpath(ROOT_DIR . "/assets/images/")) !== 0) {
    echo json_encode(['P\'ti malin' => 't\'essayer de faire quoi la hein ?']);
    exit;
}

echo json_encode(array_diff(scandir($path), array('.', '..')));

?>