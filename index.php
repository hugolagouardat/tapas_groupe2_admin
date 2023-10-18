<?php


date_default_timezone_set('Europe/Paris');

include_once("tools/RequestSender.php");
include_once("tools/Rooter.php");
?>


<!DOCTYPE html>
<html lang="fr">

<head>

	<link rel="stylesheet" type="text/css" href="assets/css/general.css" media="all" />
	<!--<link rel="icon" type="image/png" href="assets/images/images_site/icone.png" />-->

	<meta charset="utf-8" />
	<title>Admin Tappas</title>
</head>

<body>
<?php
	
	if (!empty($_GET['page'])) {
		$page = $_GET['page'];
	} else {
		$page = "tables";
	}

	?>

	<div class="page-container">

		<div class="page-content">
			<?php

			include_once("tools/SuperController.php");

			
			
			SuperController::callPage($page);

			?>
		</div>
	</div>

</body>

</html>