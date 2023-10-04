<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tables et Commandes</title>
    <!-- Lien pour inclure le CSS de Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <?php
    // Par exemple : getAlltable()
    $tables = tableRestoDAO::getAlltable();

    foreach ($tables as $table) {
        // Par exemple : getCommandes()
        $commandes = commandeDAO::get($table->getIdTable());
        ?>

        <div class="card mb-4">
            <div class="card-header">
                Table n°<?= $table->getIdTable() ?>
                <button class="btn btn-primary float-right">Clean</button>
            </div>
            <ul class="list-group list-group-flush">
                <?php
                $plats = [];
                foreach ($commandes as $commande) {
                    if (!isset($plats[$commande["plat"]])) {
                        $plats[$commande["plat"]] = 1;
                    } else {
                        $plats[$commande["plat"]]++;
                    }
                }

                foreach ($plats as $plat => $nombre) {
                    ?>
                    <li class="list-group-item d-flex justify-content-between">
                        <span><?= $plat ?> x<?= $nombre ?></span>
                        <button class="btn btn-success">✓</button>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>

        <?php
    }
    ?>

</div>

<!-- Scripts de Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
