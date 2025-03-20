<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/database/tables/prices.php');

$page_name = 'Tarifs des stages';
$description = 'La liste des tarifs des stages photo. Les prix sont en fonction du type de stage. Contactez moi pour avoir des précisions sur le prix d\'un stage de photographie en normandie.';

$prices = Prices::getAll();

include($_SERVER['DOCUMENT_ROOT'] . "/public/html/helpers/header.php");
include($_SERVER['DOCUMENT_ROOT'] . "/public/html/price.php");
include($_SERVER['DOCUMENT_ROOT'] . "/public/html/helpers/footer.html");
