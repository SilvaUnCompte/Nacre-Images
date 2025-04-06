<main>
    <section class="display-block inline-container">
        <div class="form-group">
            <label for="add-price-type" class="form-label">Type</label>
            <select id="add-price-type" class="form-select">
                <option value="" disabled selected>Select an option</option>
                <option value="0">Groupe</option>
                <option value="1">Individuel</option>
                <option value="2">Spécial</option>
                <option value="3">Prestation</option> 
                <!-- TODO : delete la ligne prestation ? voir dans la page tarif comment la boucle est géré et si elle prend la prestation -->
            </select>
        </div>
        <div class="form-group">
            <label for="add-price-label" class="form-label">Label</label>
            <input type="text" id="add-price-label" class="form-input" placeholder="Titre du tarif">
        </div>
        <div class="form-group">
            <label for="add-price-price" class="form-label">Prix</label>
            <input type="text" id="add-price-price" class="form-number" placeholder="42.00">
        </div>
        <div>
            <div class="form-group">
                <label for="add-price-description" class="form-label">Description</label>
                <input type="text" id="add-price-description" class="form-input" placeholder="Description du tarif">
            </div>
        </div>
        <div>
            <button id="create-event" class="btn btn-primary" type="button" onclick="addPrice()">Ajouter</button>
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