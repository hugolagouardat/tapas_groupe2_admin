<?php
include_once("tools/Autoloader.php");
spl_autoload_register('includeFileWithClassName');
tapasDAO::delete(1);
?>