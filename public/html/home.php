<link rel="stylesheet" href="/public/styles/pages/home/home.css">

<div class="rec-triangle"></div>
<div class="triangle-mid-down"></div>

<div class="space-empty">
    <h1>NACRE IMAGES</h1>
    <p>Stage photo et prestations en Normandie</p> <!-- TODO: choisir si mettre sous titre -->
    <br> <br> <br> <br>
</div>

<div class="triangle-mid"></div>

<main class="grey-section animation-wrapper">

    <div class="particle particle-1"></div>
    <div class="particle particle-2"></div>
    <div class="particle particle-3"></div>
    <div class="particle particle-4"></div>


    <div id="lazy-loader"></div>

    <div class="container inline-container scroll-trigger info-cadre">
        <div>
            <h2 class="big-h2">Avant tout organisateur de stages photos</h2>

            <p class="paragraph">
                Depuis 2009, je suis là pour vous proposer un cours ponctuel ou une formation photo complète à Caen et ses alentours.
                En groupe ou en individuel, mes sessions de formation accessibles à tous les photographes se veulent ludiques et pédagogiques.<br>
                La plupart des thèmes ont lieu autour de Caen (Initiation, paysage de bord de mer, macro photo, animalier ...)<br>
                Après les séances, je reste disponible pour vous assister.
                Les thèmes abordés sont listés <u><a href='/infos-stage'>ici</a></u> mais toute demande est envisageable. Les dates programmées sont
                visibles sur le calendrier. Vous avez également la possibilité d'offrir un stage photo sous forme de chèque cadeau.
            </p>

        </div>
        <img class='illustration' src="/assets/images/illustrations/cigogne.jpg" loading="lazy" alt="illustration de cigogne">
    </div>

    <div class="container inline-container scroll-trigger info-cadre place-right">
        <img class='illustration' src="/assets/images/illustrations/cascade.jpg" loading="lazy" alt="illustration de cascade">
        <div>
            <h2 class="big-h2">Ma philosophie</h2>

            <p class="paragraph">
                Parce que tout le monde est débutant un jour, j'ai concocté une journée tout spécialement dédiée à
                l'initiation afin de répondre à toutes les questions de base. Comme tout est lié en photographie, vous
                ne trouverez pas dans mon programme une multitude de modules visant à vous faire revenir plusieurs fois.<br>
                En une journée unique de stage photo, je vous garantis l'apprentissage de toutes les notions
                primordiales (et plus) afin que vous puissiez ensuite évoluer seul ou revenir sur d'autres thèmes plus
                spécialisés.
            </p>
        </div>
    </div>

    <br>

    <div class="center-container">
        <p class="big-h2">Avant de choisir un photographe pour un cours, il faut aller voir ses photos !</p>

        <?php include($_SERVER['DOCUMENT_ROOT'] . "/public/html/carrousel.php"); ?>
    </div>

    <div class="container inline-container scroll-trigger info-cadre">
        <div>
            <h2 class="big-h2">Qui suis-je ?</h2>

            <p class="paragraph">
                Gilles, le daltonien<br>
                Né en 1973, je suis un ex-biologiste. Ma carrière a débuté dans la gestion de milieux naturels et après un bref passage dans l'enseignement, je suis allé acquérir des compétences de formateur dans le commerce.
                Après avoir débuté la photo par une approche très scientifique et descriptive des fleurs et insectes qui nous entourent, je me suis tourné vers la photographie davantage empreinte de rêve et de poésie. Adepte des couleurs éclatantes, des ciels chargés et du minimalisme ; sous le pseudo de Dalt, j'oscille entre macro-photos, paysages et photographies animalières pour vous faire découvrir le monde par mes yeux de daltonien.
            </p>

        </div>
        <img class='illustration' src="/assets/images/illustrations/formateur.jpg" loading="lazy" alt="exemple stage photo">
    </div>


    <div class="button-container">
        <a href="/faq" class="bottom-button bottom-button-1">FAQ</a>
        <a href="/infos-stage" class="bottom-button bottom-button-2">List des thèmes</a>
        <a href="/prestations" class="bottom-button bottom-button-3">Prestations</a>
        <a href="https://www.facebook.com/nacreimages/" target="_blank" class="bottom-button bottom-button-4">Facebook</a>
        <a href="/stage/tarifs" class="bottom-button bottom-button-5">Tarifs</a>
    </div>


    <br>
    <br>
</main>

<link rel="stylesheet" href="/public/styles/generics/star.css">
<script src="/public/js/scroll-trigger.js" defer></script>
<script src="/public/js/random-background.js" defer></script>