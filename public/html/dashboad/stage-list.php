<link rel="stylesheet" href="/public/styles/pages/workshop-info/workshop-info.css">
<link rel="stylesheet" href="/public/styles/generics/bubble-text.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Baloo+2:400,800&display=swap">

<main id="workshop-info">

    <section id="workshop-navbar" class="display-block">
        <?php
        if ($all_workshop_type == null || count($all_workshop_type) == 0) {
            echo '<div class="alert alert-warning">
                <div class="alert-icon">!</div>
                <div class="alert-content">
                    <h4 class="alert-title">Warning</h4>
                    <p class="alert-message">Aucune donnée entregistrée</p>
                </div>
            </div>';
        } else {
            echo '<div class="alert alert-info">
                    <div class="alert-icon">!</div>
                    <div class="alert-content">
                        <h4 class="alert-title">Info</h4>
                        <p class="alert-message">' . count($all_workshop_type) . ' tarifs trouvées</p>
                    </div>
                </div>';
        }
        ?>
    </section>
    <br>

    <div class="right">
        <a id="create-stage" class="btn btn-primary form-number" href="liste-des-stages/edit?id=-42">Créer</a>
    </div>

    <div id="workshop-container">

        <?php
        $workshopTitle = ['Les stages classiques', 'Les thèmes exceptionnels', 'Thème sur demande', 'Stage séjour photo'];
        $workshopSubtitle = ['Ces thèmes sont abordés très régulièrement.', 'Ces thèmes sont abordés un peu moins souvent ou sur demande.', 'Ces thèmes sont sur demande uniquement.', 'Séjour en groupe d\'une semaine.'];


        for ($i = 0; $i < 4; $i++) {
            $workshopTypes_0 = array_filter($all_workshop_type, function ($type) use ($i) {
                return $type['regularity_type'] == $i;
            });

            echo '<div class="workshop-title">
                    <h2>' . $workshopTitle[$i] . '</h2>
                    
                    <p>' . $workshopSubtitle[$i] . '</p>
                 </div>';

            echo '<div class="divider divider-' . $i . '"></div>
                <section class="workshops-grid">';

            foreach ($workshopTypes_0 as $topics) {
                echo '<a class="workshop-card" href="liste-des-stages/edit?id=' . $topics['id'] . '">
                        <div class="workshop-card-container">
                            <img class="workshop-image" loading="lazy" alt="' . $topics["img_alt"] . '" src=\'/assets/images/illustrations/' . $topics["img_name"] . '\')">
                            <div class="overlay"></div>
                            <p class="text-over">' . $topics["topic_name"] . '</p>
                        </div>
                    </a>';
            }
            echo '</section>';
        }
        ?>

    </div>
</main>


<?php 
if (isset($_POST['message'])) {
    echo '<div class="hide" id="message">' . $_POST['message'] . '</div>';
}
?>

<script src="/public/js/popup.js" type="text/javascript"></script>
<script src="/public/js/dashboard/workshop-list.js"></script>
<link rel="stylesheet" href="/public/styles/popup/popup.css">