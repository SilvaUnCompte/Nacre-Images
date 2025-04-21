<link rel="stylesheet" href="/public/styles/pages/packshot.css">

<div class="packshot-container">
    <!-- <section class="service-description">
        <p>Je vous propose la prise de vue de vos objets, bijoux, œuvres d'art, produits marchands etc...</p>
        <p>Les tarifs varient en fonction du type d'objet, de l'utilisation des photos et du nombre de prises de vue à effectuer.</p>
        <p><span class="highlight">Possibilité de fond blanc ou noir.</span> Chaque fichier est optimisé minutieusement et remis en HD.</p>
    </section> -->

    <section class="pricing-section">
        <h2>Tarifs</h2>
        <p class="pricing-note">
            Ci-dessous les tarifs HT pour des objets simples sans reflets et pour un usage web exclusivement.<br>
            Ils comprennent une licence d'utilisation de 1 an.
        </p>

        <div class="pricing-grid">
            <div class="pricing-card">
                <h3>1 à 2 objets</h3>
                <div class="price">35€<span style="font-size: 1rem; font-weight: normal;">/objet</span></div>
            </div>

            <div class="pricing-card">
                <h3>3 à 5 objets</h3>
                <div class="price">25€<span style="font-size: 1rem; font-weight: normal;">/objet</span></div>
            </div>

            <div class="pricing-card">
                <h3>6 à 10 objets</h3>
                <div class="price">20€<span style="font-size: 1rem; font-weight: normal;">/objet</span></div>
            </div>

            <div class="pricing-card">
                <h3>10 objets et +</h3>
                <div class="price">15€<span style="font-size: 1rem; font-weight: normal;">/objet</span></div>
            </div>
        </div>
    </section>
    <section class="additional-info">
        <p>Pour des objets avec beaucoup de reflets et/ou pour tout autre usage : <a href="/contact"><u>me contacter</u></a>.</p>

        <div class="installation-fee">
            <h3>Frais d'installation</h3>
            <p>Il faut ajouter le tarif "d'installation" forfaitaire qui comprend l'éventuel déplacement sur Caen ou alentours proches et la mise en place du matériel :</p>
            <div class="price">80€</div>
        </div>
    </section>


    <div id="image-directory" class="hide"><?php echo $carrousel_img_dir; ?></div>
    <?php include($_SERVER['DOCUMENT_ROOT'] . "/public/html/carrousel.php"); ?>


    <div class="contact-section">
        <a href="/contact" class="contact-button">
            Me contacter
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M5 12h14"></path>
                <path d="M12 5l7 7-7 7"></path>
            </svg>
        </a>
    </div>
</div>


<link rel="stylesheet" href="/public/styles/generics/contact-button.css">