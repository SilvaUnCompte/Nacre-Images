<?php

$request = $_SERVER['REQUEST_URI'];
// $_SERVER['DOCUMENT_ROOT'] = __DIR__;

switch ($request) {
    case '':
    case '/':
        require __DIR__ . '/controler/pages/index.php';
        break;

    case '/contact':
        require __DIR__ . '/controler/pages/contact.php';
        break;

    default:
        http_response_code(404);
        require __DIR__ . '/controler/404.php'; // TODO: faire tout le routing + changer les url dans les fichiers html
}
