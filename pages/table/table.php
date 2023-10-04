<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <title>Tables</title>
</head>
<body>
<?php
// Exemple de données (normalement, ceci proviendrait de votre base de données)
$tables = [
    [
        'id' => 1,
        'commandes' => [
            ['plat' => 'Paella', 'effectue' => false, 'quantite' => 2],
            ['plat' => 'Tacos', 'effectue' => true, 'quantite' => 1],
        ]
    ],
    // ... D'autres tables ici ...
];

?>

<div class="container">
    <div class="row">
        <?php foreach ($tables as $table): ?>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Table <?= $table['id'] ?>
                        <button class="btn btn-primary float-right">Clean</button>
                    </div>
                    <ul class="list-group list-group-flush">
                        <?php foreach ($table['commandes'] as $commande): ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <?= $commande['plat'] ?> 
                                <span class="badge badge-primary badge-pill"><?= $commande['quantite'] ?></span>
                                <button class="btn btn-success">
                                    <?= $commande['effectue'] ? '✔️' : '' ?> Effectuer
                                </button>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
