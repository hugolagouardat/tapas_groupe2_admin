<?php
include_once("tools/RequestSender.php");
include_once("tools/CategorieTapasDTO.php");

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
        $CategorieTapas = null;
        $resultat = RequestSender::sendGetRequest("categoriesTapas");
        $resultats = json_decode($resultat);
        if ($resultats != null && sizeof($resultats) > 0) {
            $result = $resultats[0];
            $CategorieTapas = new categorieTapasDTO($result->CategorieId, $result->tapasId);
            $CategorieTapas->setCategorieId($result->CategorieId);
            $CategorieTapas->setTapasId($result->tapasId);
            
        }
        return $CategorieTapas;
    }
}
?>