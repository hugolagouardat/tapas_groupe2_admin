<?php
include_once("Rooter.php");
include_once("Autoloader.php");
include_once("DAO/commandeDAO.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idCommande = $_POST['idCommande'];
    $tableId = $_POST['tableId'];
    $effectue = $_POST['effectue'];

    // Mettez à jour la commande
    commandeDAO::update($tableId, $effectue, $idCommande);

    // Redirigez vers la page d'origine
    //header("Location: tables.php");
    exit;
}

Rooter::redirectToPage("table");

?>
