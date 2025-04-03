const calendarContainer = document.getElementById('calendar-container');
const observationDate = document.getElementById('observation-date');
observationDate.value = new Date().toISOString().split('T')[0];
observationDate.addEventListener('change', updateDatatable);

window.onload = (event) => {
    updateDatatable();
}

function updateDatatable() {
    calendarContainer.innerHTML = `<div class="spinner spinner-centered"></div>`;
    fetch('/database/api/get-sessions-by-date.php?start_date=' + observationDate.value)
        .then(response => response.json())
        .then(data => {
            createSessionCards(data);
        });
}

function createSessionCards(data) {
    calendar_data = '';

    if (data == null || data.length == 0) {
        calendar_data = `</br><div class="alert alert-warning">
                            <div class="alert-icon">!</div>
                            <div class="alert-content">
                                <h4 class="alert-title">Warning</h4>
                                <p class="alert-message">Aucune donnée entregistrée pour cette date</p>
                            </div>
                        </div>`;
    }
    else {
        calendar_data = `</br><div class="alert alert-info">
                            <div class="alert-icon">!</div>
                            <div class="alert-content">
                                <h4 class="alert-title">Info</h4>
                                <p class="alert-message">` + data.length + ` sessions trouvées</p>
                            </div>
                        </div>`;

        calendar_data += `<table  class="table table-striped"><thead>
                        <tr>
                            <th class="text-regular">Date</th>
                            <th class="text-regular">Type</th>
                            <th class="text-regular">Info supplémentaires</th>
                            <th class="text-regular">Actions</th>
                        </tr>
                    </thead><tbody>`;

        data.forEach(session => {
            calendar_data += `<tr>
                            <td class="text-regular">${new Date(session.date).toLocaleDateString('fr-FR')}</td>
                            <td class="text-regular">${session.topic_name}</td>
                            <td class="text-regular"><input type="text" class="additional-information-input form-input" placeholder="Informations supplémentaires" value="${session.additional_information}"></td>
                            <td class="text-regular">
                            <img src="/assets/images/icons/save.png" class="card-button" alt="save" onclick="updateSession('${session.id}',this)">
                                <img src="/assets/images/icons/trash.png" class="card-button" alt="delete" onclick="deleteSession('${session.id}','${session.topic_name}','${new Date(session.date).toLocaleDateString('fr-FR')}')">
                            </td>
                        </tr>`;
        });
    }

    calendarContainer.innerHTML = calendar_data + `</tbody></table>`;
}

function deleteSession(session_id, name, date) {
    if (!confirm("Êtes-vous sûr de vouloir supprimer la session " + name + " du " + date + " ?")) {
        return;
    }

    fetch('/database/api/delete-session.php?session_id=' + session_id)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                new_popup("Session supprimée avec succès", "success");
                updateDatatable();
            } else {
                new_popup("Erreur lors de la suppression de la session", "error");
            }
        })
        .catch(error => {
            console.error("Erreur :", error);
            new_popup("Erreur lors de la suppression de la session", "error");
        });
}

function updateSession(session_id, itself) {
    var additional_information = itself.parentNode.parentNode.querySelector(".additional-information-input").value;

    fetch('/database/api/update-info-session.php', {
        method: 'POST',
        headers: {
            'Accept': 'application/x-www-form-urlencoded',
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: new URLSearchParams({
            session_id: session_id,
            additional_information: additional_information
        })
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                new_popup("Session mise à jour avec succès", "success");
            } else {
                new_popup("Erreur lors de l'update", "error");
            }
        })
        .catch(error => {
            console.error("Erreur :", error);
            new_popup("Erreur 500 de l'update", "error");
        });
}

function addSession() {
    const sessionDate = document.getElementById('session-date').value;
    const sessionTopic = document.getElementById('session-topic').value;
    const sessionInfo = document.getElementById('session-info').value;

    if (sessionDate == "" || sessionTopic == 0) {
        new_popup("Veuillez remplir tous les champs", "error");
        return;
    }

    fetch('/database/api/add-session.php', {
        method: 'POST',
        headers: {
            'Accept': 'application/x-www-form-urlencoded',
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: new URLSearchParams({
            date: sessionDate,
            topic: sessionTopic,
            additional_information: sessionInfo
        })
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                new_popup("Session ajoutée avec succès", "success");
                updateDatatable();
            } else {
                new_popup("Erreur lors de l'ajout de la session", "error");
            }
        })
        .catch(error => {
            console.error("Erreur :", error);
            new_popup("Erreur 500 de l'ajout de la session", "error");
        });
}