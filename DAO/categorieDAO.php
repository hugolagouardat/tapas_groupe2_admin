<?php
//$connex = DatabaseLinker::getConnexion();
class categorieDAO
{
    public static function getAllcategories()
    {
        $categorie = array();
        $resultats = RequestSender::sendGetRequest("categories");
        $resultats = json_decode($resultats, true);
        foreach ($resultats as $result) {
            $categoriee = new categorieDTO($result->idCategorie, $result->libelle);
            $categoriee->setIdcategorie($result->idCategorie);
            $categorie[] = $categoriee;
        }

        return $categorie;
        
    }
    public static function get($id)
    {
        $categoriee = null;
        $resultats = RequestSender::sendGetRequest("categories");
        $resultats = json_decode($resultats);
        if ($resultats != null && sizeof($resultats) > 0) {
            $result = $resultats[0];
            $categoriee = new categorieDTO($result->idCategorie, $result->libelle);
            $categoriee->setIdcategorie($result->idCategorie);
        }

        return $categoriee;
    }
}
