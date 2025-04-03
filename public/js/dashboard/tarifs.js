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
    console.log(data); //TODO delete me

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

        prices_data += `<table><thead>
                        <tr>
                            <th class="text-regular">Type</th>
                            <th class="text-regular">Label</th>
                            <th class="text-regular">Description</th>
                            <th class="text-regular">Prix</th>
                            <th class="text-regular">Actions</th>
                        </tr>
                    </thead><tbody>`;

        data.forEach(price => {
            prices_data += `<tr>
                            <td class="text-regular">${price.type == 0 ? 'Groupe' : price.type == 1 ? 'Solo' : 'Spécial'}</td>
                            <td class="text-regular"><input type="text" class="additional-information-input form-input" placeholder="Label" value="${price.label}"></td>
                            <td class="text-regular"><input type="text" class="additional-information-input form-input" placeholder="Description" value="${price.description}"></td>
                            <td class="text-regular"><input type="text" class="additional-information-input form-number" placeholder="42" value="${price.price}"></td>
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

    // fetch('/database/api/delete-price.php?price_id=' + price_id)
    //     .then(response => response.json())
    //     .then(data => {
    //         if (data.success) {
    //             new_popup("price supprimée avec succès", "success");
    //             updateDatatable();
    //         } else {
    //             new_popup("Erreur lors de la suppression de la price", "error");
    //         }
    //     })
    //     .catch(error => {
    //         console.error("Erreur :", error);
    //         new_popup("Erreur lors de la suppression de la price", "error");
    //     });
}

// function updatePrice(price_id, itself) {
//     var additional_information = itself.parentNode.parentNode.querySelector(".additional-information-input").value;

//     fetch('/database/api/update-info-price.php', {
//         method: 'POST',
//         headers: {
//             'Accept': 'application/x-www-form-urlencoded',
//             'Content-Type': 'application/x-www-form-urlencoded'
//         },
//         body: new URLSearchParams({
//             price_id: price_id,
//             additional_information: additional_information
//         })
//     })
//         .then(response => response.json())
//         .then(data => {
//             if (data.success) {
//                 new_popup("price mise à jour avec succès", "success");
//             } else {
//                 new_popup("Erreur lors de l'update", "error");
//             }
//         })
//         .catch(error => {
//             console.error("Erreur :", error);
//             new_popup("Erreur 500 de l'update", "error");
//         });
// }

// function addprice() {
//     const priceDate = document.getElementById('price-date').value;
//     const priceTopic = document.getElementById('price-topic').value;
//     const priceInfo = document.getElementById('price-info').value;

//     if (priceDate == "" || priceTopic == 0) {
//         new_popup("Veuillez remplir tous les champs", "error");
//         return;
//     }

//     fetch('/database/api/add-price.php', {
//         method: 'POST',
//         headers: {
//             'Accept': 'application/x-www-form-urlencoded',
//             'Content-Type': 'application/x-www-form-urlencoded'
//         },
//         body: new URLSearchParams({
//             date: priceDate,
//             topic: priceTopic,
//             additional_information: priceInfo
//         })
//     })
//         .then(response => response.json())
//         .then(data => {
//             if (data.success) {
//                 new_popup("price ajoutée avec succès", "success");
//                 updateDatatable();
//             } else {
//                 new_popup("Erreur lors de l'ajout de la price", "error");
//             }
//         })
//         .catch(error => {
//             console.error("Erreur :", error);
//             new_popup("Erreur 500 de l'ajout de la price", "error");
//         });
// }