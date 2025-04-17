const serviceContainer = document.getElementById('services-container');
const sectionName = {
    0: "Shooting humain",
    1: "Shooting autre",
    2: "Autres"
}

window.onload = (event) => {
    updateDatatable();
}

function updateDatatable() {
    serviceContainer.innerHTML = `<div class="spinner spinner-centered"></div>`;
    fetch('/database/api/get-all-service.php')
        .then(response => response.json())
        .then(data => {
            createServiceRows(data);
        });
}

function createServiceRows(data) {
    data.sort((a, b) => a.page_part - b.page_part);
    services_data = '';

    if (data == null || data.length == 0) {
        services_data = `</br><div class="alert alert-warning">
                            <div class="alert-icon">!</div>
                            <div class="alert-content">
                                <h4 class="alert-title">Warning</h4>
                                <p class="alert-message">Aucune donnée entregistrée</p>
                            </div>
                        </div>`;
    }
    else {
        services_data = `</br><div class="alert alert-info">
                            <div class="alert-icon">!</div>
                            <div class="alert-content">
                                <h4 class="alert-title">Info</h4>
                                <p class="alert-message">` + data.length + ` services trouvées</p>
                            </div>
                        </div>`;

        services_data += `<table class="table table-striped"><thead>
                        <tr>
                            <th class="text-regular">Section</th>
                            <th class="text-regular">Label</th>
                            <th class="text-regular">Description</th>
                            <th class="text-regular">Prix</th>
                            <th class="text-regular">Lien textuel</th>
                            <th class="text-regular">URL de redirection</th>
                            <th class="text-regular">Actions</th>
                        </tr>
                    </thead><tbody>`;

        data.forEach(service => {
            services_data += `<tr>
                                <td class="text-regular">${sectionName[service.page_part]}</td>
                                <td class="text-regular"><input type="text" class="form-input label-input" placeholder="Label" value="${service.label}"></td>
                                <td class="text-regular"><input type="text" class="form-input description-input" placeholder="Description" value="${service.desc}"></td>
                                <td class="text-regular"><input type="text" class="form-number price-input" placeholder="42€" value="${service.price}"></td>
                                <td class="text-regular"><input type="text" class="form-input link-input" placeholder="Plus de détail ici" value="${service.link}"></td>
                                <td class="text-regular"><input type="text" class="form-input url-input" placeholder="https://unsuper/lieni/ci.html" value="${service.url}"></td>
                                <td class="text-regular">
                                    <img src="/assets/images/icons/save.png" class="card-button" alt="save" onclick="updateService('${service.id}',this)">
                                    <img src="/assets/images/icons/trash.png" class="card-button" alt="delete" onclick="deleteService('${service.id}','${service.label}')">
                                </td>
                            </tr>`;
        });
    }

    serviceContainer.innerHTML = services_data + `</tbody></table>`;
}

function deleteService(service_id, label) {
    if (!confirm("Êtes-vous sûr de vouloir supprimer le service \"" + label + "\" ?")) {
        return;
    }

    fetch('/database/api/delete-service.php?id=' + service_id)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                new_popup("Service supprimée avec succès", "success");
                updateDatatable();
            } else {
                new_popup("Erreur lors de la suppression du service", "error");
            }
        })
        .catch(error => {
            console.error("Erreur :", error);
            new_popup("Erreur lors de la suppression du service", "error");
        });
}

function updateService(id, itself) {
    var label = itself.parentNode.parentNode.querySelector(".label-input").value;
    var description = itself.parentNode.parentNode.querySelector(".description-input").value;
    var price = itself.parentNode.parentNode.querySelector(".price-input").value;
    var link = itself.parentNode.parentNode.querySelector(".link-input").value;
    var url = itself.parentNode.parentNode.querySelector(".url-input").value;

    if (label == "" || description == "") {
        new_popup("Un champ obligatoire est vide", "error");
        return;
    }

    fetch('/database/api/update-service.php', {
        method: 'POST',
        headers: {
            'Accept': 'application/x-www-form-urlencoded',
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: new URLSearchParams({
            id: id,
            label: label,
            description: description,
            price: price,
            link: link,
            url: url
        })
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                new_popup("Service mise à jour avec succès", "success");
            } else {
                new_popup("Erreur lors de l'update", "error");
            }
        })
        .catch(error => {
            console.error("Erreur :", error);
            new_popup("Erreur 500 de l'update", "error");
        });
}

function addService() {
    const serviceType = document.getElementById('add-service-type').value;
    const serviceLabel = document.getElementById('add-service-label').value;
    const serviceDescription = document.getElementById('add-service-description').value;
    const servicePrice = document.getElementById('add-service-price').value;
    const serviceLink = document.getElementById('add-service-link').value;
    const serviceUrl = document.getElementById('add-service-url').value;

    if (serviceType == "" || serviceLabel == "" || serviceDescription == "") {
        new_popup("Veuillez remplir tous les champs obligatoires", "error");
        return;
    }

    fetch('/database/api/add-service.php', {
        method: 'POST',
        headers: {
            'Accept': 'application/x-www-form-urlencoded',
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: new URLSearchParams({
            type: serviceType,
            label: serviceLabel,
            description: serviceDescription,
            price: servicePrice,
            link: serviceLink,
            url: serviceUrl
        })
    })
        .then(response => {
            if (response.status === 200) {
                return response.json();
            } else {
                new_popup("Erreur lors de l'ajout du service", "error");
            }
        })
        .then(data => {
            new_popup("Service ajoutée avec succès", "success");
            updateDatatable();
        })
        .catch(error => {
            console.error("Erreur :", error);
            new_popup("Erreur 500 de l'ajout du service", "error");
        });
}