<section id="services">
    <div class="container">
        <div class="section-title">
            <h2>SHOOTING PHOTO</h2>
        </div>
        <p class="info">Je réalise également des clichés sur demande, artistiques, publicitaires... je suis à votre disposition pour tout renseignement.</p>

        <h3>Tarifs indicatifs</h3>

        <div class="services-grid">
            <?php
            foreach ($services_section_0 as $service) {
                echo '<div class="service-card">
                        <div class="service-content">
                            <h4 class="service-title">' . $service['label'] . '</h4>
                            <p class="service-description">' . $service['desc'] . '</p>
                            <p class="service-price">' . $service['price'] . '</p>
                            <a target="_blank" href="' . $service['url'] . '" class="link">' . $service['link'] . '</a>
                        </div>
                    </div>';
            }
            ?>
        </div>

        <p class="info">Chaque séance donne accès à une galerie en ligne pour un tirage papier facile de vos photos.</p>

        <div class="divider"></div>

        <div class="services-grid">
            <?php
            foreach ($services_section_1 as $service) {
                echo '<div class="service-card">
                        <div class="service-content">
                            <h4 class="service-title">' . $service['label'] . '</h4>
                            <p class="service-description">' . $service['desc'] . '</p>
                            <p class="service-price">' . $service['price'] . '</p>
                            <a target="_blank" href="' . $service['url'] . '" class="link">' . $service['link'] . '</a>
                        </div>
                    </div>';
            }
            ?>
        </div>
    </div>
</section>

<section id="other-services" class="other-services">
    <div class="container">
        <div class="section-title">
            <h2>AUTRES PRESTATIONS</h2>
        </div>

        <div class="services-grid">
            <?php
            foreach ($services_section_2 as $service) {
                echo '<div class="service-card">
                        <div class="service-content">
                            <h4 class="service-title">' . $service['label'] . '</h4>
                            <p class="service-description">' . $service['desc'] . '</p>
                            <p class="service-price">' . $service['price'] . '</p>
                            <a target="_blank" href="' . $service['url'] . '" class="link">' . $service['link'] . '</a>
                        </div>
                    </div>';
            }
            ?>
        </div>
    </div>

    <br> <br> <a href="/contact" class="contact-button">
        Me contacter
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M5 12h14"></path>
            <path d="M12 5l7 7-7 7"></path>
        </svg>
    </a>
</section>

<link rel="stylesheet" href="/public/styles/generics/contact-button.css">
<link rel="stylesheet" href="/public/styles/pages/service/service.css">