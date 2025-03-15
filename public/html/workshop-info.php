<link rel="stylesheet" href="/public/styles/pages/workshop-info/workshop-info.css">
<link rel="stylesheet" href="/public/styles/generics/bubble-text.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Baloo+2:400,800&display=swap">

<main id="workshop-info">

    <nav class="title-row">
        <ul>
            <li>
                <input type="radio" id="tt1" name="title" value="topics" checked>
                <label for="tt1"> Liste des Thèmes</label>
            </li>
            <li>
                <input type="radio" id="tt2" name="title" value="prices">
                <label for="tt2"> Liste des Tarifs</label>
            </li>
        </ul>
    </nav>

    <div id="workshop-container"> <!-- class="animation-wrapper"> -->

        <?php
        $workshopTitle = ['Les stages classiques', 'Les thèmes exceptionnels', 'Thème sur demande', 'Stage séjour photo'];
        $workshopSubtitle = ['Ces thèmes sont abordés très régulièrement.', 'Ces thèmes sont abordés un peu moins souvent ou sur demande.', 'Ces thèmes sont sur demande uniquement.', 'Séjour en groupe d\'une semaine.'];


        for ($i = 0; $i < 4; $i++) {
            $workshopTypes_0 = array_filter($workshopTypes, function ($type) use ($i) {
                return $type['regularity_type'] == $i;
            });

            echo '<div class="workshop-title">';
            echo    '<h2>' . $workshopTitle[$i] . '</h2>';
            echo    '<hr>';
            echo    '<p>' . $workshopSubtitle[$i] . '</p>';
            echo '</div>';

            echo '<section class="row">';
            foreach ($workshopTypes_0 as $topics) {
                // echo 'TTTTT';
                echo '<a class="workshop-card" href="/stage/' . $topics['url'] . '">';
                echo    '<div class="card-container">';
                echo        '<img loading="lazy" alt="' . $topics["img_alt"] . '" src=\'assets/images/topics/' . $topics["img_name"] . '\')">';
                echo        '<p class="text-over">' . $topics["topic_name"] . '</p>';
                echo    '</div>';
                echo '</a>';
            }
            echo '</section>';
        }
        ?>

        <!-- TODO: mettre la bulle n'hésitez pas à demander -->
    </div>
    <a class="bubble-text-container transparent" href="/contact">
        <div class="bubble-text">
            <p>
                Un thème non listé vous<br>intéresse ? Demandez moi et<br>dans la mesure du possible, je<br>tacherai de vous satisfaire !
                <!-- Un thème non listé vous <br>intéresse ? N'hésitez<br> pas à demander ! //TODO choisir le text final -->
            </p>
        </div>
    </a>
</main>

<br><br><br><br>