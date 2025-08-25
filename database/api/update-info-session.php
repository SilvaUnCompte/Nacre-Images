<?php
header('Content-Type: application/json');

if (session_status() !== PHP_SESSION_ACTIVE) session_start();
if (!isset($_SESSION['email'])) {
    header("Location: /dashboard/login");
    exit();
}

require(ROOT_DIR . '/database/connexion.php');
require_once(ROOT_DIR . '/database/tables/workshop_session.php');

if (!isset($_POST["session_id"]) || !isset($_POST['additional_information']) || !isset($_POST['date'])) {
    echo json_encode(['error' => 'session_id, additional_information and date parameters are required']);
    exit;
}


$ws = new WorkshopSession($_POST["session_id"]);
$ws->setAdditionnalInformation($_POST['additional_information']);
$ws->setDate($_POST['date']);
$ws->update();

echo json_encode(['success' => true]);