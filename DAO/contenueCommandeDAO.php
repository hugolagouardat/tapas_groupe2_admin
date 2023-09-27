<?php

include_once("tools/RequestSender.php");

class contenueCommandeDAO {

    public static function getAllcontenues() {
        $contenues = array();
        $resultats = RequestSender::sendGetRequest("commandes");
        $resultats = json_decode($resultats);
        foreach ($resultats as $result) {
            $contenu = new contenueCommandeDTO($result->commandeId, $result->tapasId, $result->nombre);
            $contenues[] = $contenu;
        }

        return $contenues;
    }

    public static function get($id) {
        $contenu = null;
        $resultats = RequestSender::sendGetRequest("commandes");
        $resultats = json_decode($resultats);
        if (sizeof($resultats) > 0) {
            $result = $resultats[0];
            $contenu = new contenueCommandeDTO($result->commandeId, $result->tapasId, $result->nombre);
        }

        return $contenu;
    }

}
