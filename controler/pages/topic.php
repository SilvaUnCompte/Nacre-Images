<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/database/tables/workshop_type.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/database/tables/prices.php');

if(!isset($topic_id)) {
    http_response_code(404);
    require $_SERVER['DOCUMENT_ROOT'] . '/controler/404.php';
    return;
}

$price_list = Prices::getAll();
$workshop_type = new WorkshopType($topic_id);

$page_name = $workshop_type->getPageName();
$description = $workshop_type->getSeoDesc();
$image = '/assets/images/topics/' . $workshop_type->getImgName();
$alt_image = $workshop_type->getImgAlt();
$topic = $workshop_type->getBigTitle();
$title = $workshop_type->getSmallTitle();


$typesNames = [
    0 => 'Groupe',
    1 => 'Individuel',
    2 => 'Spécial'
];

$paragraph = preg_replace_callback('/\{(\d+(\+|\_|\*))\}/', function ($matches) use ($price_list, $typesNames) {
    $id = $matches[1];
    $price = array_filter($price_list, function ($price) use ($id) {
        return $price['id'] == substr($id, 0, -1);
    });
    $price = reset($price);

    if (!$price) {
        return $matches[0];
    }

    if (str_ends_with($id, '*')) {
        return $price['price'] . ' €';
    } elseif (str_ends_with($id, '_')) {
        return $price['label'];
    } elseif (str_ends_with($id, '+')) {
        return $typesNames[$price['type']] ?? $matches[0];
    }

    return $matches[0];
}, $workshop_type->getParagraph());


$contact_button = true;

include($_SERVER['DOCUMENT_ROOT'] . "/public/html/helpers/header.php");
include($_SERVER['DOCUMENT_ROOT'] . "/public/html/topic.php");
include($_SERVER['DOCUMENT_ROOT'] . "/public/html/helpers/footer.html");
