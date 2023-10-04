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

    /*public static function update($id){
        $data = null;
        if ($id != null) {
            $data = $id;
        }
        RequestSender::sendPutRequest($data);


    }*/

    public static function delete($id){
        $delete = RequestSender::sendDeleteRequest("categories/".$id);
		return $delete; 

    }
    public static function insert($id){


    }
}