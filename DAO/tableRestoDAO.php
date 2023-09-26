<?php

	class tableRestoDAO {
		public static function getAlltable()
		{
			$tables = array();
			$connex = DatabaseLinker::getConnexion();
	
			$state = $connex->prepare('SELECT * FROM tableresto');
			$state->execute();
			$resultats = $state->fetchAll();
	
			foreach ($resultats	as $result) {
				$table = new tableRestoDTO($result["idTable"], $result["etat"]);
				$table->setIdTable($result["idTable"]);
				$tables[] = $table;
			}
	
			return $tables;
		}
		public static function get($id)
		{
			$table = null;
	
			$connex = DatabaseLinker::getConnexion();
	
			$state = $connex->prepare('SELECT * FROM tableresto WHERE idTable = :id');
			$state->bindValue(":id", $id);
			$state->execute();
			$resultats = $state->fetchAll();
	
			if (sizeof($resultats) > 0) {
				$result = $resultats[0];
				$table = new tableRestoDTO($result["idTable"], $result["etat"]);
				$table->setIdTable($result["idTable"]);
			}
	
			return $table;
		}

	}