<?php
header('Content-Type: application/json');

if (session_status() !== PHP_SESSION_ACTIVE) session_start();
if (!isset($_SESSION['email'])) {
    header("Location: /dashboard/login");
    exit();
}

require(ROOT_DIR . '/database/connexion.php');
require_once(ROOT_DIR . '/database/tables/news.php');

if (!isset($_POST["id"]) || !isset($_POST['title']) || !isset($_POST['info']) || !isset($_POST['start_date']) || !isset($_POST['end_date']) || !isset($_POST['visible'])) {
    echo json_encode(['error' => 'id, title, info, start_date, end_date and visible parameters are required']);
    exit;
}

$news = new News($_POST["id"]);
$news->setTitle($_POST['title']);
$news->setInfo($_POST['info']);
$news->setStartDate($_POST['start_date']);
$news->setEndDate($_POST['end_date']);
$news->setVisible($_POST['visible']);
$news->update();

echo json_encode(['success' => true]);