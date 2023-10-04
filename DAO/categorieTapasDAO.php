<?php
include_once("tools/RequestSender.php");
include_once("DTO/CategorieTapasDTO.php");

class CategorieTapasDAO
{
    public static function getAllCategorieTapas()
    {
        $CategoriesTapas = array();
        $resultat = RequestSender::sendGetRequest("categoriesTapas");
        $resultats = json_decode($resultat);
        foreach ($resultats as $result) {
            $CategorieTapas = new categorieTapasDTO($result->CategorieId, $result->tapasId);
            $CategorieTapas->setCategorieId($result->CategorieId);
            $CategorieTapas->setTapasId($result->tapasId);
            $CategoriesTapas = $CategorieTapas;
        }
        return $CategoriesTapas;
    }
    // fonctionne pas //
	public static function get($id)
	{
		$resultats = RequestSender::sendGetRequest("categoriesTapas/" . $id);
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
?>