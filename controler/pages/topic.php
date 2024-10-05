<?php

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo json_encode(['error' => 'Missing id']);
    exit;
}

require_once($_SERVER['DOCUMENT_ROOT'] . '/database/tables/workshop_type.php');

$workshop_type = new WorkshopType($_GET['id']);

$page_name = $workshop_type->getPageName();
$description = $workshop_type->getSeoDesc();
$image = '/assets/images/topics/' . $workshop_type->getImgName();
$alt_image = $workshop_type->getImgAlt();
$topic = $workshop_type->getBigTitle();
$title = $workshop_type->getSmallTitle();
$paragraph = $workshop_type->getParagraph();

include($_SERVER['DOCUMENT_ROOT'] . "/public/html/helpers/header.php");
include($_SERVER['DOCUMENT_ROOT'] . "/public/html/topic.php");
include($_SERVER['DOCUMENT_ROOT'] . "/public/html/helpers/footer.html");
