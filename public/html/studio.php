<link rel="stylesheet" href="/public/styles/pages/studio/studio.css">
<link rel="stylesheet" href="/public/styles/generics/contact-button.css">

<div class="studio-container">

    <div class="cards-container">

        <!-- Card 1: Solo -->
        <div class="card">
            <div class="card-header">
                <h2>Forfait Solo</h2>
            </div>
            <div class="card-body">
                <ul>
                    <li>Déplacement à 30 km autour de Caen</li>
                    <li>Séance de prise de vue pour une personne</li>
                    <li>2 à 3 photos sur fichier numérique</li>
                </ul>
                <div class="price">120€</div>
            </div>
        </div>

        <!-- Card 2: Duo -->
        <div class="card">
            <div class="card-header">
                <h2>Forfait Duo</h2>
            </div>
            <div class="card-body">
                <ul>
                    <li>Déplacement à 30 km autour de Caen</li>
                    <li>Séance de prise de vue pour deux personnes <u>chacune</u> leur tour</li>
                    <li>2 à 3 photos sur fichier numérique par personne</li>
                </ul>
                <div class="price">190€</div>
                <div class="additional-info">
                    <p>Si vous souhaitez, en plus, des photos des deux personnes ensemble : +70€</p>
                    <p>En gros, au forfait solo, il suffit d'ajouter 70€ par "sujet" pris en photos...clair non?</p>
                </div>
            </div>
        </div>
    </div>

    <div id="image-directory" class="hide"><?php echo $carousel_img_dir; ?></div>
    <?php include($_SERVER['DOCUMENT_ROOT'] . "/public/html/carrousel.php"); ?>

    <div class="contact-section">
        <p>Vous souhaitez une séance différente, sur mesure ou l'offrir... contactez moi !</p><br>

        <a href="/contact" class="contact-button">
            Me contacter
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M5 12h14"></path>
                <path d="M12 5l7 7-7 7"></path>
            </svg>
        </a>
    </div>
</div>