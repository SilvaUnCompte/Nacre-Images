<link rel="stylesheet" href="/public/styles/pages/workshop-info/workshop-info.css">

<main id="workshop-info">
    <div id="workshop-container-grid">

        <h1>Listes des stages</h1>

        <?php
        $workshopTitle = ['Les stages classiques', 'Les thèmes exceptionnels', 'Thème sur demande', 'Stage séjour photo'];
        $workshopSubtitle = ['Ces thèmes sont abordés très régulièrement.', 'Ces thèmes sont abordés un peu moins souvent ou sur demande.', 'Ces thèmes sont sur demande uniquement.', 'Séjour en groupe d\'une semaine.'];
        
        for ($i = 0; $i < 4; $i++) {
            $workshopTypes_0 = array_filter($workshopTypes, function ($type) use ($i) {
                return $type['regularity_type'] == $i;
            });

            echo '<h2>' . $workshopTitle[$i] . '</h2>';
            echo '<p>' . $workshopSubtitle[$i] . '</p>';

            foreach ($workshopTypes_0 as $topics) {
                echo '<a class="workshop-card" href="/stage/' . $topics['url'] . '">';
                echo    '<img loading="lazy" src=\'assets/images/topics/' . $topics["img_name"] . '\')">';
                echo    '<p class="text-over">' . $topics["topic_name"] . '</p>';
                echo '</a>';
            }
        }
        ?>

        <!-- TODO: mettre la bulle n'hésitez pas à demander -->
    </div>
</main>

<br><br><br>