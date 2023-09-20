<?php
// client.php

$api_url = "http://localhost:8888/webservice/server/"; // Replace YOUR_SERVER_URL with the appropriate URL.

$response = file_get_contents($api_url);

if ($response === FALSE) {
    die('Error occurred while fetching data.');
}

$cartes = json_decode($response, true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Graphics Cards List</title>
</head>
<body>

<h1>List of Graphics Cards</h1>

<?php if (empty($cartes)): ?>
    <p>No cards found.</p>
<?php else: ?>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Brand ID</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cartes as $carte): ?>
                <tr>
                    <td><?php echo $carte['id']; ?></td>
                    <td><?php echo $carte['nom']; ?></td>
                    <td><?php echo $carte['prix']; ?></td>
                    <td><?php echo $carte['marque_id']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

</body>
</html>
