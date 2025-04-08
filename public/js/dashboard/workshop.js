const toogleButtonPage = document.getElementById("toogle-button-page");
const pageOverview = document.getElementById("page-overview");
const pageEdition = document.getElementById("page-edition");
const priceList = [];
const typesNames = {
	0: "Groupe",
	1: "Individuel",
	2: "Spécial"
}

// Form
const workshopPageName = document.getElementById("workshop-page-name");
const workshopName = document.getElementById("workshop-name");
const workshopUrl = document.getElementById("workshop-url");
const workshopRegularity = document.getElementById("workshop-regularity");

const workshopImageName = document.getElementById("workshop-image-name");
const workshopImageCalendar = document.getElementById("workshop-image-calendar");
const workshopImageAlt = document.getElementById("workshop-image-alt");

const workshopBigTitle = document.getElementById("workshop-big-title");
const workshopSmallTitle = document.getElementById("workshop-small-title");
const workshopParagraph = document.getElementById("workshop-paragraph");
const workshopSeoDesc = document.getElementById("workshop-seo-desc");


window.onload = function () {
	workshopParagraph.innerHTML = baliseToText(workshopParagraph.value);
	getAllPrice();
}

function getAllPrice() {
	fetch('/database/api/get-all-price.php')
		.then(response => {
			if (response.ok) {
				return response.json();
			} else {
				new_popup(`Erreur ${response.status} lors de la récupération des prix`, "error");
				throw new Error(`HTTP status ${response.status}`);
			}
		})
		.then(data => {
			data.forEach(price => {
				priceList.push(price);
			});
		});
}

function toogleView() {
	if (pageOverview.classList.contains("hide")) {
		compileView();
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
	if (
		workshopPageName.value === "" ||
		workshopName.value === "" ||
		workshopUrl.value === "" ||
		workshopRegularity.value === "" ||
		workshopImageName.value === "" ||
		workshopImageCalendar.value === "" ||
		workshopImageAlt.value === "" ||
		workshopBigTitle.value === "" ||
		workshopSmallTitle.value === "" ||
		workshopParagraph.value === "" ||
		workshopSeoDesc.value === ""
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
			page_name: workshopPageName.value,
			name: workshopName.value,
			url: workshopUrl.value,
			regularity: workshopRegularity.value,
			image_name: workshopImageName.value,
			image_calendar: workshopImageCalendar.value,
			image_alt: workshopImageAlt.value,
			big_title: workshopBigTitle.value,
			small_title: workshopSmallTitle.value,
			paragraph: textToBalise(workshopParagraph.value),
			seo_desc: workshopSeoDesc.value
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
	if (
		workshopPageName.value === "" ||
		workshopName.value === "" ||
		workshopUrl.value === "" ||
		workshopRegularity.value === "" ||
		workshopImageName.value === "" ||
		workshopImageCalendar.value === "" ||
		workshopImageAlt.value === "" ||
		workshopBigTitle.value === "" ||
		workshopSmallTitle.value === "" ||
		workshopParagraph.value === "" ||
		workshopSeoDesc.value === ""
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
			page_name: workshopPageName.value,
			name: workshopName.value,
			url: workshopUrl.value,
			regularity: workshopRegularity.value,
			image_name: workshopImageName.value,
			image_calendar: workshopImageCalendar.value,
			image_alt: workshopImageAlt.value,
			big_title: workshopBigTitle.value,
			small_title: workshopSmallTitle.value,
			paragraph: textToBalise(workshopParagraph.value),
			seo_desc: workshopSeoDesc.value
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

function compileView() {
	const paragraph = textifyPrice(workshopParagraph.value);

	const html = `<div id="title-container">
						<h1 class="big-h1">${workshopBigTitle.value}</h1>
						<hr><br>
					</div>
					<div class="inline-container container">
						<img src="/assets/images/topics/${workshopImageName.value}" alt=${workshopImageAlt.value}>
						<div>
							<h2 class="big-h2">
								${workshopSmallTitle.value}
							</h2>

							<p class="paragraph">
								${textToBalise(paragraph)}
							</p>
						</div>
					</div>`;

	pageOverview.innerHTML = html;
}

function baliseToText(baliseString) {
	const textString = baliseString
		.replace(/<br\s*\/?>/gi, "\n")
		.replace(/<span style="font-weight: bold;">(.*?)<\/span>/gi, "**$1**")
		.replace(/<span style="font-style: italic;">(.*?)<\/span>/gi, "*$1*")
		.replace(/<span style="text-decoration: underline;">(.*?)<\/span>/gi, "__$1__")

	return textString;
}

function textToBalise(text) {
	const baliseString = text
		.replace(/\*\*(.*?)\*\*/g, '<span style="font-weight: bold;">$1</span>')
		.replace(/\*(.*?)\*/g, '<span style="font-style: italic;">$1</span>')
		.replace(/__(.*?)__/g, '<span style="text-decoration: underline;">$1</span>')
		.replace(/\n/g, "<br>");

	return baliseString;
}

function textifyPrice(text) {
	const result = text.replace(/\{(\d+(\+|\_|\*))\}/g, (match, id) => {
		const price = priceList.find(price => price.id == id.slice(0, -1));

		if (id.endsWith('*')) {
			return price ? `${price.price} €` : match;
		} else if (id.endsWith('_')) {
			return price ? `${price.label}` : match;
		} else if (id.endsWith('+')) {
			return price ? `${typesNames[price.type]}` : match;
		}
	});

	return result;
}