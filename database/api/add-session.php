<?php
header('Content-Type: application/json');

if (session_status() !== PHP_SESSION_ACTIVE) session_start();
if (!isset($_SESSION['email'])) {
    header("Location: /dashboard/login");
    exit();
}

require($_SERVER['DOCUMENT_ROOT'] . '/database/connexion.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/database/tables/workshop_session.php');

if (!isset($_POST['date']) || !isset($_POST['topic']) || !isset($_POST['additional_information'])) {
    echo json_encode(['error' => 'date, topic and additional_information parameters are required']);
    exit;
}

$date = $_POST['date'];
$topic = $_POST['topic'];
$additional_information = $_POST['additional_information'];

WorkshopSession::create($topic, $date, $additional_information);

echo json_encode(['success' => true]);