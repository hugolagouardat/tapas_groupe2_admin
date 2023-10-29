document.addEventListener("DOMContentLoaded", function () {
	let boutonValider = document.querySelector("#submit");

	boutonValider.addEventListener("click", function (event) {
		event.preventDefault(); // Empêcher la soumission du formulaire

		let numeroTable = document.querySelector("#numnouvtable").value;

		// Appel AJAX pour insérer une nouvelle table
		let xhr = new XMLHttpRequest();
		xhr.open("POST", "http://127.0.0.1:3000/api/table", true);

		let data = {
			"numeroTable": numeroTable,
			"etat": 1
		};

		xhr.onreadystatechange = function () {
			// Fermer la modal
			let myModal = new bootstrap.Modal(document.getElementById('exampleModal'));
			myModal.hide();

			// Rafraîchir la page
			location.reload();

		};

		xhr.send(JSON.stringify(data));
	});

	// Sélectionner tous les boutons qui peuvent changer d'état
	let buttons = document.querySelectorAll(".change-effectue");

	buttons.forEach(button => {
		button.addEventListener("click", function (event) {
			let commandeId = this.getAttribute("data-id");
			let tableId = this.getAttribute("data-tableid");

			// Faites la requête AJAX ici
			let xhr = new XMLHttpRequest();
			xhr.open("PUT", "http://127.0.0.1:3000/api/commandes");

			xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");

			/*let data = {
				"tableId": tableId,
				"effectue": (this.classList.contains("btn-success")) ? 0 : 1,
				"idCommande": commandeId
			};*/

			let data = {
				"tableId": 1,
				"effectue": 0,
				"idCommande": 1
			}

			xhr.onreadystatechange = function () {
				//if (xhr.readyState == 4 && xhr.status == 200) {
				// Mettez à jour le bouton ici
				if (button.classList.contains("btn-success")) {
					button.textContent = "Marquer comme effectuée";
					button.classList.remove("btn-success");
					button.classList.add("btn-primary");
				} else {
					button.textContent = "Commande effectuée";
					button.classList.remove("btn-primary");
					button.classList.add("btn-success");
				}
				//}
			};

			xhr.send(JSON.stringify(data));
		});
	});
	let clearButtons = document.querySelectorAll(".clear-btn");

	clearButtons.forEach(button => {
		button.addEventListener("click", function (event) {
			let tableId = this.getAttribute("data-tableid");

			// Rassemblez toutes les commandes pour cette table spécifique
			let tableCommandes = Array.from(document.querySelectorAll(`[data-tableid='${tableId}']`)).map(btn => btn.getAttribute("data-id"));

			// Supprimez chaque commande
			tableCommandes.forEach(commandeId => {
				deleteCommande(commandeId);
			});
		});
	});
	function deleteCommande(commandeId) {
		let xhr = new XMLHttpRequest();
		//xhr.open("DELETE", `http://127.0.0.1:3000/api/commandes/${commandeId}`, true);
		xhr.open("DELETE", `http://127.0.0.1:3000/api/commandes/1`, true);

		xhr.onreadystatechange = function () {
			if (xhr.readyState == 4 && xhr.status == 200) {
				console.log("Commande supprimée:", commandeId);
				// Si vous souhaitez rafraîchir la page ou effectuer une autre action après la suppression, faites-le ici.
			}
		};
		xhr.send();
	}

});


