<?php

$page_name = 'FAQ';
$description = 'Foire aux questions de Nacre-Images. Questions fréquentes sur les prestations photo, les stages photo, les chèques cadeaux.';

require_once($_SERVER['DOCUMENT_ROOT'] . '/database/tables/faq.php');

include($_SERVER['DOCUMENT_ROOT'] . "/public/html/helpers/header.php");
include($_SERVER['DOCUMENT_ROOT'] . "/public/html/faq.php");
include($_SERVER['DOCUMENT_ROOT'] . "/public/html/helpers/footer.html");
