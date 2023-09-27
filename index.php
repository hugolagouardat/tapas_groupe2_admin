<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8" />
	<title>Client web</title>
	<link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
	<link rel="icon" type="image/png" href="images/favicon.png" />
</head>

<body>
<?php

include_once("tools/Autoloader.php");
spl_autoload_register('includeFileWithClassName');
 
echo("gettapas");
var_dump(tapasDAO::get(1));
echo("getAlltapas");
var_dump(tapasDAO::getAlltapas());


?>
	
</body>

</html>