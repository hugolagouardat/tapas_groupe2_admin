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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>

<div class="container mt-4">
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between">
            <h5 class="mb-0">Création / Modification</h5>
            <div>
                <button class="btn btn-primary">New Tapas</button>
                <button class="btn btn-warning">Modif Catégorie</button>
                <button class="btn btn-primary">Retour au commande</button>

            </div>
        </div>
    </div>

    <div class="row">
        <?php
        $tapasList = tapasDAO::getAlltapas();
        foreach ($tapasList as $tapas) :
            // Ici, vous devez ajouter une logique pour récupérer les catégories pour le tapas actuel.
            $categoriesForCurrentTapas = []; // Utilisez une méthode pour cela
        ?>
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="http://127.0.0.1/projet/restaurant_tapas/tapas_groupe2_webservice/src/images/<?php echo $tapas->getImage(); ?>" class="card-img-top" alt="Image de Tapas">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $tapas->getNom(); ?></h5>
                        <p class="card-text"><?php echo $tapas->getDescription(); ?></p>
                        <p class="card-text"><strong>Prix:</strong> <?php echo $tapas->getPrix(); ?>€</p>

                        <?php foreach ($categoriesForCurrentTapas as $category): ?>
                            <p class="card-text"><strong>Catégorie:</strong> <?php echo $category; ?></p>
                        <?php endforeach; ?>

                        <a href="#" class="btn btn-primary">Modification</a>
                        <a href="#" class="btn btn-danger">Suppression</a>
                    </div>
                </div>
            </div>
        <?php
        endforeach;
        ?>
    </div>
</div>
</body>

</html>
