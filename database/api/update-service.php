<?php
header('Content-Type: application/json');

if (session_status() !== PHP_SESSION_ACTIVE) session_start();
if (!isset($_SESSION['email'])) {
    header("Location: /dashboard/login");
    exit();
}

require($_SERVER['DOCUMENT_ROOT'] . '/database/connexion.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/database/tables/services.php');


if (!isset($_POST["id"]) || !isset($_POST['label']) || !isset($_POST['description']) || !isset($_POST['price']) || !isset($_POST['link']) || !isset($_POST['url'])) {
    echo json_encode(['error' => 'id, label, description, price, link and url parameters are required']);
    exit;
}

$ws = new Services($_POST["id"]);
$ws->setLabel($_POST['label']);
$ws->setDesc($_POST['description']);
$ws->setPrice($_POST['price']);
$ws->setLink($_POST['link']);
$ws->setUrl($_POST['url']);
$ws->update();

echo json_encode(['success' => true]);