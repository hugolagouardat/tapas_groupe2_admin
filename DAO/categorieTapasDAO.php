<?php
include_once("tools/RequestSender.php");
include_once("DTO/CategorieTapasDTO.php");

class CategorieTapasDAO
{

    public static function getAllCategorieTapas()
    {
        $categorie = array();
        $resultats = RequestSender::sendGetRequest("categoriesTapas");
        $resultats = json_decode($resultats, true);
        if (is_array($resultats)) {
            foreach ($resultats as $result) {
                $categoriee = new CategorieTapasDTO($result["CategorieId"], $result["tapasId"]);
                $categorie[] = $categoriee;
            }
        }
        return $categorie;

    }
    // fonctionne pas //
    public static function get($id)
    {
        $resultats = RequestSender::sendGetRequest("categoriesTapas/" . $id);
        $resultats = json_decode($resultats, true);
        return $resultats;
    }

    public static function update($tapasId, $categorieId)
    {
        $data = array(
            "tapasId" => $tapasId,
            "categorieId" => $categorieId
        );

        var_dump($data);
        $inserted = RequestSender::sendPutRequest("categories", $data);
        return $inserted;
    }

    public static function delete($id)
    {
        $delete = RequestSender::sendDeleteRequest("categoriesTapas/" . $id);
        return $delete;
    }
    public static function insert($tapasId, $categorieId)
    {
        $data = array(
            "tapasId" => $tapasId,
            "categorieId" => $categorieId
        );

        var_dump($data);
        $inserted = RequestSender::sendPostRequest("categories", $data);
        return $inserted;
    }
}
