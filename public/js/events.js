const email = '<%=Session["email"]%>'

const datasheet = document.getElementById("datasheet");
const date_to_search = document.getElementById("date-to-search");
const account_list = document.getElementById("selected-account");
const select_category = document.getElementById("category");

const label_field = document.getElementById("label");
const amount_field = document.getElementById("amount");
const category_field = document.getElementById("category");
const start_field = document.getElementById("event_start");
const end_field = document.getElementById("event_end");
const frequency_field = document.getElementById("frequency");

let accounts = [];
let operation_type_list = [];

onload = () => {
    fill_account_list();
    set_operation_type_list();
    date_to_search.valueAsDate = new Date();
}

// Operation type list

function set_operation_type_list() {
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "/database/api/get_operation_type_list.php", false);
    xhr.onload = () => {
        if (xhr.status == 200) {
            operation_type_list = JSON.parse(xhr.responseText);
        }
        else {
            new_popup("Error getting operation type list", "error");
        }
    };
    xhr.send();
}

function set_select_category() {
    // Get the selected account type by using let accounts
    let accounts_list = JSON.parse(accounts);
    select_category.innerHTML = "";

    accounts_list.forEach(account => {
        if (account.id_account == account_list.value) {
            operation_type_list.forEach(operation_type => {
                if (operation_type.account_type == account.type) {
                    select_category.innerHTML += `<option value="${operation_type.id}">${operation_type.title}</option>`;
                }
            });
        }
    });

    operation_type_list.forEach(operation_type => {
        if (operation_type.account_type == -1) {
            select_category.innerHTML += `<option value="${operation_type.id}">${operation_type.title}</option>`;
        }
    });
}

function delete_element(event_id) {
    console.log(event_id);
    if (confirm("Are you sure you want to delete this operation ?")) {
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "/controler/deleting_elements/event.php?id=" + event_id, true);
        xhr.onload = () => {
            if (xhr.status == 200) {
                update_datasheet();
                new_popup("Event deleted", "success");
            }
            else {
                new_popup("Error deleting operation", "error");
            }
        }
        xhr.send();
    }
}

function update_datasheet() {
    date = date_to_search.value;
    datasheet.innerHTML = "";

    let xhr = new XMLHttpRequest();
    xhr.open("GET", "/database/api/get_events_by_accounts.php?accounts=" + accounts + "&date=" + date, true);
    xhr.onload = () => {
        if (xhr.status == 200) {
            events = JSON.parse(xhr.responseText);
            nb_events = events.length;

            if (nb_events == 0) {
                new_popup("There is no event at this date", "info");
                return;
            }

            if (nb_events == 0) {
                datasheet.innerHTML += `<li class="table-row">
                    <div class="col col-1" data-label="Label"> No regular event in this time </div>
                    <div class="col col-2" data-label="Amount"> --- </div>
                    <div class="col col-3" data-label="Account"> --- </div>
                    <div class="col col-4" data-label="Start"> --- </div>
                    <div class="col col-5" data-label="End"> --- </div>
                    <div class="col col-6" data-label="Frequency"> --- </div>
                    <div class="col col-7" data-label="Category"> --- </div>
                    <div class="col col-8" data-label="Actions"> --- </div>
                </li>`;
            }
            else {
                // trier events par label
                events.sort(function (a, b) {
                    if (a.label < b.label) {
                      return -1;
                    }
                    if (a.label > b.label) {
                      return 1;
                    }
                    return 0;
                  });

                for (let i = 0; i < nb_events; i++) {
                    datasheet.innerHTML += `<li class="table-row">
                        <div class="col col-1" data-label="Label"> ${events[i].label} </div>
                        <div class="col col-2" data-label="Amount"> ${events[i].amount.toFixed(2)} € </div>
                        <div class="col col-3" data-label="Account"> ${accounts_list.find(account => account.id_account === events[i].id_account).label} </div>
                        <div class="col col-4" data-label="Start"> ${events[i].start} </div>
                        <div class="col col-5" data-label="End"> ${events[i].end} </div>
                        <div class="col col-6" data-label="Frequency"> ${events[i].frequency_type == 0 ? "Every Day" : events[i].frequency_type == 1 ? "Every Week" : events[i].frequency_type == 2 ? "Every Month" : "Every Year"} </div>
                        <div class="col col-7" data-label="Category"> ${operation_type_list[events[i].category].title} </div>
                        <div class="col col-8" data-label="Actions"> --- </div>
                    </li>`;

                    if (events[i].amount > 0) {
                        datasheet.children[i].children[1].style.color = "green";
                    }
                    else {
                        datasheet.children[i].children[1].style.color = "red";
                    }

                    datasheet.children[i].children[7].innerHTML = `<img src="/assets/images/edit.png" alt="edit" class="card-button" onclick="edit_element(${events[i].id_regular_event},this)">
                    <img src="/assets/images/trash.png" alt="delete" class="card-button" onclick="delete_element('${events[i].id_regular_event}')">`;
                }
            }
        }
        else {
            new_popup("Error getting events code #1", "error");
        }
    }
    xhr.send();
}

