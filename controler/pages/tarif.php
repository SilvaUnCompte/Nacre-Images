<?php

require_once(ROOT_DIR . '/database/tables/prices.php');

$page_name = 'Tarifs des stages';
$description = 'La liste des tarifs des stages photo. Les prix sont en fonction du type de stage. Contactez moi pour avoir des précisions sur le prix d\'un stage de photographie en normandie.';

$header_title_p1 = 'Tarifs des ';
$header_title_p2 = 'Stages Photo';
$header_text = "Vous trouverez ci-dessous la liste des tarifs des sessions de stages et des forfaits que je propose.… et ils sont nombreux.
Les prix varient en fonction du type de stage. Chaque fiche de stage à thème vous indiquent son tarif précis. 
Contactez moi si vous avez des questions ou si vous souhaitez un devis personnalisé pour une prestation spécifique.";

$prices = Prices::getAll();

include(ROOT_DIR . "/public/html/helpers/header.php");
include(ROOT_DIR . "/public/html/helpers/second-header.php");
echo "<br>";
include(ROOT_DIR . "/public/html/price.php");
include(ROOT_DIR . "/public/html/helpers/footer.html");
