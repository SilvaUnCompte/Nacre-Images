<?php

if (!isset($_GET['path'])) {
    echo json_encode(['error' => 'Missing path']);
    exit;
}

$path = $_SERVER['DOCUMENT_ROOT'] . $_GET['path'];

echo json_encode(array_diff(scandir($path), array('.', '..')));

?>