<?php
include_once("DAO/tapasDAO.php");
include_once("DAO/CategorieTapasDAO.php");

if (isset($_POST['name'], $_POST['description'], $_POST['price'], $_POST['image'])) {
    // Get data from POST
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    $categories = json_decode($_POST['categories']);

    // Insert tapas into database
    $tapasId = tapasDAO::insert(null, $image, $price, $description, $name);

    // If tapas insertion is successful, proceed to insert categories
    if ($tapasId) {
        foreach ($categories as $categoryId) {
            CategorieTapasDAO::insert($tapasId, $categoryId);
        }
        echo "Data inserted successfully!";
    } else {
        echo "Error inserting tapas.";
    }
} else {
    echo "Required data not received.";
}
?>
