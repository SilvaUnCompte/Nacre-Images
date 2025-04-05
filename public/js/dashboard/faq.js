const tarifContainer = document.getElementById('faq-container');

window.onload = (event) => {
    updateDatatable();
}

function updateDatatable() {
    tarifContainer.innerHTML = `<div class="spinner spinner-centered"></div>`;
    fetch('/database/api/get-faq.php')
        .then(response => response.json())
        .then(data => {
            createFaqRows(data);
        });
}

function createFaqRows(data) {
    rows = '';

    if (data == null || data.length == 0) {
        rows = `</br><div class="alert alert-warning">
                            <div class="alert-icon">!</div>
                            <div class="alert-content">
                                <h4 class="alert-title">Warning</h4>
                                <p class="alert-message">Aucune donnée entregistrée</p>
                            </div>
                        </div>`;
    }
    else {
        rows = `</br><div class="alert alert-info">
                            <div class="alert-icon">!</div>
                            <div class="alert-content">
                                <h4 class="alert-title">Info</h4>
                                <p class="alert-message">` + data.length + ` questions trouvées</p>
                            </div>
                        </div>`;

        rows += `<table><thead>
                        <tr>
                            <th class="text-regular">Rang</th>
                            <th class="text-regular">Question</th>
                            <th class="text-regular">Réponse</th>
                            <th class="text-regular">Actions</th>
                        </tr>
                    </thead><tbody>`;

        data.forEach(faq => {
            rows += `<tr>
                        <td class="text-regular"><input type="text" class="rank-input form-number" placeholder="42" value="${faq.rank}"></td>
                        <td class="text-regular"><textarea type="textarea" class="question-textarea form-textarea" placeholder="Une question ?">${faq.question}</textarea></td>
                        <td class="text-regular"><textarea type="textarea" class="answer-textarea form-textarea" placeholder="Une réponse !">${faq.answer}</textarea></td>
                        <td class="text-regular">
                            <img src="/assets/images/icons/save.png" class="card-button" alt="save" onclick="updateQuestion('${faq.id}',this)">
                            <img src="/assets/images/icons/trash.png" class="card-button" alt="delete" onclick="deleteQuestion('${faq.id}','${faq.question}')">
                        </td>
                    </tr>`;
        });
    }

    tarifContainer.innerHTML = rows + `</tbody></table>`;
}

function deleteQuestion(id, question) {
    if (!confirm("Êtes-vous sûr de vouloir supprimer \"" + question + "\" ?")) {
        return;
    }

    fetch('/database/api/delete-question.php?id=' + id)
        .then(response => {
            if (response.status != 200) {
                new_popup("Erreur lors de la suppression", "error");
                throw new Error("Erreur lors de la suppression : " + response.status);
            }
        })
        .then(() => {
            new_popup("Question supprimée avec succès", "success");
            updateDatatable();
        })
        .catch(error => {
            console.log("tt2")
            console.error("Erreur :", error);
            new_popup("Erreur lors de la suppression", "error");
        });
}

function updateQuestion(id, itself) {
    const rank = itself.parentNode.parentNode.querySelector(".rank-input").value;
    const question = itself.parentNode.parentNode.querySelector(".question-textarea").value;
    const answer = itself.parentNode.parentNode.querySelector(".answer-textarea").value;

    if (rank == "" || question == "" || answer == "") {
        new_popup("Veuillez remplir tous les champs", "error");
        return;
    }
    if (isNaN(rank) || rank < 1) {
        new_popup("Veuillez entrer un prix valide", "error");
        return;
    }

    fetch('/database/api/update-question.php', {
        method: 'POST',
        headers: {
            'Accept': 'application/x-www-form-urlencoded',
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: new URLSearchParams({
            id: id,
            rank: rank,
            question: question,
            answer: answer
        })
    })
        .then(response => {
            if (response.status == 200) {
                new_popup("Question mise à jour avec succès", "success");
                updateDatatable();
            } else {
                new_popup("Erreur lors de l'update " + response.status, "error");
            }
        })
        .catch(error => {
            console.error("Erreur :", error);
            new_popup("Erreur 500 de l'update", "error");
        });
}

function addQuestion() {
    const rank = document.getElementById('add-rank').value;
    const question = document.getElementById('add-question').value;
    const answer = document.getElementById('add-answer').value;

    if (rank == "" || question == "" || answer == "") {
        new_popup("Veuillez remplir tous les champs", "error");
        return;
    }

    fetch('/database/api/add-question.php', {
        method: 'POST',
        headers: {
            'Accept': 'application/x-www-form-urlencoded',
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: new URLSearchParams({
            rank: rank,
            question: question,
            answer: answer
        })
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                new_popup("Question ajoutée avec succès", "success");
                updateDatatable();
            } else {
                new_popup("Erreur lors de l'ajout", "error");
            }
        })
        .catch(error => {
            console.error("Erreur :", error);
            new_popup("Erreur 500 de l'ajout", "error");
        });
}