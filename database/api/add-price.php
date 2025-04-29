<?php
header('Content-Type: application/json');

if (session_status() !== PHP_SESSION_ACTIVE) session_start();
if (!isset($_SESSION['email'])) {
    header("Location: /dashboard/login");
    exit();
}

require(ROOT_DIR . '/database/connexion.php');
require_once(ROOT_DIR . '/database/tables/prices.php');

if (!isset($_POST['price']) || !isset($_POST['label']) || !isset($_POST['description']) || !isset($_POST['type'])) {
    echo json_encode(['error' => 'price, label, description and type parameters are required']);
    exit;
}

$price = $_POST['price'];
$label = $_POST['label'];
$description = $_POST['description'];
$type = $_POST['type'];

Prices::create($price, $label, $description, $type);

echo json_encode(['success' => true]);