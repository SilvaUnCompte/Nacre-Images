<main>
    <section class="display-block inline-container">
        <div class="form-group">
            <label for="date-input" class="form-label">Date Input</label>
            <input type="date" id="session-date" class="form-date">
        </div>
        <div class="form-group">
            <label for="select" class="form-label">Type</label>
            <select id="session-topic" class="form-select">
                <option value="0" disabled selected>Select an option</option>
                <option value="0">Groupe</option>
                <option value="1">Individuel</option>
                <option value="2">Spécial</option>
            </select>
        </div>
        <div>
            <div class="form-group">
                <label for="text-input" class="form-label">Informations supplémentaires</label>
                <input type="text" id="session-info" class="form-input" placeholder="Enter text here">
            </div>
        </div>
        <div>
            <button id="create-event" class="btn btn-primary" type="button" onclick="addSession()">Ajouter</button>
        </div>

    </section>

    <section class="display-block">
        <div id="prices-container">
            <div class="spinner spinner-centered"></div>
        </div>
    </section>

</main>

<script src="/public/js/popup.js" type="text/javascript"></script>
<script src="/public/js/dashboard/tarifs.js" defer></script>
<link rel="stylesheet" href="/public/styles/popup/popup.css">