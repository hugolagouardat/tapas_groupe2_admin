<?php
include_once("tools/RequestSender.php");
include_once("DTO/categorieDTO.php");
class categorieDAO
{
    public static function getAllcategories()
    {
        $categorie = array();
        $resultats = RequestSender::sendGetRequest("categories");
        $resultats = json_decode($resultats, true);
        foreach ($resultats as $result) {
            $categoriee = new categorieDTO($result["idCategorie"], $result["libelle"]);
            $categorie[] = $categoriee;
        }

        return $categorie;
        
    }
	public static function get($id)
	{
		$resultats = RequestSender::sendGetRequest("categories/" . $id);
		$resultats = json_decode($resultats, true);
		return $resultats;
	}

    /*public static function update($param){
        $data = null;
        if ($param != null) {
            $data = $param;
        }
        RequestSender::sendPutRequest($data);


    }*/

    public static function delete($param){


    }
    public static function insert($param){


    }
}