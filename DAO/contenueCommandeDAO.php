<?php

include_once("tools/RequestSender.php");
include_once("DTO/contenueCommandeDTO.php");


class contenueCommandeDAO {

    public static function getAllcontenues() {
        $contenues = array();
        $resultats = RequestSender::sendGetRequest("contenu");
        $resultats = json_decode($resultats, true);
        foreach ($resultats as $result) {
            $contenu = new contenueCommandeDTO($result["idCommande"], $result["tableId"], $result["effectue"]);
            $contenues[] = $contenu;
        }

        return $contenues;
    }

	public static function get($id)
	{
		$resultats = RequestSender::sendGetRequest("contenu/" . $id);
		$resultats = json_decode($resultats, true);
		return $resultats;
	}
    public static function update($id){


    }

    public static function delete($commandeid){
        $delete = RequestSender::sendDeleteRequest("contenu/".$commandeid);
        
		return $delete; 


    }
    public static function insert($id){


    }

}
