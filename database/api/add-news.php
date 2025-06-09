<?php
header('Content-Type: application/json');

if (session_status() !== PHP_SESSION_ACTIVE) session_start();
if (!isset($_SESSION['email'])) {
    header("Location: /dashboard/login");
    exit();
}

require(ROOT_DIR . '/database/connexion.php');
require_once(ROOT_DIR . '/database/tables/news.php');

if (!isset($_POST['title']) || !isset($_POST['info']) || !isset($_POST['start_date']) || !isset($_POST['end_date']) || !isset($_POST['visible'])) {
    echo json_encode(['error' => 'title, info, start_date, end_date and visible parameters are required']);
    exit;
}

$title = $_POST['title'];
$info = $_POST['info'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$visible = $_POST['visible'];

News::create($title, $info, $start_date, $end_date, $visible);

echo json_encode(['success' => true]);