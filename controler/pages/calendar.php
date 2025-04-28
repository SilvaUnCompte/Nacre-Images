<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/database/tables/workshop_type.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/database/tables/workshop_session.php');

$page_name = 'Calendrier des stages';
$description = 'Le calendrier des stages photo à venir. Réservez ou faite une demande particulière votre par mail ou téléphone. Contactez Gilles Quesnot pour plus d\'informations.';

$header_title_p1 = 'Calendrier des ';
$header_title_p2 = 'stages';
$header_text = "Vous trouverez la plannification des stages (en groupe) pour l'année à venir. Si vous avez la moindre question ou un besoin plus spécifique, n'hésitez pas à me contacter pour que l'on puisse s'arranger au mieux.";

$workshopTypes = WorkshopType::getAll();
$workshopSessions = WorkshopSession::getOneYearFutureSession();

include($_SERVER['DOCUMENT_ROOT'] . "/public/html/helpers/header.php");
include($_SERVER['DOCUMENT_ROOT'] . "/public/html/helpers/second-header.php");
include($_SERVER['DOCUMENT_ROOT'] . "/public/html/calendar.php");
include($_SERVER['DOCUMENT_ROOT'] . "/public/html/helpers/footer.html");