<main>
    <section class="display-block inline-container">
        <div class="form-group">
            <label for="date-input" class="form-label">Date Input</label>
            <input type="date" id="date-input" class="form-date">
        </div>
        <div class="form-group">
            <label for="select" class="form-label">Type</label>
            <select id="select" class="form-select">
                <option value="" disabled selected>Select an option</option>
                <option value="1">Option 1</option>
                <option value="2">Option 2</option>
                <option value="3">Option 3</option>
            </select>
        </div>
        <div>
            <div class="form-group">
                <label for="text-input" class="form-label">Informations supplémentaires</label>
                <input type="text" id="text-input" class="form-input" placeholder="Enter text here">
            </div>
        </div>
        <div>
            <button id="create-event" class="btn btn-primary" type="button">Ajouter</button>
        </div>

    </section>

    <section class="display-block">
        <div>
            <input type="date" id="observation-date">
        </div>
        <div id="calendar-container"></div>
    </section>

</main>

<script src="/public/js/popup.js" type="text/javascript"></script>
<script src="/public/js/dashboard/calendar.js" defer></script>
<link rel="stylesheet" href="/public/styles/popup/popup.css">