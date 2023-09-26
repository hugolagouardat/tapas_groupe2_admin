<?php
//$connex = DatabaseLinker::getConnexion();
class categorieDAO
{
    public static function getAllcategories()
    {
        $categories = array();
        $connex = DatabaseLinker::getConnexion();

        $state = $connex->prepare('SELECT * FROM categorie');
        $state->execute();
        $resultats = $state->fetchAll();

        foreach ($resultats    as $result) {
            $categorie = new categorieDTO($result["idCategorie"], $result["libelle"]);
            $categorie->setIdCategorie($result["idCategorie"]);
            $categories[] = $categorie;
        }

        return $categories;
    }
    public static function get($id)
    {
        $categorie = null;

        $connex = DatabaseLinker::getConnexion();

        $state = $connex->prepare('SELECT * FROM categorie WHERE idCategorie = :id');
        $state->bindValue(":id", $id);
        $state->execute();
        $resultats = $state->fetchAll();

        if (sizeof($resultats) > 0) {
            $result = $resultats[0];
            $categorie = new categorieDTO($result["idCategorie"], $result["libelle"]);
            $categorie->setIdCategorie($result["idCategorie"]);
        }

        return $categorie;
    }
}
