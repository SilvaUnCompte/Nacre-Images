<link rel="stylesheet" href="/public/styles/dashboard/home/home.css">
<script src="/public/js/dashboard/home.js" defer></script>

<main><br>

    <!-- Col 1 -->
    <section class="midcol">
        <div class="inline-container display-block">
            <div id="next-session-data">
                <h2>Prochain cours</h2>

                <div class="next-session-content">
                    <div>
                        <p>Date</p>
                        <p class="text-small" id="next-session-date">Chargement...</p>
                    </div>
                    <div>
                        <p>Type</p>
                        <p class="text-small" id="next-session-type">Chargement...</p>
                    </div>
                    <div>
                        <p>Informations</p>
                        <p class="text-small" id="next-session-info">Chargement...</p>
                    </div>
                    <div></div>
                </div>
            </div>

            <iframe id="widget_autocomplete_preview" width="150" height="300" frameborder="0" src="https://meteofrance.com/widget/prevision/141180##3D6AA2" title="Prévisions Caen par Météo-France"> </iframe>
        </div>

        <a class="display-block" href="/dashboard/liste-des-stages">
            <h1 class="title-lg">Liste des stages</h1>

            <?php
            if (count($all_workshop_type) == 0) {
                echo '<div class="alert alert-warning">
                        <div class="alert-icon">!</div>
                        <div class="alert-content">
                            <h4 class="alert-title">Warning</h4>
                            <p class="alert-message">Aucun stage programmé</p>
                        </div>
                    </div>';
            } else {
                echo '<div class="alert alert-info">
                    <div class="alert-icon">!</div>
                    <div class="alert-content">
                        <h4 class="alert-title">Info</h4>
                        <p class="alert-message">' . count($all_workshop_type) . ' types de stage</p>
                    </div>
                </div>';

                echo '<table>
                        <thead>
                            <tr>
                                <th class="text-regular">Titre</th>
                                <th class="text-regular">Description</th>
                            </tr>
                        </thead><tbody>';

                foreach ($all_workshop_type as $workshop_type) {

                    echo '<tr>
                        <td class="text-regular">' . htmlspecialchars($workshop_type['topic_name']) . '</td>
                        <td class="text-regular">' . htmlspecialchars($workshop_type['seo_desc']) . '</td>
                        </tr>';
                }
                echo '</tbody></table>';
            }
            ?>
        </a>

        <a class="display-block" href="/dashboard/faq">
            <h1 class="title-lg">FAQ</h1>

            <?php
            if (count($all_faq) == 0) {
                echo '<div class="alert alert-warning">
                        <div class="alert-icon">!</div>
                        <div class="alert-content">
                            <h4 class="alert-title">Warning</h4>
                            <p class="alert-message">Aucune question d\'entregistrée</p>
                        </div>
                    </div>';
            } else {
                echo '<div class="alert alert-info">
                    <div class="alert-icon">!</div>
                    <div class="alert-content">
                        <h4 class="alert-title">Info</h4>
                        <p class="alert-message">' . count($all_faq) . ' questions enregistrées</p>
                    </div>
                </div>';

                echo '<table>
                        <thead>
                            <tr>
                                <th class="text-regular">Question</th>
                                <th class="text-regular">Réponse</th>
                            </tr>
                        </thead><tbody>';

                foreach ($all_faq as $question) {
                    echo '<tr>
                            <td class="text-regular">' . htmlspecialchars($question['question']) . '</td>
                            <td class="text-regular">' . htmlspecialchars($question['answer']) . '</td>
                        </tr>';
                }
                echo '</tbody></table>';
            }
            ?>
        </a>
    </section>

    <!-- Col 2 -->
    <section class="midcol">
        <a class="display-block" href="/dashboard/tarifs">
            <h1 class="title-lg">Tarifs</h1>

            <?php
            if (count($all_tarifs) == 0) {
                echo '<div class="alert alert-warning">
                        <div class="alert-icon">!</div>
                        <div class="alert-content">
                            <h4 class="alert-title">Warning</h4>
                            <p class="alert-message">Aucune tarif entregistré</p>
                        </div>
                    </div>';
            } else {
                echo '<div class="alert alert-info">
                        <div class="alert-icon">!</div>
                        <div class="alert-content">
                            <h4 class="alert-title">Info</h4>
                            <p class="alert-message">' . count($all_tarifs) . ' tarifs enregistrés</p>
                        </div>
                    </div>';

                echo '<table>
                        <thead>
                            <tr>
                                <th class="text-regular">Type</th>
                                <th class="text-regular">Label</th>
                                <th class="text-regular">Description</th>
                                <th class="text-regular">Prix</th>
                            </tr>
                        </thead><tbody>';

                foreach ($all_tarifs as $tarif) {

                    switch ($tarif['type']) {
                        case 0:
                            $tarif['type'] = 'Groupe';
                            break;
                        case 1:
                            $tarif['type'] = 'Individuel';
                            break;
                        case 2:
                            $tarif['type'] = 'Spécial';
                            break;
                        default:
                            $tarif['type'] = 'Inconnu';
                    }

                    echo '<tr>
                            <td class="text-regular">' . htmlspecialchars($tarif['type']) . '</td>
                            <td class="text-regular">' . htmlspecialchars($tarif['label']) . '</td>
                            <td class="text-regular">' . htmlspecialchars($tarif['description']) . '</td>
                            <td class="text-regular">' . htmlspecialchars($tarif['price']) . '€</td>
                        </tr>';
                }
                echo '</tbody></table>';
            }
            ?>
        </a>

        <a class="display-block" href="/dashboard/calendrier">
            <h1 class="title-lg">Calendrier</h1>

            <?php
            if (count($all_future_session) == 0) {
                echo '<div class="alert alert-warning">
                        <div class="alert-icon">!</div>
                        <div class="alert-content">
                            <h4 class="alert-title">Warning</h4>
                            <p class="alert-message">Aucun stage programmé</p>
                        </div>
                    </div>';
            } else {
                echo '<div class="alert alert-info">
                    <div class="alert-icon">!</div>
                    <div class="alert-content">
                        <h4 class="alert-title">Info</h4>
                        <p class="alert-message">' . count($all_future_session) . ' stages programmés</p>
                    </div>
                </div>';

                echo '<table>
                        <thead>
                            <tr>
                                <th class="text-regular">Date</th>
                                <th class="text-regular">Type</th>
                            </tr>
                        </thead><tbody>';

                foreach ($all_future_session as $session) {
                    echo '<tr>
                            <td class="text-regular">' . IntlDateFormatter::formatObject(new DateTimeImmutable($session['date']), 'dd MMMM YYYY', 'fr') . '</td>
                            <td class="text-regular">' . htmlspecialchars($session['topic_name']) . '</td>
                        </tr>';
                }
                echo '</tbody></table>';
            }
            ?>
        </a>

        <a class="display-block" href="/dashboard/liste-des-prestations">
            <h1 class="title-lg">Liste des prestations</h1>


        </a>
    </section>
</main>