<?php

require_once(ROOT_DIR . '/database/tables/prices.php');

$page_name = 'Chèque cadeau';
$description = 'Chèque cadeau stage photo. Offrez un chèque cadeau pour un stage photo avec Nacre-Images. Vous pouvez choisir le montant du chèque cadeau et le personnaliser.';

$header_title_p1 = 'Comment obtenir un ';
$header_title_p2 = 'chèque cadeau ?';
$header_text = "Pour Noël, un anniversaire ou toute autre occasion, offrez un chèque cadeau pour un stage photo ! L'idée n'est pas de bloquer le bénificiaire sur un stage photo précis, mais de lui laisser le choix de la date et du stage.";

$prices = Prices::getAll();

include(ROOT_DIR . "/public/html/helpers/header.php");
// include(ROOT_DIR . "/public/html/helpers/second-header.php");
include(ROOT_DIR . "/public/html/gift.html");
include(ROOT_DIR . "/public/html/price.php");
include(ROOT_DIR . "/public/html/helpers/footer.html");
