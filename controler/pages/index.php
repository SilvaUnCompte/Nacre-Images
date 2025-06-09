<?php

require_once(ROOT_DIR . '/database/tables/news.php');

$page_name = 'Page d\'accueil';
$description = 'En groupe ou en individuel, mes sessions de formation accessibles à tous les photographes sont ludiques et pédagogiques. Depuis 2009, Gilles Quesnot, photographe professionel, donne des cours photo à Caen, en Normandie.';
$carrousel_img_dir = 'carrousel-home';

$visibleNews = News::getVisibleNews();

include(ROOT_DIR."/public/html/helpers/header.php");
include(ROOT_DIR."/public/html/home.php");
include(ROOT_DIR."/public/html/helpers/footer.html");
