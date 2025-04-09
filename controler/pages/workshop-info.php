<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/database/tables/workshop_type.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/database/tables/workshop_session.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/database/tables/prices.php');

$page_name = 'Liste des stages';
$description = 'Découvrez la liste des stages photo proposés par Nacre-Images. Vous pouvez choisir le stage qui vous convient le mieux en fonction de vos besoins et de votre niveau.';

$header_title_p1 = 'Liste des ';
$header_title_p2 = 'stages';
$header_text = "L'organisation de stages photo est mon activité principale. Cela peut être en groupe sur un thème donnée, ou en solo pour un stage personnalisé. N'hésitez pas à me demander si vous avez besoin de quelque chose de spécifique, je tâche d'être très flexible !";


$workshopTypes = WorkshopType::getAll();
$workshopSessions = WorkshopSession::getOneYearFutureSession();
$prices = Prices::getAll();

include($_SERVER['DOCUMENT_ROOT'] . "/public/html/helpers/header.php");
include($_SERVER['DOCUMENT_ROOT'] . "/public/html/helpers/second-header.php");
include($_SERVER['DOCUMENT_ROOT'] . "/public/html/workshop-info.php");
include($_SERVER['DOCUMENT_ROOT'] . "/public/html/price.php");
include($_SERVER['DOCUMENT_ROOT'] . "/public/html/helpers/footer.html");


// Note type :
// 0 : Régulier
// 1 : Exceptionnel
// 2 : Sur demande
// 3 : Semaine