<?php
header('Content-Type: application/json');

if (session_status() !== PHP_SESSION_ACTIVE) session_start();
if (!isset($_SESSION['email'])) {
    header("Location: /dashboard/login");
    exit();
}

require($_SERVER['DOCUMENT_ROOT'] . '/database/connexion.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/database/tables/prices.php');


if (!isset($_POST["id"]) || !isset($_POST['label']) || !isset($_POST['description']) || !isset($_POST['price'])) {
    echo json_encode(['error' => 'id, label, description and price parameters are required']);
    exit;
}

$ws = new Prices($_POST["id"]);
$ws->setLabel($_POST['label']);
$ws->setDescription($_POST['description']);
$ws->setPrice($_POST['price']);
$ws->update();

echo json_encode(['success' => true]);