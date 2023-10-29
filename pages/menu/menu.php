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
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#newTapasModal">New Tapas</button>
                    <button class="btn btn-danger">Modif Catégorie</button>
                    <a href="index.php" class="btn btn-warning">Retour Commande</a>

                </div>
            </div>
        </div>

        <div class="row">
            <?php
            $tapasList = tapasDAO::getAlltapas();
            foreach ($tapasList as $tapas) :
                $categoriesForCurrentTapas = [];

                // Récupérer l'ID du tapas actuel
                $currentTapasId = $tapas->getIdTapas();

                // Parcourir les relations catégories-tapas pour trouver les catégories de ce tapas
                foreach ($categoriesRelations as $relation) {
                    if ($relation->getTapasId() == $currentTapasId) {
                        // Récupérer l'ID de la catégorie de cette relation
                        $categoryId = $relation->getCategorieId();

                        // Récupérer le nom de la catégorie par son ID
                        $category = categorieDAO::get($categoryId);
                        $categoriesForCurrentTapas[] = $category["libelle"];
                    }
                }
            ?>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="http://127.0.0.1/projet/restaurant_tapas/tapas_groupe2_webservice/src/images/<?php echo $tapas->getImage(); ?>" class="card-img-top" alt="Image de Tapas">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $tapas->getNom(); ?></h5>
                            <p class="card-text"><?php echo $tapas->getDescription(); ?></p>
                            <p class="card-text"><strong>Prix:</strong> <?php echo $tapas->getPrix(); ?>€</p>

                            <?php foreach ($categoriesRelations as $relation) {
                                if ($relation->getTapasId() == $currentTapasId) {
                                    $categoryId = $relation->getCategorieId();
                                    $category = categorieDAO::get($categoryId);
                                    $categoriesForCurrentTapas[] = $category["libelle"];
                                };
                                
                            };
                            ?>

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
    <!-- Modal for New Tapas -->
    <div class="modal fade" id="newTapasModal" tabindex="-1" aria-labelledby="newTapasModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newTapasModalLabel">Nouveau Tapas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="tapasForm">
                        <!-- Input for image -->
                        <div class="mb-3">
                            <label for="tapasImage" class="form-label">Image</label>
                            <input type="file" class="form-control" id="tapasImage" accept="image/*" required>
                        </div>
                        <!-- Input for name -->
                        <div class="mb-3">
                            <label for="tapasName" class="form-label">Nom</label>
                            <input class="form-control" id="tapasNom" rows="3" required><input>
                        </div>
                        <!-- Input for description -->
                        <div class="mb-3">
                            <label for="tapasDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="tapasDescription" rows="3" required></textarea>
                        </div>
                        <!-- Input for price -->
                        <div class="mb-3">
                            <label for="tapasPrice" class="form-label">Prix</label>
                            <input type="number" class="form-control" id="tapasPrice" step="0.5" required>
                        </div>
                        <!-- Input for filters (assuming they are checkboxes) -->
                        <div class="mb-3">
                            <!-- Example for one filter, add more as needed -->
                            <div class="form-check">
                                <!-- Input for filters -->
                                <?php
                                $allCategories = categorieDAO::getAllcategories();
                                foreach ($allCategories as $category) :
                                ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="<?php echo $category->getIdCategorie(); ?>" id="filter_<?php echo $category->getIdCategorie(); ?>" name="tapasCategory[]">
                                        <label class="form-check-label" for="filter_<?php echo $category->getIdCategorie(); ?>">
                                            <?php echo $category->getLibelle(); ?>
                                        </label>
                                    </div>
                                <?php endforeach; ?>

                                </label>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="button" class="btn btn-primary" id="saveTapas">Sauvegarder</button>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
<script>
    document.querySelector("#saveTapas").addEventListener("click", function() {
        let imageFile = document.querySelector("#tapasImage").files[0];
        let name = document.querySelector("#tapasNom").value;
        let description = document.querySelector("#tapasDescription").value;
        let price = document.querySelector("#tapasPrice").value;

        let selectedCategories = [];
        let categoryCheckboxes = document.querySelectorAll("input[name='tapasCategory[]']:checked");
        categoryCheckboxes.forEach(function(checkbox) {
            selectedCategories.push(checkbox.value);
        });

        // Convert image to Base64
        let reader = new FileReader();
        reader.readAsDataURL(imageFile);
        reader.onload = function() {
            let base64Image = reader.result.split(',')[1];

            // Here, send the base64Image, name, description, price, and selected categories to the server
            let dataToSend = new FormData();
            dataToSend.append('image', base64Image);
            dataToSend.append('name', name);
            dataToSend.append('description', description);
            dataToSend.append('price', price);
            dataToSend.append('categories', JSON.stringify(selectedCategories));

            fetch('index.php?page=insert_tapas.php', {
                method: 'POST',
                body: dataToSend,
            }).then(response => {
                return response.text();
            }).then(data => {
                console.log(data);
            }).catch(error => {
                console.error('Error:', error);
            });
        };
    });
</script>