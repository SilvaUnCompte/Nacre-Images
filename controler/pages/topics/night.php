<?php

$page_name = 'Nocturne urbaine';
$description = 'Stage photo nocturne en ville, à Caen ou en Normandie. Apprendre à photographier la nuit, les lumières et les ambiances urbaines.';

$image = '/assets/images/topics/nocturne.webp';
$alt_image = 'Grand roue de noel de Caen, la nuit.'; // TODO: mettre un lien qq part vers la liste des topics de stage
$topic = 'Nocturne en ville';
$title = 'Jouer avec les lumières urbaines'; // TODO: faire un site map et le mettre dans robot.txt
$paragraph = 'Jouer avec les phares des voitures, imprimer les lumières du soir, retranscrire une ambiance, 
            jouer avec l\'éclairage urbain et son graphisme, créer des fantômes ou tester le light painting... <br><br>
            Durant cette séance, vous apprendrez à aller à l\'encontre des automatismes de votre boitier et 
            choisirez vous même le résultat souhaité. Ludique, pédagogique et, vous allez voir, vraiment fun ! <br><br>
            8 personnes maximum <br>
            <span style="text-decoration: underline;">Public concerné&#x202F:</span> débutant et confirmé <br>
            <span style="text-decoration: underline;">Tarif&#x202F:</span> "Demi-journée", durée 3h.<br>
            <span style="text-decoration: underline;">Lieu&#x202F:</span> Centre ville de Caen, Basse-Normandie, Calvados.<br>
            <span style="text-decoration: underline;">Matériel nécessaire&#x202F:</span> Trépied, vêtements chauds.';

include($_SERVER['DOCUMENT_ROOT'] . "/public/html/helpers/header.php");
include($_SERVER['DOCUMENT_ROOT'] . "/public/html/topic.php");
include($_SERVER['DOCUMENT_ROOT'] . "/public/html/helpers/footer.html");
