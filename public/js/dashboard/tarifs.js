const tarifContainer = document.getElementById('prices-container');
const typesNames = {
    0: "Groupe",
    1: "Individuel",
    2: "Spécial"
}

window.onload = (event) => {
    updateDatatable();
}

function updateDatatable() {
    tarifContainer.innerHTML = `<div class="spinner spinner-centered"></div>`;
    fetch('/database/api/get-all-price.php')
        .then(response => response.json())
        .then(data => {
            createTarifRows(data);
        });
}

function createTarifRows(data) {
    data.sort((a, b) => a.type - b.type);
    prices_data = '';

    if (data == null || data.length == 0) {
        prices_data = `</br><div class="alert alert-warning">
                            <div class="alert-icon">!</div>
                            <div class="alert-content">
                                <h4 class="alert-title">Warning</h4>
                                <p class="alert-message">Aucune donnée entregistrée</p>
                            </div>
                        </div>`;
    }
    else {
        prices_data = `</br><div class="alert alert-info">
                            <div class="alert-icon">!</div>
                            <div class="alert-content">
                                <h4 class="alert-title">Info</h4>
                                <p class="alert-message">` + data.length + ` tarifs trouvées</p>
                            </div>
                        </div>`;

        prices_data += `<table class="table table-striped"><thead>
                        <tr>
                            <th class="text-regular">Id</th>
                            <th class="text-regular">Type</th>
                            <th class="text-regular">Label</th>
                            <th class="text-regular">Description</th>
                            <th class="text-regular">Prix</th>
                            <th class="text-regular">Actions</th>
                        </tr>
                    </thead><tbody>`;

        data.forEach(price => {
            prices_data += `<tr>
                                <td class="text-regular">${price.id}</td>
                                <td class="text-regular">${typesNames[price.type]}</td>
                                <td class="text-regular"><input type="text" id="label-input" class="form-input" placeholder="Label" value="${price.label}"></td>
                                <td class="text-regular"><input type="text" id="description-input" class="form-input" placeholder="Description" value="${price.description}"></td>
                                <td class="text-regular"><input type="text" id="price-input" class="form-number" placeholder="42" value="${price.price}"></td>
                                <td class="text-regular">
                                    <img src="/assets/images/icons/save.png" class="card-button" alt="save" onclick="updatePrice('${price.id}',this)">
                                    <img src="/assets/images/icons/trash.png" class="card-button" alt="delete" onclick="deletePrice('${price.id}','${price.label}')">
                                </td>
                            </tr>`;
        });
    }

    tarifContainer.innerHTML = prices_data + `</tbody></table>`;
}

function deletePrice(price_id, label) {
    if (!confirm("Êtes-vous sûr de vouloir supprimer le tarif \"" + label + "\" ?")) {
        return;
    }

    fetch('/database/api/delete-price.php?id=' + price_id)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                new_popup("Tarif supprimée avec succès", "success");
                updateDatatable();
            } else {
                new_popup("Erreur lors de la suppression du tarif", "error");
            }
        })
        .catch(error => {
            console.error("Erreur :", error);
            new_popup("Erreur lors de la suppression du tarif", "error");
        });
}

function updatePrice(id, itself) {
    var label = itself.parentNode.parentNode.querySelector("#label-input").value;
    var description = itself.parentNode.parentNode.querySelector("#description-input").value;
    var price = itself.parentNode.parentNode.querySelector("#price-input").value;
    if (label == "" || description == "" || price == "") {
        new_popup("Veuillez remplir tous les champs", "error");
        return;
    }
    if (isNaN(price)) {
        new_popup("Veuillez entrer un prix valide", "error");
        return;
    }

    fetch('/database/api/update-price.php', {
        method: 'POST',
        headers: {
            'Accept': 'application/x-www-form-urlencoded',
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: new URLSearchParams({
            id: id,
            label: label,
            description: description,
            price: price
        })
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                new_popup("Tarif mise à jour avec succès", "success");
            } else {
                new_popup("Erreur lors de l'update", "error");
            }
        })
        .catch(error => {
            console.error("Erreur :", error);
            new_popup("Erreur 500 de l'update", "error");
        });
}

function addPrice() {
    const priceType = document.getElementById('add-price-type').value;
    const priceLabel = document.getElementById('add-price-label').value;
    const priceDescription = document.getElementById('add-price-description').value;
    const pricePrice = document.getElementById('add-price-price').value;

    if (priceType == "" || priceLabel == "" || priceDescription == "" || pricePrice == "") {
        new_popup("Veuillez remplir tous les champs", "error");
        return;
    }

    fetch('/database/api/add-price.php', {
        method: 'POST',
        headers: {
            'Accept': 'application/x-www-form-urlencoded',
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: new URLSearchParams({
            type: priceType,
            label: priceLabel,
            description: priceDescription,
            price: pricePrice
        })
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                new_popup("Tarif ajoutée avec succès", "success");
                updateDatatable();
            } else {
                new_popup("Erreur lors de l'ajout du tarif", "error");
            }
        })
        .catch(error => {
            console.error("Erreur :", error);
            new_popup("Erreur 500 de l'ajout du tarif", "error");
        });
}