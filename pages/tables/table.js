let bouton = document.querySelector("button#submit");
bouton.addEventListener ("click", function(event) {
    let nouvelle_table= document.querySelector("#numnouvtable").value;
	let elementClique = event.target;
	console.log(nouvelle_table);
});
