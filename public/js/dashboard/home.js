function onload() {
    fetch('/database/api/get-next-session.php')
        .then(response => response.json())
        .then(session_data => {
            fetch('/database/api/get-workshop-type-by-id.php?id=' + session_data.type)
                .then(response => response.json())
                .then(type_data => {
                    if (type_data) {
                        document.getElementById('next-session-date').innerText = new Date(session_data.date).toLocaleDateString();
                        document.getElementById('next-session-type').innerText = type_data.topic_name;
                        document.getElementById('next-session-info').innerText = session_data.additional_information;
                    }
                    else {
                        document.getElementById('next-session-date').innerText = "Rien de prévu";
                        document.getElementById('next-session-type').innerText = "";
                        document.getElementById('next-session-info').innerText = ""
                    }
                })
                .catch(error => {
                    console.error('Error fetching last session:', error);
                });
        })
        .catch(error => {
            console.error('Error fetching next session:', error);
        });
}

onload();