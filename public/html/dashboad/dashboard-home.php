<link rel="stylesheet" href="/public/styles/dashboard/home/home.css">
<script src="/public/js/dashboard/home.js" defer></script>

<main>

    <br>

    <div id="next-session">
        <div id="next-session-data">
            <h2>Prochain cours</h2>

            <div class="next-session-content">
                <div>
                    <p>Date</p>
                    <p class="small-p" id="next-session-date">Chargement...</p>
                </div>
                <div>
                    <p>Type</p>
                    <p class="small-p" id="next-session-type">Chargement...</p>
                </div>
                <div>
                    <p>Informations</p>
                    <p class="small-p" id="next-session-info">Chargement...</p>
                </div>
                <div></div>
            </div>
        </div>

        <iframe id="widget_autocomplete_preview" width="150" height="300" frameborder="0" src="https://meteofrance.com/widget/prevision/141180##3D6AA2" title="Prévisions Caen par Météo-France"> </iframe>
    </div>

    <br><br><br>

    <h1 class="big-h1">Liste des stages</h1>
    <hr><br>

    <?php include($_SERVER['DOCUMENT_ROOT'] . "/controler/dashboard/workshop-type/type-list.php"); ?>

    <br><br>
    <h1 class="big-h1">Tarifs</h1>
    <hr><br>

    <?php include($_SERVER['DOCUMENT_ROOT'] . "/controler/dashboard/prices.php"); ?>

    <br><br>
    <h1 class="big-h1">Calendrier</h1>
    <hr><br>

    <?php include($_SERVER['DOCUMENT_ROOT'] . "/controler/dashboard/session-list.php"); ?>
</main>