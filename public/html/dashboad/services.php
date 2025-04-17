<main>
    <section class="display-block">
        <div class="inline-container">
            <div class="form-group">
                <label for="add-service-type" class="form-label">Position</label>
                <select id="add-service-type" class="form-select">
                    <option value="" disabled selected>Select an option</option>
                    <option value="0">Shooting humain</option>
                    <option value="1">Shooting autre</option>
                    <option value="2">Autres</option>
                </select>
            </div>
            <div class="form-group">
                <label for="add-service-label" class="form-label">Label</label>
                <input type="text" id="add-service-label" class="form-input" placeholder="Titre de la prestation">
            </div>
            <div class="form-group">
                <label for="add-service-description" class="form-label">Description</label>
                <input type="text" id="add-service-description" class="form-input" placeholder="Description de la prestation">
            </div>
            <p></p>
            <p></p>
        </div>
        <div class="inline-container">
            <div class="form-group">
                <label for="add-service-price" class="form-label">Prix (optionnel)</label>
                <input type="text" id="add-service-price" class="form-number" placeholder="42-50 €">
            </div>
            <div class="form-group">
                <label for="add-service-link" class="form-label">Texte du lien (optionnel)</label>
                <input type="text" id="add-service-link" class="form-input" placeholder="Texte afficher sur lien">
            </div>
            <div class="form-group">
                <label for="add-service-url" class="form-label">URL du lien (optionnel)</label>
                <input type="text" id="add-service-url" class="form-input" placeholder="URL de redirection">
            </div>
            <button id="create-event" class="btn btn-primary" type="button" onclick="addService()">Ajouter</button>
        </div>
    </section>

    <section class="display-block">
        <div id="services-container">
            <div class="spinner spinner-centered"></div>
        </div>
    </section>

</main>

<script src="/public/js/popup.js" type="text/javascript"></script>
<script src="/public/js/dashboard/services.js" defer></script>
<link rel="stylesheet" href="/public/styles/popup/popup.css">