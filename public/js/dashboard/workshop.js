const toogleButtonPage = document.getElementById("toogle-button-page");
const pageOverview = document.getElementById("page-overview");
const pageEdition = document.getElementById("page-edition");

function toogleView() {
	if (pageOverview.classList.contains("hide")) {
		pageOverview.classList.remove("hide");
		pageEdition.classList.add("hide");
		toogleButtonPage.innerHTML = "Édition";
	} else {
		pageOverview.classList.add("hide");
		pageEdition.classList.remove("hide");
		toogleButtonPage.innerHTML = "Aperçu";
	}
}

function deleteWorkshop(workshopId) {
	if (confirm("Supprimer le stage ?")) {
		fetch(`/database/api/delete-workshop.php?id=${workshopId}`)
			.then((response) => {
				if (response.status === 200) {
					backToList(0);
				} else {
					new_popup("Erreur lors de la suppression du stage", "error");
				}
			})
			.catch((error) => {
				new_popup(`Erreur : ${error}`, "error");
			});
	}
}

function updateWorkshop(workshopId) {
	const workshopPageName = document.getElementById("workshop-page-name").value;
	const workshopName = document.getElementById("workshop-name").value;
	const workshopUrl = document.getElementById("workshop-url").value;
	const workshopRegularity = document.getElementById("workshop-regularity").value;

	const workshopImageName = document.getElementById("workshop-image-name").value;
	const workshopImageCalendar = document.getElementById("workshop-image-calendar").value;
	const workshopImageAlt = document.getElementById("workshop-image-alt").value;

	const workshopBigTitle = document.getElementById("workshop-big-title").value;
	const workshopSmallTitle = document.getElementById("workshop-small-title").value;
	const workshopParagraph = document.getElementById("workshop-paragraph").value;
	const workshopSeoDesc = document.getElementById("workshop-seo-desc").value;

	if (
		workshopPageName === "" ||
		workshopName === "" ||
		workshopUrl === "" ||
		workshopRegularity === "" ||
		workshopImageName === "" ||
		workshopImageCalendar === "" ||
		workshopImageAlt === "" ||
		workshopBigTitle === "" ||
		workshopSmallTitle === "" ||
		workshopParagraph === "" ||
		workshopSeoDesc === ""
	) {
		new_popup("Veuillez remplir tous les champs", "error");
		return;
	}

	fetch('/database/api/update-workshop.php', {
		method: 'POST',
		headers: {
			'Accept': 'application/x-www-form-urlencoded',
			'Content-Type': 'application/x-www-form-urlencoded'
		},
		body: new URLSearchParams({
			id: workshopId,
			page_name: workshopPageName,
			name: workshopName,
			url: workshopUrl,
			regularity: workshopRegularity,
			image_name: workshopImageName,
			image_calendar: workshopImageCalendar,
			image_alt: workshopImageAlt,
			big_title: workshopBigTitle,
			small_title: workshopSmallTitle,
			paragraph: workshopParagraph,
			seo_desc: workshopSeoDesc
		})
	})
		.then(response => response.json())
		.then(data => {
			if (data.success) {
				backToList(1);
			} else {
				new_popup("Erreur lors de l'update", "error");
			}
		})
		.catch(error => {
			console.error("Erreur :", error);
			new_popup("Erreur 500 de l'update", "error");
		});
}

function createWorkshop() {
	const workshopPageName = document.getElementById("workshop-page-name").value;
	const workshopName = document.getElementById("workshop-name").value;
	const workshopUrl = document.getElementById("workshop-url").value;
	const workshopRegularity = document.getElementById("workshop-regularity").value;

	const workshopImageName = document.getElementById("workshop-image-name").value;
	const workshopImageCalendar = document.getElementById("workshop-image-calendar").value;
	const workshopImageAlt = document.getElementById("workshop-image-alt").value;

	const workshopBigTitle = document.getElementById("workshop-big-title").value;
	const workshopSmallTitle = document.getElementById("workshop-small-title").value;
	const workshopParagraph = document.getElementById("workshop-paragraph").value;
	const workshopSeoDesc = document.getElementById("workshop-seo-desc").value;

	if (
		workshopPageName === "" ||
		workshopName === "" ||
		workshopUrl === "" ||
		workshopRegularity === "" ||
		workshopImageName === "" ||
		workshopImageCalendar === "" ||
		workshopImageAlt === "" ||
		workshopBigTitle === "" ||
		workshopSmallTitle === "" ||
		workshopParagraph === "" ||
		workshopSeoDesc === ""
	) {
		new_popup("Veuillez remplir tous les champs", "error");
		return;
	}

	fetch('/database/api/add-workshop.php', {
		method: 'POST',
		headers: {
			'Accept': 'application/x-www-form-urlencoded',
			'Content-Type': 'application/x-www-form-urlencoded'
		},
		body: new URLSearchParams({
			page_name: workshopPageName,
			name: workshopName,
			url: workshopUrl,
			regularity: workshopRegularity,
			image_name: workshopImageName,
			image_calendar: workshopImageCalendar,
			image_alt: workshopImageAlt,
			big_title: workshopBigTitle,
			small_title: workshopSmallTitle,
			paragraph: workshopParagraph,
			seo_desc: workshopSeoDesc
		})
	})
		.then(response => response.json())
		.then(data => {
			if (data.success) {
				backToList(1);
			} else {
				new_popup("Erreur lors de la création", "error");
			}
		})
		.catch(error => {
			console.error("Erreur :", error);
			new_popup(`Erreur ${error}`, "error");
		});
}

function backToList(message) {
	const form = document.createElement("form");
	form.method = "POST";
	form.action = "/dashboard/liste-des-stages";

	const input = document.createElement("input");
	input.type = "hidden";
	input.name = "message";
	input.value = message;

	form.appendChild(input);
	document.body.appendChild(form);
	form.submit();
}