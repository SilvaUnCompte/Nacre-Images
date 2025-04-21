<?php

$page_name = 'Chèque cadeau';
$description = 'Offrez un chèque cadeau pour un stage photo avec Nacre-Images. Vous pouvez choisir le montant du chèque cadeau et le personnaliser.';

$header_title_p1 = 'Séances Photo à ';
$header_title_p2 = 'domicile';
$header_text = "Vous souhaitez une séance photo en conditions studio mais à votre domicile? Pas de soucis, je me déplace avec mon matériel pour réaliser vos portraits. Durant la séance, vous aurez la possibilité de jouer les modèles en toute tranquillité.";
$carrousel_img_dir = 'carrousel-studio';

include($_SERVER['DOCUMENT_ROOT'] . "/public/html/helpers/header.php");
include($_SERVER['DOCUMENT_ROOT'] . "/public/html/helpers/second-header.php");
include($_SERVER['DOCUMENT_ROOT'] . "/public/html/studio.php");
include($_SERVER['DOCUMENT_ROOT'] . "/public/html/helpers/footer.html");
