<?php

$page_name = 'FAQ';
$description = 'Foire aux questions de Nacre-Images. Questions fréquentes sur les prestations photo, les stages photo, les chèques cadeaux.';

require_once(ROOT_DIR . '/database/tables/faq.php');

include(ROOT_DIR . "/public/html/helpers/header.php");
include(ROOT_DIR . "/public/html/faq.php");
include(ROOT_DIR . "/public/html/helpers/footer.html");
