<?php

class contenueCommandeDAO
{

	public static function getAllcontenues()
	{
		$contenues = array();
		$connex = DatabaseLinker::getConnexion();

		$state = $connex->prepare('SELECT * FROM contenuecommande');
		$state->execute();
		$resultats = $state->fetchAll();

		foreach ($resultats	as $result) {
			$contenue = new contenueCommandeDTO($result["commandeId"], $result["tableId"], $result["nombre"]);
			$contenue->setCommandeId($result["commandeId"]);
			$contenues[] = $contenue;
		}

		return $contenues;
	}
	public static function get($id)
    {
        $contenue = null;

        $connex = DatabaseLinker::getConnexion();

        $state = $connex->prepare('SELECT * FROM contenuecommande WHERE commandeId = :id');
        $state->bindValue(":id", $id);
        $state->execute();
        $resultats = $state->fetchAll();

        if (sizeof($resultats) > 0) {
            $result = $resultats[0];
			$contenue = new contenueCommandeDTO($result["commandeId"], $result["tableId"], $result["nombre"]);
			$contenue->setCommandeId($result["commandeId"]);
        }

        return $contenue;
    }
}
