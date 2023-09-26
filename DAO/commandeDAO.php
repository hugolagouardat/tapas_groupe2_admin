<?php

class commandeDAO
{

	public static function getAllcommandes()
	{
		$commandes = array();
		$connex = DatabaseLinker::getConnexion();

		$state = $connex->prepare('SELECT * FROM commande');
		$state->execute();
		$resultats = $state->fetchAll();

		foreach ($resultats	as $result) {
			$commande = new commandeDTO($result["idCommande"], $result["tableId"], $result["effectue"]);
			$commande->setIdCommande($result["idCommande"]);
			$commandes[] = $commande;
		}

		return $commandes;
	}
	public static function get($id)
    {
        $commande = null;

        $connex = DatabaseLinker::getConnexion();

        $state = $connex->prepare('SELECT * FROM commande WHERE idCommande = :id');
        $state->bindValue(":id", $id);
        $state->execute();
        $resultats = $state->fetchAll();

        if (sizeof($resultats) > 0) {
            $result = $resultats[0];
			$commande = new commandeDTO($result["idCommande"], $result["tableId"], $result["effectue"]);
			$commande->setIdCommande($result["idCommande"]);
        }

        return $commande;
    }
}
