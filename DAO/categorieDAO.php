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

    public static function update(){



    }
    public static function delete($id){
        $delete = RequestSender::sendDeleteRequest("categories/".$id);
		return $delete; 

    }
   /* public static function insert($newcategorie_id,$newcategorie_libelle){
        $data = array(
            "newcategorie_id" => $newcategorie_id,
            "newcategorie_libelle" => $newcategorie_libelle
        );
        
        $json_data = json_encode($data);
        var_dump($json_data);
        $inserted = RequestSender::sendPostRequest("categories/",$json_data);
        return $inserted;
    }*/

    }