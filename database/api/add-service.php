<?php
header('Content-Type: application/json');

if (session_status() !== PHP_SESSION_ACTIVE) session_start();
if (!isset($_SESSION['email'])) {
    header("Location: /dashboard/login");
    exit();
}

require($_SERVER['DOCUMENT_ROOT'] . '/database/connexion.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/database/tables/services.php');

if (!isset($_POST['price']) || !isset($_POST['label']) || !isset($_POST['description']) || !isset($_POST['type']) || !isset($_POST['link']) || !isset($_POST['url'])) {
    echo json_encode(['success' => false, 'error' => 'Missing parameters']);
    exit();
}

$price = $_POST['price'];
$label = $_POST['label'];
$description = $_POST['description'];
$type = $_POST['type'];
$link = $_POST['link'];
$url = $_POST['url'];

Services::create($label, $description, $price, $link, $url, $type);

echo json_encode(['success' => true]);