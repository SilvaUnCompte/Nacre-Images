<?php

$page_name = 'Prestations';
$description = 'Prestations de Nacre-Images. Photo à domicile. Les stages photo en Normandie, les formations photo et les reportages photo.';

$header_title_p1 = 'Services ';
$header_title_p2 = 'Photographiques';
$header_text = "L'organisation de stages photographiques est mon activité principale, mais je peux également réaliser différents types de prestations. Je m'attache à créer une ambiance et à vous procurer des photos originales et esthétiques.";

require_once($_SERVER['DOCUMENT_ROOT'] . '/database/tables/services.php');
$services = Services::getAll();
$services_section_0 = array_filter($services, function ($service) {
    return $service['page_part'] == 0;
});
$services_section_1 = array_filter($services, function ($service) {
    return $service['page_part'] == 1;
});
$services_section_2 = array_filter($services, function ($service) {
    return $service['page_part'] == 2;
});

include($_SERVER['DOCUMENT_ROOT'] . "/public/html/helpers/header.php");
include($_SERVER['DOCUMENT_ROOT'] . "/public/html/helpers/second-header.php");
include($_SERVER['DOCUMENT_ROOT'] . "/public/html/services.php");
include($_SERVER['DOCUMENT_ROOT'] . "/public/html/helpers/footer.html");