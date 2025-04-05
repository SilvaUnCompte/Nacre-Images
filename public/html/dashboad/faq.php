<main>
    <section class="display-block">
        <div class="form-group">
            <label for="add-rank" class="form-label">Rang</label>
            <input type="number" id="add-rank" class="form-number" placeholder="12">
        </div>
        <div class="form-group">
            <label for="add-question" class="form-label">Question</label>
            <textarea id="add-question" class="form-textarea" placeholder="Une bonne question"></textarea>
        </div>
        <div>
            <div class="form-group">
                <label for="add-answer" class="form-label">Réponse</label>
                <textarea id="add-answer" class="form-textarea" placeholder="Une réponse tout aussi bonne !"></textarea>
            </div>
        </div>
        <div>
            <button id="create-event" class="btn btn-primary" type="button" onclick="addQuestion()">Ajouter</button>
        </div>

    </section>

    <section class="display-block">
        <div id="faq-container">
            <div class="spinner spinner-centered"></div>
        </div>
    </section>

</main>

<script src="/public/js/popup.js" type="text/javascript"></script>
<script src="/public/js/dashboard/faq.js" defer></script>
<link rel="stylesheet" href="/public/styles/popup/popup.css">