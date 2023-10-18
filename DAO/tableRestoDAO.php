<?php

include_once("tools/RequestSender.php");
include_once("DTO/tableRestoDTO.php");

class tableRestoDAO
{

    public static function getAlltable()
    {
        $tables = array();
        $resultats = RequestSender::sendGetRequest("table");
        $resultats = json_decode($resultats, true);
        if (is_array($resultats)) {
            foreach ($resultats as $result) {
                $table = new tableRestoDTO($result["idTable"],$result["numeroTable"], $result["etat"]);
                $tables[] = $table;
            }
        }
        return $tables;
    }

	public static function get($id)
	{
		$resultats = RequestSender::sendGetRequest("table/" . $id);
		$resultats = json_decode($resultats, true);
		return $resultats;
	}
    public static function update($idTable,$numeroTable,$etat){
        $data = array(
            "idTable" => $idTable,
            "numeroTable"=> $numeroTable,
            "etat" => $etat,
        );
        
        var_dump($data);
        $inserted = RequestSender::sendPutRequest("categories",$data);
        return $inserted;


    }

    public static function delete($id){
        $delete = RequestSender::sendDeleteRequest("table/".$id);
		return $delete; 


    }
    public static function insert($idTable,$numeroTable,$etat){
        $data = array(
            "idTable" => $idTable,
            "numeroTable"=> $numeroTable,
            "etat" => $etat,
        );
        
        var_dump($data);
        $inserted = RequestSender::sendPostRequest("categories",$data);
        return $inserted;


    }
}
