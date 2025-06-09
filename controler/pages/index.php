<?php

require_once(ROOT_DIR . '/database/tables/news.php');

$page_name = 'Page d\'accueil';
$description = 'Depuis 2009, autour de Caen, je vous accueille pour vous former à la photographie durant une ou plusieurs sessions de cours photos. Les stages photos en groupe ou en individuel abordent de nombreux thèmes. Ludiques et pédagogiques, ils sont à la portée de tous.';
$carrousel_img_dir = 'carrousel-home';

$visibleNews = News::getVisibleNews();

include(ROOT_DIR."/public/html/helpers/header.php");
include(ROOT_DIR."/public/html/home.php");
include(ROOT_DIR."/public/html/helpers/footer.html");
