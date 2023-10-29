<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Tables</title>
</head>

<body>
    <?php
    include_once("DAO/tableRestoDAO.php");
    include_once("DAO/contenueCommandeDAO.php");
    include_once("DAO/commandeDAO.php");
    include_once("DAO/tapasDAO.php");

    // Déplacez ces déclarations avant d'utiliser $commandes et $tables
    $tables = tableRestoDAO::getAlltable();
    $commandes = commandeDAO::getAllcommandes();

    // Ensuite, calculez le nombre total de commandes non effectuées
    $commandesNonEffectuees = array_filter($commandes, function ($commande) {
        return !$commande->getEffectue();
    });
    $nombreCommandesNonEffectuees = count($commandesNonEffectuees);

    // Enfin, calculez le nombre total de tables
    $nombreTables = count($tables);

    ?>
    <div class="container mt-4">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between">
                <h5 class="mb-0">Recapitulatif</h5>
                <div>
                <a href="index.php?page=menu" class="btn btn-warning">Modification menu</a>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Nouvelle table</button>
                </div>

            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Nombre total de commandes non effectuées:
                    <?= $nombreCommandesNonEffectuees; ?>
                </li>
                <li class="list-group-item">Nombre de tables:
                    <?= $nombreTables; ?>
                </li>
            </ul>
        </div>

        <div class="row">
            <?php

            $tables = tableRestoDAO::getAlltable();

            foreach ($tables as $table) {
                $commandes = commandeDAO::getAllcommandes();
                $commandesParTable = array_filter($commandes, function ($commande) use ($table) {
                    return $commande->getTableId() == $table->getIdTable();
                });

                // Vérifie si la table a des commandes
            ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-header d-flex justify-content-between">
                            <h5 class="mb-0">Table N°
                                <?= $table->getNumeroTable(); ?>
                            </h5>
                            <div>
                                <button class="btn btn-warning btn-sm mr-1 clear-btn" >Clear</button>
                                <button class="btn btn-danger btn-sm mr-1">Suppr</button>
                                <button class="btn btn-primary btn-sm">Modif</button>
                            </div>

                        </div>
                        <div class="card-body">

                            <?php
                            if (count($commandesParTable) == 0) {
                                echo "<p class='text-center text-muted'>Aucune commande à cette table</p>";
                            }
                            foreach ($commandesParTable as $commande) {
                                $contenues = contenueCommandeDAO::getAllcontenues();
                                $contenuesParCommande = array_filter($contenues, function ($contenu) use ($commande) {
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
                                        echo "<form action='index.php?page=update_commande.php' method='post'>";
                                        echo "<input type='hidden' name='idCommande' value='".$commande->getIdCommande()."'>";
                                        echo "<input type='hidden' name='tableId' value='".$commande->getTableId()."'>";
                                        echo "<input type='hidden' name='effectue' value='0'>";  // Pour marquer comme non effectuée
                                        echo "<button type='submit' class='btn btn-success change-effectue'>Commande effectuée</button>";
                                        echo "</form>";
                                    } else {
                                        // Si la commande n'est pas encore effectuée
                                        echo "<form action='index.php?page=update_commande.php' method='post'>";
                                        echo "<input type='hidden' name='idCommande' value='".$commande->getIdCommande()."'>";
                                        echo "<input type='hidden' name='tableId' value='".$commande->getTableId()."'>";
                                        echo "<input type='hidden' name='effectue' value='1'>";  // Pour marquer comme effectuée
                                        echo "<button type='submit' class='btn btn-primary change-effectue'>Marquer comme effectuée</button>";
                                        echo "</form>";
                                    }
                                    
                                    
                                    echo "</ul>";
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            <?php

            }
            ?>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ajouter une table </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">numéro de la nouvelle table</label>
                            <input type="text" class="form-control" id="numnouvtable">

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Anuller</button>
                    <button type="submit" id="submit" class="btn btn-primary">Valider</button>
                </div>
            </div>
        </div>
    </div>
    <script src="pages/tables/table.js"></script>
</body>

</html>