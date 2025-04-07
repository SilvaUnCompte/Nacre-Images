<?php
header('Content-Type: application/json');

if (session_status() !== PHP_SESSION_ACTIVE) session_start();
if (!isset($_SESSION['email'])) {
    header("Location: /dashboard/login");
    exit();
}

require($_SERVER['DOCUMENT_ROOT'] . '/database/connexion.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/database/tables/workshop_type.php');


if (!isset($_POST["id"]) || !isset($_POST['page_name']) || !isset($_POST['name']) || !isset($_POST['url']) || !isset($_POST['regularity']) || !isset($_POST['image_name']) || !isset($_POST['image_calendar']) || !isset($_POST['image_alt']) || !isset($_POST['big_title']) || !isset($_POST['small_title']) || !isset($_POST['paragraph']) || !isset($_POST['seo_desc'])) {
    echo json_encode(['error' => 'id, page_name, name, url, regularity, image_name, image_calendar, image_alt, big_title, small_title, paragraph and seo_desc parameters are required']);
    exit;
}


$ws = new WorkshopType($_POST["id"]);
$ws->setTopicName($_POST['name']);
$ws->setUrl($_POST['url']);
$ws->setRegularityType($_POST['regularity']);
$ws->setImgName($_POST['image_name']);
$ws->setImgCalendar($_POST['image_calendar']);
$ws->setImgAlt($_POST['image_alt']);
$ws->setBigTitle($_POST['big_title']);
$ws->setSmallTitle($_POST['small_title']);
$ws->setParagraph($_POST['paragraph']);
$ws->setSeoDesc($_POST['seo_desc']);
$ws->setPageName($_POST['page_name']);
$ws->update();

echo json_encode(['success' => 'Workshop updated successfully']);