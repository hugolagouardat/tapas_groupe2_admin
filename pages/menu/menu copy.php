<?php

// Inclure les DAO nécessaires
include_once("DAO/categorieDAO.php");
include_once("DAO/tapasDAO.php");
include_once("DAO/categorieTapasDAO.php");

$categories = CategorieTapasDAO::getAllCategorieTapas();
var_dump($categories);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tapas</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>

<div class="container mt-4">

    <?php foreach ($categories as $categorie) : ?>
        <div class="card mb-4">
            <div class="card-header">
                Categorie: <?php echo $categorie->getCategorieId(); ?>
            </div>
            <div class="card-body">
                <div class="row">

                    <?php
                    $tapasList = tapasDAO::getAlltapas();
                    foreach ($tapasList as $tapas) :
                        if ($tapas->getIdTapas() == $categorie->getTapasId()) :
                    ?>

                            <div class="col-md-4">
                                <div class="card mb-4">
                                    <img src="<?php echo $tapas->getImage(); ?>" class="card-img-top" alt="Image de Tapas">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $tapas->getNom(); ?></h5>
                                        <p class="card-text"><?php echo $tapas->getDescription(); ?></p>
                                        <p class="card-text"><strong>Prix:</strong> <?php echo $tapas->getPrix(); ?>€</p>
                                    </div>
                                </div>
                            </div>

                        <?php endif; ?>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    <?php endforeach; ?>

</div>

</body>
</html>
