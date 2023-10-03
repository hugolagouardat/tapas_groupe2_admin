<?php

class commandeDAO
{

	public static function getAllcommandes()
	{
		$commande = array();
        $resultats = RequestSender::sendGetRequest("commandes");
        $resultats = json_decode($resultats, true);
        if (is_array($resultats)) {
        foreach ($resultats as $result) {
            $commandee = new CommandeDTO($result->commandeId, $result->tableId, $result->effectue);
            $commande[] = $commandee;
        }
    }

        return $commande;		
	}
	public static function get($id)
    {
		$commande = null;
		$resultats = RequestSender::sendGetRequest("commandes");
		$resultats = json_decode($resultats);
        if ($resultats != null && sizeof($resultats) > 0) {
            $result = $resultats[0];
			$commande= new CommandeDTO($result->idCommande, $result->tableId,$result->effectue);
			$commande->setIdCommande($result->idCommande);
        }

        return $commande;
    }
}
