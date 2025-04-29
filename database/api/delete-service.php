<?php
header('Content-Type: application/json');

if (session_status() !== PHP_SESSION_ACTIVE) session_start();
if (!isset($_SESSION['email'])) {
    header("Location: /dashboard/login");
    exit();
}

require(ROOT_DIR . '/database/connexion.php');
require_once(ROOT_DIR . '/database/tables/services.php');


if (!isset($_GET["id"])) {
    echo json_encode(['error' => 'id parameter is required']);
    exit;
}


$id = $_GET["id"];
Services::deleteById($id);

echo json_encode(['success' => true]);