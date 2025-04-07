
window.onload = function () {
	const message = document.getElementById("message").innerHTML;
	console.log(message);

	switch (message) {
		case "0":
			new_popup("Stage supprimée avec succès", "success");
			break;
		case "1":
			new_popup("Stage mis à jour avec succès", "success");
			break;
	}
};