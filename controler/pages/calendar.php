<?php

require_once(ROOT_DIR . '/database/tables/workshop_type.php');
require_once(ROOT_DIR . '/database/tables/workshop_session.php');

$page_name = 'Calendrier des stages';
$description = 'Le calendrier des stages photo à venir. Stage autour de Caen et en Normandie. Réservez ou faite une demande particulière par mail ou téléphone. Contactez Gilles Quesnot pour plus \'informations.';

$header_title_p1 = 'Calendrier des ';
$header_title_p2 = 'stages';
$header_text = "Vous trouverez ici la plannification des stages (en groupe) pour l'année à venir. Si vous avez la moindre question ou un besoin plus spécifique, contactez moi.";

$workshopTypes = WorkshopType::getAll();
$workshopSessions = WorkshopSession::getOneYearFutureSession();

include(ROOT_DIR . "/public/html/helpers/header.php");
include(ROOT_DIR . "/public/html/helpers/second-header.php");
include(ROOT_DIR . "/public/html/calendar.php");
include(ROOT_DIR . "/public/html/helpers/footer.html");