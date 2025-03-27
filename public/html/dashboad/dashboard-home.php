<link rel="stylesheet" href="/public/styles/dashboard/home/home.css">
<script src="/public/js/dashboard/home.js" defer></script>

<main>

    <br>

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

        <a class="display-block" href="/controler/dashboard/liste-des-stages">
            <h1 class="title-lg">Liste des stages</h1>
        </a>

        <a class="display-block" href="/controler/dashboard/liste-des-prestations">
            <h1 class="title-lg">Liste des prestations</h1>
        </a>

        <a class="display-block" href="/controler/dashboard/faq">
            <h1 class="title-lg">FAQ</h1>
        </a>
    </section>

    <section class="midcol">
        <a class="display-block" href="/controler/dashboard/tarifs">
            <h1 class="title-lg">Tarifs</h1>
        </a>
        <a class="display-block" href="/controler/dashboard/calendrier">
            <h1 class="title-lg">Calendrier</h1>
        </a>
    </section>
</main>