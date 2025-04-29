<?php
header('Content-Type: application/json');

if (session_status() !== PHP_SESSION_ACTIVE) session_start();
if (!isset($_SESSION['email'])) {
    header("Location: /dashboard/login");
    exit();
}

require(ROOT_DIR . '/database/connexion.php');
require_once(ROOT_DIR . '/database/tables/workshop_session.php');


if (!isset($_GET["session_id"])) {
    echo json_encode(['error' => 'session_id parameter is required']);
    exit;
}


$session_id = $_GET["session_id"];
WorkshopSession::delete_by_id($session_id);

echo json_encode(['success' => true]);