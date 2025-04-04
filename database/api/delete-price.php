<?php
header('Content-Type: application/json');

if (session_status() !== PHP_SESSION_ACTIVE) session_start();
if (!isset($_SESSION['email'])) {
    header("Location: /dashboard/login");
    exit();
}

require($_SERVER['DOCUMENT_ROOT'] . '/database/connexion.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/database/tables/prices.php');


if (!isset($_GET["id"])) {
    echo json_encode(['error' => 'id parameter is required']);
    exit;
}


$id = $_GET["id"];
Prices::delete_by_id($id);

echo json_encode(['success' => true]);