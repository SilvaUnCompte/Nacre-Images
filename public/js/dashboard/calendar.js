const calendarContainer = document.getElementById('calendar-container');
const observationDate = document.getElementById('observation-date');
observationDate.value = new Date().toISOString().split('T')[0];
observationDate.addEventListener('change', fillCalendar);
let workshopType = [];

fetch('/database/api/get-workshop-type-by-id.php')
    .then(response => response.json())
    .then(data => { workshopType = data; })
    .then(fillCalendar)
    .catch(error => console.error(error));



function fillCalendar() {
    var startDate = observationDate.value;
    var endDate = new Date(startDate);
    endDate.setFullYear(endDate.getFullYear() + 1);
    endDate = endDate.toISOString().split('T')[0];

    fetch('/database/api/get-sessions-by-date.php?start_date=' + startDate + '&end_date=' + endDate)
        .then(response => response.json())
        .then(data => {
            createSessionCards(data);
        });
}


function createSessionCards(data) {
    data.forEach(session => {
        let sessionType = workshopType.find(type => type.id == session.type);

        var card = document.createElement('div');
        card.classList.add('session-card');

        card.innerHTML = `
                    <p>${session.date}</p>
                    <h3>${sessionType.topic_name}</h3>
                    <p>${session.additional_information}</p>
                    <a href="/stage/${sessionType.url}">Voir la fiche d'information</a>
                `;

        calendarContainer.appendChild(card);
    });
}