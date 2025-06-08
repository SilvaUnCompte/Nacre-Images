function onload() {

    // Next session

    fetch('/api/get-next-session')
        .then(response => response.json())
        .then(session_data => {
            if (session_data) {
                document.getElementById('next-session-date').innerText = new Date(session_data.date).toLocaleDateString();
                document.getElementById('next-session-type').innerText = session_data.topic_name;

                if (session_data.additional_information == null || session_data.additional_information == "") {
                    document.getElementById('next-session-info').innerText = "Aucune information supplémentaire";
                }
                else {
                    document.getElementById('next-session-info').innerText = session_data.additional_information;
                }
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
}

onload();