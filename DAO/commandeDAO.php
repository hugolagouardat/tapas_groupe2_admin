<?php

include_once("tools/RequestSender.php");
include_once("DTO/commandeDTO.php");

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
		$resultats = RequestSender::sendGetRequest("commandes/" . $id);
		$resultats = json_decode($resultats, true);
		return $resultats;
	}
    public static function update($param){


    }

    public static function delete($param){


    }
    public static function insert($param){


    }
}
