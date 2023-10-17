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

    public static function update($idCategorie,$libelle){
        $data = array(
            "idCategorie" => $idCategorie,
            "libelle" => $libelle
        );
        
        var_dump($data);
        $inserted = RequestSender::sendPutRequest("categories",$data);
        return $inserted;
    }
    public static function delete($id){
        $delete = RequestSender::sendDeleteRequest("categories/".$id);
		return $delete; 

    }
    public static function insert($idCategorie,$libelle){
        $data = array(
            "idCategorie" => $idCategorie,
            "libelle" => $libelle
        );
        
        var_dump($data);
        $inserted = RequestSender::sendPostRequest("categories",$data);
        return $inserted;
    }

    }