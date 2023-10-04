<?php

include_once("tools/RequestSender.php");
include_once("tools/contenueCommandeDTO.php");


class contenueCommandeDAO {

    public static function getAllcontenues() {
        $contenues = array();
        $resultats = RequestSender::sendGetRequest("commandes");
        $resultats = json_decode($resultats, true);
        foreach ($resultats as $result) {
            $contenu = new contenueCommandeDTO($result["idCommande"], $result["tableId"], $result["effectue"]);
            $contenues[] = $contenu;
        }

        return $contenues;
    }

    public static function get($id) {
        $contenu = null;
        $resultats = RequestSender::sendGetRequest("commandes");
        $resultats = json_decode($resultats);

        if ($resultats != null && sizeof($resultats) > 0) {
            $result = $resultats[0];
            $contenu = new contenueCommandeDTO($result->idCommande, $result->tableId, $result->effectue);
            $contenu->setCommandeId($result->idCommande);
        }

        return $contenu;
    }
    public static function update($param){


    }

    public static function delete($param){


    }
    public static function insert($param){


    }

}
