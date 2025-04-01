<?php
header('Content-Type: application/json');

if (session_status() !== PHP_SESSION_ACTIVE) session_start();
if (!isset($_SESSION['email'])) {
    header("Location: /dashboard/login");
    exit();
}

require($_SERVER['DOCUMENT_ROOT'] . '/database/connexion.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/database/tables/workshop_session.php');

if (!isset($_POST["session_id"]) || !isset($_POST['additional_information'])) {
    echo json_encode(['error' => 'session_id and additional_information parameters are required']);
    exit;
}


$ws = new WorkshopSession($_POST["session_id"]);
$ws->setAdditionnalInformation($_POST['additional_information']);
$ws->update();

echo json_encode(['success' => true]);