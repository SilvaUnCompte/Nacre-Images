<?php
header('Content-Type: application/json');

if (session_status() !== PHP_SESSION_ACTIVE) session_start();
if (!isset($_SESSION['email'])) {
    header("Location: /dashboard/login");
    exit();
}

require($_SERVER['DOCUMENT_ROOT'] . '/database/connexion.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/database/tables/workshop_session.php');


if (!isset($_GET["start_date"])) {
    echo json_encode(['error' => 'start_date parameter is required']);
    exit;
}
$start_date = $_GET["start_date"];

$end_date = null;
if (isset($_GET["end_date"]) && !empty($_GET["end_date"])) {
    $end_date = $_GET["end_date"];
} else {
    $end_date = date('9999-12-31');
}

$all_future_session = WorkshopSession::getFutureSessionByDate($start_date);

if ($all_future_session) {
    echo json_encode($all_future_session);
} else {
    echo json_encode(['message' => 'No upcoming sessions found']);
}
?>