<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Insertion des liens vers les fichiers CSS et JS de Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <title>Tables</title>
</head>
<body>

<div class="container mt-4">
    <?php
    include_once("DAO/tableRestoDAO.php");
    include_once("DAO/contenueCommandeDAO.php");
    include_once("DAO/commandeDAO.php");
    include_once("DAO/tapasDAO.php");

    $tables = tableRestoDAO::getAlltable();

    foreach ($tables as $table) {
        ?>
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between">
                <h5 class="mb-0">Table N°<?= $table->getIdTable(); ?></h5>
                <button class="btn btn-danger">Clean</button>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-horizontal-sm">
                    <?php
                    $commandes = commandeDAO::getAllcommandes();
                    foreach ($commandes as $commande) {
                        // Je suppose que l'identifiant de la table est lié à la commande d'une manière ou d'une autre, vous devrez ajuster cela selon votre structure de base de données.
                        if ($commande->getTableId() == $table->getIdTable()) {
                            $contenues = contenueCommandeDAO::getAllcontenues();
                            foreach ($contenues as $contenu) {
                                if ($contenu->getCommandeId() == $commande->getIdCommande()) {
                                    $tapas = tapasDAO::get($contenu->getCommandeId()); // A ajuster selon la structure exacte
                                    echo "<li class='list-group-item d-flex justify-content-between align-items-center'>";
                                    echo $tapas['nom'];
                                    echo "<span class='badge badge-primary badge-pill'>" . "x" . $contenu->getNombre() . "</span>";
                                    echo "<button class='btn btn-success ml-2'>✓</button>";
                                    echo "</li>";
                                }
                            }
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
        <?php
    }
    ?>
</div>

</body>
</html>
