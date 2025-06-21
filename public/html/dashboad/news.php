<main>
    <section class="display-block inline-container">
        <div class="form-group">
            <label for="add-news-title" class="form-label">Titre</label>
            <input type="text" id="add-news-title" class="form-input" placeholder="Titre impactant">
        </div>
        <div class="form-group">
            <label for="add-news-info" class="form-label">Texte (350 char max, pour des raisons esthétiques)</label>
            <textarea id="add-news-info" class="form-textarea" maxlength="350" placeholder="Une super news !"></textarea>
        </div>
        <div class="form-group">
            <label for="add-news-start-date" class="form-label">Date affichée</label>
            <input type="date" id="add-news-start-date" class="form-date">
            <label for="add-news-end-date" class="form-label">Date de fin d'affichage</label>
            <input type="date" id="add-news-end-date" class="form-date">
        </div>
        <div class="form-group">
            <label for="add-news-img" class="form-label">Image optionnel (dans le dossier illustrations)</label>
            <input type="text" id="add-news-img" class="form-input" placeholder="unjolieville.jpg">
        </div>
        <div class="form-group">
            <label for="add-news-image" class="form-label">Visible</label>
            <input type="checkbox" id="add-news-visible" class="form-checkbox">
        </div>
        <div>
            <button id="create-event" class="btn btn-primary" type="button" onclick="addNews()">Ajouter</button>
        </div>
    </section>

    <section class="display-block">
        <div id="news-container">
            <div class="spinner spinner-centered"></div>
        </div>
    </section>

</main>

<script src="/public/js/popup.js" type="text/javascript"></script>
<script src="/public/js/dashboard/news.js" defer></script>
<link rel="stylesheet" href="/public/styles/popup/popup.css">