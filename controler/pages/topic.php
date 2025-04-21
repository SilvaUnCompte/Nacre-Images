<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/database/tables/workshop_type.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/database/tables/prices.php');

if (!isset($topic_id)) {
    http_response_code(404);
    require $_SERVER['DOCUMENT_ROOT'] . '/controler/404.php';
    return;
}

$workshop_type = new WorkshopType($topic_id);
$price_list = Prices::getAll();
$price_types_name = [
    0 => 'Groupe',
    1 => 'Individuel',
    2 => 'Spécial'
];

$page_name = $workshop_type->getPageName();
$description = $workshop_type->getSeoDesc();
$image = '/assets/images/illustrations/' . $workshop_type->getImgName();
$alt_image = $workshop_type->getImgAlt();
$topic = $workshop_type->getBigTitle();
$title = $workshop_type->getSmallTitle();
$carrousel_img_dir = 'carrousel-workshop/' . $workshop_type->getUrl();
$next_sessions = WorkshopType::getNextSession($workshop_type->getId());

$paragraph = preg_replace_callback('/\{(\d+(\+|\_|\*))\}/', function ($matches) use ($price_list, $price_types_name) {
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
        return $price_types_name[$price['type']] ?? $matches[0];
    }

    return $matches[0];
}, $workshop_type->getParagraph());


include($_SERVER['DOCUMENT_ROOT'] . "/public/html/helpers/header.php");
include($_SERVER['DOCUMENT_ROOT'] . "/public/html/topic.php");


$checkdir = $_SERVER['DOCUMENT_ROOT'] . '/assets/images/' . $carrousel_img_dir;
if (is_dir($checkdir)) {
    $images = array_diff(scandir($checkdir), ['..', '.']);

    if (!empty($images)) {
        echo '<h2 class="title-photo-example">Photo qu\'on pourrait faire</h2>';
    }
}
include($_SERVER['DOCUMENT_ROOT'] . "/public/html/carrousel.php");


include($_SERVER['DOCUMENT_ROOT'] . "/public/html/next-session.php");
include($_SERVER['DOCUMENT_ROOT'] . "/public/html/contact-button.php");
echo '</main>';
include($_SERVER['DOCUMENT_ROOT'] . "/public/html/helpers/footer.html");
