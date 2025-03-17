<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/database/tables/prices.php');

$page_name = 'Chèque cadeau';
$description = 'Offrez un chèque cadeau pour un stage photo avec Nacre-Images. Vous pouvez choisir le montant du chèque cadeau et le personnaliser.';

$prices = Prices::getAll();

include($_SERVER['DOCUMENT_ROOT'] . "/public/html/helpers/header.php");
include($_SERVER['DOCUMENT_ROOT'] . "/public/html/gift.html");
include($_SERVER['DOCUMENT_ROOT'] . "/public/html/price.php");
include($_SERVER['DOCUMENT_ROOT'] . "/public/html/helpers/footer.html");
