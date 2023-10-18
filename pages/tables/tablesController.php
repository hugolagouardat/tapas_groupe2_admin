<?php

include_once("DAO/categorieDAO.php");
include_once("DAO/categorieTapasDAO.php");
include_once("DAO/commandeDAO.php");
include_once("DAO/contenueCommandeDAO.php");
include_once("DAO/tableRestoDAO.php");
include_once("DAO/tapasDAO.php");


class tablesController {
	public function __construct() {
		$this->includeView();
	}

	public function includeView() {
		//include_once('tables.php');
		include_once('tables copy.php');
	}
}
