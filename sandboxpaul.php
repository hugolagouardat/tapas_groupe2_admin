<?php
include_once("tools/Autoloader.php");
spl_autoload_register('includeFileWithClassName');
$id = 4;
$libelle = "casher";
//var_dump(categorieDAO::insert($id,$libelle));
var_dump(categorieDAO::getAllcategories());
?>
