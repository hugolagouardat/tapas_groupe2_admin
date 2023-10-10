<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        $commandes = commandeDAO::getAllcommandes();
        $commandesParTable = array_filter($commandes, function($commande) use ($table) {
            return $commande->getTableId() == $table->getIdTable();
        });

        // Vérifie si la table a des commandes
        if (count($commandesParTable) > 0) {
            ?>
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="mb-0">Table N°<?= $table->getIdTable(); ?></h5>
                    <button class="btn btn-danger">Clean</button>
                </div>
                <div class="card-body">
                    <?php
                    foreach ($commandesParTable as $commande) {
                        $contenues = contenueCommandeDAO::getAllcontenues();
                        $contenuesParCommande = array_filter($contenues, function($contenu) use ($commande) {
                            return $contenu->getCommandeId() == $commande->getIdCommande();
                        });

                        // Vérifie si la commande a des contenus
                        if (count($contenuesParCommande) > 0) {
                            echo "<h6>Commande N°" . $commande->getIdCommande() . "</h6>";
                            echo "<ul class='list-group mb-3'>";

                            foreach ($contenuesParCommande as $contenu) {
                                $tapas = tapasDAO::get($contenu->getTapasId());
                                echo "<li class='list-group-item d-flex justify-content-between align-items-center'>";
                                echo $tapas['nom'];
                                echo "<span class='badge badge-primary badge-pill'>" . $contenu->getNombre() . "</span>";
                                echo "</li>";
                            }

                            if ($commande->getEffectue()) {
                                // Si la commande est effectuée
                                echo "<button class='btn btn-success'>Commande effectuée</button>";
                            } else {
                                // Si la commande n'est pas encore effectuée
                                echo "<button class='btn btn-primary'>Marquer comme effectuée</button>";
                            }

                            echo "</ul>";
                        }
                    }
                    ?>
                </div>
            </div>
            <?php
        }
    }
    ?>
</div>

</body>
</html>
