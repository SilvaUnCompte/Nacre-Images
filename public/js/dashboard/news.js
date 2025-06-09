const newsContainer = document.getElementById('news-container');

window.onload = (event) => {
    updateDatatable();
}

function updateDatatable() {
    newsContainer.innerHTML = `<div class="spinner spinner-centered"></div>`;
    fetch('/api/get-news')
        .then(response => response.json())
        .then(data => {
            createNewsRows(data);
        });
}

function createNewsRows(data) {
    if (data == null || data.length == 0) {
        news_data = `</br><div class="alert alert-warning">
                            <div class="alert-icon">!</div>
                            <div class="alert-content">
                                <h4 class="alert-title">Warning</h4>
                                <p class="alert-message">Aucune donnée entregistrée</p>
                            </div>
                        </div>`;
    }
    else {
        news_data = `</br><div class="alert alert-info">
                            <div class="alert-icon">!</div>
                            <div class="alert-content">
                                <h4 class="alert-title">Info</h4>
                                <p class="alert-message">` + data.length + ` news trouvées</p>
                            </div>
                        </div>`;

        news_data += `<table class="table table-striped"><thead>
                        <tr>
                            <th class="text-regular">Titre</th>
                            <th class="text-regular">Infos</th>
                            <th class="text-regular">Date de début</th>
                            <th class="text-regular">Date de fin</th>
                            <th class="text-regular">Affiché</th>
                            <th class="text-regular">Actions</th>
                        </tr>
                    </thead><tbody>`;

        data.forEach(news => {
            news_data += `<tr>
                                <td class="text-regular"> <input type="text" class="form-input news-title" placeholder="Label" value="${news.title}"></td>
                                <td class="text-regular"> <textarea type="textarea" class="question-textarea form-textarea news-info" maxlength ="350" placeholder="Une question ?">${news.info}</textarea></td>
                                <td class="text-regular"> <input type="date" class="form-input news-start" placeholder="Label" value="${news.start_date}"></td>
                                <td class="text-regular"> <input type="date" class="form-input news-end" placeholder="Description" value="${news.end_date}"></td>
                                <td class="text-regular"> <input type="checkbox" class="form-checkbox news-visible" ${news.visible ? 'checked' : ''}> </td>
                                <td class="text-regular">
                                    <img src="/assets/images/icons/save.png" class="card-button" alt="save" onclick="updateNews('${news.id}',this)">
                                    <img src="/assets/images/icons/trash.png" class="card-button" alt="delete" onclick="deleteNews('${news.id}','${news.title}')">
                                </td>
                            </tr>`;
        });
    }

    newsContainer.innerHTML = news_data + `</tbody></table>`;
}

function deleteNews(news_id, title) {
    if (!confirm("Êtes-vous sûr de vouloir supprimer \"" + title + "\" ?")) {
        return;
    }

    fetch('/api/delete-news?id=' + news_id)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                new_popup("News supprimée avec succès", "success");
                updateDatatable();
            } else {
                new_popup("Erreur lors de la suppression de la News", "error");
            }
        })
        .catch(error => {
            console.error("Erreur :", error);
            new_popup("Erreur lors de la suppression de la News", "error");
        });
}

function updateNews(id, itself) {
    var title = itself.parentNode.parentNode.querySelector(".news-title").value;
    var description = itself.parentNode.parentNode.querySelector(".news-info").value;
    var start_date = itself.parentNode.parentNode.querySelector(".news-start").value;
    var end_date = itself.parentNode.parentNode.querySelector(".news-end").value;
    var visible = itself.parentNode.parentNode.querySelector(".news-visible").checked ? 1 : 0;

    console.log("Updating news with ID:", start_date, end_date);

    if (title == "" || description == "" || start_date == "" || end_date == "") {
        new_popup("Veuillez remplir tous les champs", "error");
        return;
    }

    fetch('/api/update-news', {
        method: 'POST',
        headers: {
            'Accept': 'application/x-www-form-urlencoded',
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: new URLSearchParams({
            id: id,
            title: title,
            info: description,
            start_date: start_date,
            end_date: end_date,
            visible: visible
        })
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                new_popup("News mise à jour avec succès", "success");
            } else {
                new_popup("Erreur lors de l'update", "error");
            }
        })
        .catch(error => {
            console.error("Erreur :", error);
            new_popup("Erreur 500 de l'update", "error");
        });
}

function addNews() {
    const newsTitle = document.getElementById('add-news-title').value;
    const newsInfo = document.getElementById('add-news-info').value;
    const newsStartDate = document.getElementById('add-news-start-date').value;
    const newsEndDate = document.getElementById('add-news-end-date').value;
    const newsVisible = document.getElementById('add-news-visible').checked;

    if (newsTitle == "" || newsInfo == "" || newsStartDate == "" || newsEndDate == "") {
        new_popup("Veuillez remplir tous les champs", "error");
        return;
    }

    fetch('/api/add-news', {
        method: 'POST',
        headers: {
            'Accept': 'application/x-www-form-urlencoded',
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: new URLSearchParams({
            title: newsTitle,
            info: newsInfo,
            start_date: newsStartDate,
            end_date: newsEndDate,
            visible: newsVisible ? 1 : 0
        })
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                new_popup("News ajoutée avec succès", "success");
                updateDatatable();
            } else {
                new_popup("Erreur lors de l'ajout de la News", "error");
            }
        })
        .catch(error => {
            console.error("Erreur :", error);
            new_popup("Erreur 500 de l'ajout de la News", "error");
        });
}