<?php

include_once("tools/RequestSender.php");
include_once("DTO/contenueCommandeDTO.php");


class contenueCommandeDAO {

    public static function getAllcontenues() {
        $contenues = array();
        $resultats = RequestSender::sendGetRequest("commandes");
        $resultats = json_decode($resultats, true);
        foreach ($resultats as $result) {
            $contenu = new contenueCommandeDTO($result["idCommande"], $result["tableId"], $result["effectue"]);
            $contenues[] = $contenu;
        }

        return $contenues;
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