function fill_account_list() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "/database/api/get_accounts_by_user.php?email=" + email, true);
    xhr.onload = () => {
        if (xhr.status == 200) {
            accounts = xhr.responseText;
            accounts_list = JSON.parse(xhr.responseText);

            if (accounts_list.length == 0) {
                new_popup("There is no account yet", "info");
                document.getElementById("event-form").disabled = true;
                return;
            }

            accounts_list.forEach(account => {
                account_list.innerHTML += `<option value="${account.id_account}">${account.label}</option>`;
            });

            update_datasheet();
        }
        else {
            new_popup("Error getting accounts", "error");
        }
    };
    xhr.send();
}

function create_event() {
    label = label_field.value;
    amount = amount_field.value;
    category = category_field.value;
    start = start_field.value;
    end = end_field.value;
    frequency = frequency_field.value;
    account = account_list.value;

    if (label.length > 50) {
        label = label.substring(0, 47) + "...";
    }

    if (label == "" || amount == "" || category == "" || start == "" || end == "" || frequency == "" || account == 0) {
        new_popup("Please fill all the fields", "warn");
    }
    else {
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "/controler/creating_elements/event.php?id_account=" + account_list.value +
            "&label=" + encodeURIComponent(label) +
            "&amount=" + amount +
            "&category=" + category +
            "&start=" + start +
            "&end=" + end +
            "&frequency=" + frequency, true);
        xhr.onload = () => {
            if (xhr.status == 200) {
                update_datasheet();

                label_field.value = "";
                amount_field.value = "";
                category_field.value = 1;
                start_field.value = "";
                end_field.value = "";
                frequency_field.value = 0;

                new_popup("Event created", "success");
            }
            else {
                new_popup("Unknow error creating event", "error");
            }
        };
        xhr.send();
    }
}

function edit_element(id, element) {
    let card = element.parentNode.parentNode;
    card.classList.add("editing-row");

    let start = new Date(card.children[3].innerHTML);
    let end = new Date(card.children[4].innerHTML);
    start.setDate(start.getDate() + 1);
    end.setDate(end.getDate() + 1);

    let frequency = card.children[5].innerHTML == " Every Day " ? 0 : card.children[5].innerHTML == " Every Week " ? 1 : card.children[5].innerHTML == " Every Month " ? 2 : 3;

    let category = 0;
    operation_type_list.forEach(operation_type => {
        if (" " + operation_type.title + " " == card.children[6].innerHTML.replace(/&amp;/g, "&")) {
            category = operation_type.id;
        }
    });

    card.onclick = "";
    card.innerHTML = `
        <input class="col col-1" data-label="Label" value="${card.children[0].innerHTML.slice(1, -1)}" />
        <input class="col col-2" data-label="Amount" type="number" value="${card.children[1].innerHTML.slice(1, -3)}" />
        <input class="col col-3" data-label="Account" disabled/ value="${card.children[2].innerHTML}">
        <input class="col col-4" data-label="Start" type="date" />
        <input class="col col-5" data-label="End" type="date" />

        <select class="col col-6" data-label="Frequency">
            <option value="3">Every year</option>
            <option value="2">Every month</option>
            <option value="1">Every week</option>
            <option value="0">Every day</option>
        </select>

        <select class="col col-7" data-label="Category" id="category_edit">
            ${set_select_category_for_edit()}
        </select>

        <div class="col col-8" data-label="Actions">
            <img src="/assets/images/confirm.png" alt="confirm" class="card-button" onclick='confirm_edit_element(this.parentNode.parentNode.children[0].value, this.parentNode.parentNode.children[1].value, this.parentNode.parentNode.children[3].value, this.parentNode.parentNode.children[4].value, this.parentNode.parentNode.children[5].value, this.parentNode.parentNode.children[6].value, ${id},this)'>
            <img src="/assets/images/cancel.png" alt="cancel" class="card-button" onclick="update_datasheet()">
        </div>`;

    card.children[3].valueAsDate = start;
    card.children[4].valueAsDate = end;
    card.children[5].value = frequency;
    card.children[6].value = category;
}

function set_select_category_for_edit() {
    let temp;
    operation_type_list.forEach(operation_type => {
        temp += `<option value="${operation_type.id}">${operation_type.title}</option>`;
    })
    return temp;
}

function confirm_edit_element(label, amount, start, end, frequency, category, id, element) {
    element.parentNode.innerHTML = `<img src="/assets/images/load.gif" alt="load" class="card-button">`;

    if (label.length > 50) {
        label = label.substring(0, 47) + "...";
    }

    if (label == "" || amount == "" || start == "" || end == "" || frequency == "" || category == "") {
        console.log(label, amount, start, end, frequency, category);
        new_popup("Please fill all the fields", "warn");
    }
    else {
        var xhr = new XMLHttpRequest();
        xhr.open("GET", `/controler/updating_elements/event.php?label=${encodeURIComponent(label)}&amount=${amount}&start=${start}&end=${end}&frequency=${frequency}&category=${category}&id=${id}`, true);
        xhr.onload = () => {
            if (xhr.status == 200) {
                new_popup("Event updated", "success");
                onload();
            }
            else {
                new_popup("Error updating event", "error")
            }
        }
        xhr.send();
    }
}