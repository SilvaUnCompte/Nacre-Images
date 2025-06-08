<?php
header('Content-Type: application/json');

if (session_status() !== PHP_SESSION_ACTIVE) session_start();
if (!isset($_SESSION['email'])) {
    header("Location: /dashboard/login");
    exit();
}

require(ROOT_DIR . '/database/connexion.php');
require_once(ROOT_DIR . '/database/tables/workshop_type.php');

if (!isset($_POST['page_name']) || !isset($_POST['name']) || !isset($_POST['url']) || !isset($_POST['regularity']) || !isset($_POST['image_name']) || !isset($_POST['image_calendar']) || !isset($_POST['image_alt']) || !isset($_POST['big_title']) || !isset($_POST['small_title']) || !isset($_POST['paragraph']) || !isset($_POST['seo_desc']) || !isset($_POST['rank'])) {
    echo json_encode(['error' => 'page_name, name, url, regularity, image_name, image_calendar, image_alt, big_title, small_title, paragraph and seo_desc parameters are required']);
    exit;
}

$name = $_POST['name'];
$page_name = $_POST['page_name'];
$seo_desc = $_POST['seo_desc'];
$image_name = $_POST['image_name'];
$image_calendar = $_POST['image_calendar'];
$image_alt = $_POST['image_alt'];
$big_title = $_POST['big_title'];
$small_title = $_POST['small_title'];
$paragraph = $_POST['paragraph'];
$url = $_POST['url'];
$regularity = $_POST['regularity'];
$rank = $_POST['rank'];

WorkshopType::create($name, $page_name, $seo_desc, $image_name, $image_calendar, $image_alt, $big_title, $small_title, $paragraph, $url, $regularity, $rank);

echo json_encode(['success' => true]);