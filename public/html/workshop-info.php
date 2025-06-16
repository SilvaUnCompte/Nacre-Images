<link rel="stylesheet" href="/public/styles/pages/workshop-info/workshop-info.css">
<link rel="stylesheet" href="/public/styles/generics/bubble-text.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Baloo+2:400,800&display=swap">

<main id="workshop-info">
    <div id="workshop-container">

        <?php
        $workshopTitle = ['Les stages classiques', 'Les thèmes exceptionnels', 'Thèmes sur demande', 'Séjours photo'];
        $workshopSubtitle = ['Ces thèmes sont abordés très régulièrement.', 'Ces thèmes sont abordés un peu moins souvent ou sur demande.', 'Ces thèmes sont sur demande uniquement.', 'Séjours en groupe sur plusieurs jours.'];


        for ($i = 0; $i < 4; $i++) {
            $workshopTypes_0 = array_filter($workshopTypes, function ($type) use ($i) {
                return $type['regularity_type'] == $i;
            });

            echo '<div class="workshop-title">
                    <h2>' . $workshopTitle[$i] . '</h2>
                    
                    <p>' . $workshopSubtitle[$i] . '</p>
                 </div>';

            echo '<div class="divider divider-' . $i . '"></div>
                <section class="workshops-grid">';

            foreach ($workshopTypes_0 as $topics) {

                echo '<a class="workshop-card" href="/stage/' . $topics['url'] . '">
                        <div class="workshop-card-container">
                            <img class="workshop-image" loading="lazy" alt="' . $topics["img_alt"] . '" src=\'assets/images/illustrations/' . $topics["img_name"] . '\')">
                            <div class="overlay"></div>
                            <p class="text-over">' . $topics["topic_name"] . '</p>
                        </div>
                    </a>';
            }
            echo '</section>';
        }
        ?>
    </div>

    <a class="bubble-text-container transparent" href="/contact">
        <div class="bubble-text">
            <p>
                <!-- Un thème non listé vous<br>intéresse ? Demandez moi et<br>dans la mesure du possible, je<br>tacherai de vous satisfaire ! -->
                Un thème non listé vous intéresse ? N'hésitez pas à demander !
            </p>
        </div>
    </a>
</main>

<br><br><br><br>