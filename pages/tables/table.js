document.addEventListener("DOMContentLoaded", function () {
    let boutonValider = document.querySelector("#submit");

    boutonValider.addEventListener("click", function (event) {
        event.preventDefault(); 

        let numeroTable = document.querySelector("#numnouvtable").value;

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "http://127.0.0.1:3000/api/table", true);

        let data = {
            "numeroTable": numeroTable,
            "etat": 1
        };

        xhr.onreadystatechange = function () {
            let myModal = new bootstrap.Modal(document.getElementById('exampleModal'));
            myModal.hide();
            location.reload();
        };

        xhr.send(JSON.stringify(data));
    });

    
});
