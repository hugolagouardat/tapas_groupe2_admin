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
 
//echo("gettapas<br>");

//echo("<br>getAlltapas<br>");
//var_dump(tapasDAO::getAlltapas());


//echo("<br>getAllTable<br>");
//var_dump(tableRestoDAO::getAlltable());
//echo("<br>getTable<br>");
//var_dump(tableRestoDAO::get(1));

//echo("<br>getAllContenuCommande<br>");
//var_dump(contenueCommandeDAO::getAllcontenues());
//echo("<br>getContenuCommande<br>");
//var_dump(contenueCommandeDAO::get(1));

//echo("<br>getCommande<br>");
//var_dump(commandeDAO::get(1));
//echo("<br>getALLCommande<br>");
//var_dump(commandeDAO::getAllcommandes());

//echo("<br>getcategorie<br>");
//var_dump(categorieDAO::get(1));
//echo("<br>getAllCategorie<br>");
//var_dump(categorieDAO::getAllcategories());

//var_dump(contenueCommandeDAO::get(1));
//var_dump(CategorieDAO::getAllcategories());

var_dump(tapasDAO::delete(1));
var_dump(tapasDAO::get(1));
?>
	
</body>

</html>