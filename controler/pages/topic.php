<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/database/tables/workshop_type.php');

if(!isset($topic_id)) {
    http_response_code(404);
    require $_SERVER['DOCUMENT_ROOT'] . '/controler/404.php';
    return;
}

$workshop_type = new WorkshopType($topic_id);

$page_name = $workshop_type->getPageName();
$description = $workshop_type->getSeoDesc();
$image = '/assets/images/topics/' . $workshop_type->getImgName();
$alt_image = $workshop_type->getImgAlt();
$topic = $workshop_type->getBigTitle();
$title = $workshop_type->getSmallTitle();
$paragraph = $workshop_type->getParagraph();

$contact_button = true;

include($_SERVER['DOCUMENT_ROOT'] . "/public/html/helpers/header.php");
include($_SERVER['DOCUMENT_ROOT'] . "/public/html/topic.php");
include($_SERVER['DOCUMENT_ROOT'] . "/public/html/helpers/footer.html");
