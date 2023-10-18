<?php

$categoriesRelations = CategorieTapasDAO::getAllCategorieTapas();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modif Menu</title>

    <!-- Bootstrap CSS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-4">

    <?php 
    //$handledCategories = []; 

    foreach ($categoriesRelations as $relation) : 

        //if (!in_array($relation->getCategorieId(), $handledCategories)) :
            //array_push($handledCategories, $relation->getCategorieId());
    ?>

        <div class="card mb-4">
            <div class="card-header">
                Categorie: <?php echo $relation->getCategorieId(); ?>
            </div>
            <div class="card-body">
                <div class="row">


                </div>
            </div>
        </div>

    <?php 
        //endif;
    endforeach; 
    ?>

</div>

</body>
</html>
