<?php

require_once(ROOT_DIR . '/database/tables/prices.php');

$page_name = 'Tarifs des stages';
$description = 'La liste des tarifs des stages photo. Les prix sont en fonction du type de stage. Contactez moi pour avoir des précisions sur le prix d\'un stage de photographie en normandie.';

$prices = Prices::getAll();

include(ROOT_DIR . "/public/html/helpers/header.php");
include(ROOT_DIR . "/public/html/price.php");
include(ROOT_DIR . "/public/html/helpers/footer.html");
