<?php

include_once("tools/RequestSender.php");
include_once("DTO/contenueCommandeDTO.php");


class contenueCommandeDAO {

    public static function getAllcontenues() {
        $contenues = array();
        $resultats = RequestSender::sendGetRequest("contenu");
        $resultats = json_decode($resultats, true);
        foreach ($resultats as $result) {
            $contenu = new contenueCommandeDTO($result["commandeId"], $result["tapasId"], $result["nombre"]);
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
    public static function update($commandeId,$tapasId,$nombre){
        $data = array(
            "commandeId" => $commandeId,
            "tapasId" => $tapasId,
            "nombre"=>$nombre
        );
        
        var_dump($data);
        $inserted = RequestSender::sendPutRequest("categories",$data);
        return $inserted;


    }
    public static function delete($commandeid){
        $delete = RequestSender::sendDeleteRequest("contenu/".$commandeid);
        
		return $delete; 


    }
    public static function insert($commandeId,$tapasId,$nombre){
        $data = array(
            "commandeId" => $commandeId,
            "tapasId" => $tapasId,
            "nombre"=>$nombre
        );
        
        var_dump($data);
        $inserted = RequestSender::sendPostRequest("categories",$data);
        return $inserted;


    }

}
