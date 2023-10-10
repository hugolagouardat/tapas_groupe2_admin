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
            $commandee = new CommandeDTO($result["idCommande"], $result["tableId"], $result["effectue"]);
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
    public static function update($id){


    }

    public static function delete($id){
        $delete = RequestSender::sendDeleteRequest("commandes/".$id);
		return $delete; 


    }
    public static function insert($id){


    }
}
