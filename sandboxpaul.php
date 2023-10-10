<?php
include_once("tools/Autoloader.php");
spl_autoload_register('includeFileWithClassName');
$id = 4;
$libelle = "casher";
$result = categorieDAO::insert($id, $libelle);


?>