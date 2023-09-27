<?php

include_once("tools/RequestSender.php");

class tableRestoDAO {

    public static function getAlltable() {
        $tables = array();
        $resultats = RequestSender::sendGetRequest("table");
        $resultats = json_decode($resultats);
        foreach ($resultats as $result) {
            $table = new tableRestoDTO($result->idTable, $result->etat);
            $table->setIdTable($result->idTable);
            $tables[] = $table;
        }

        return $tables;
    }

    public static function get($id) {
        $table = null;
        $resultats = RequestSender::sendGetRequest("table");
        $resultats = json_decode($resultats);
        if (sizeof($resultats) > 0) {
            $result = $resultats[0];
            $table = new tableRestoDTO($result->idTable, $result->etat);
            $table->setIdTable($result->idTable);
        }

        return $table;
    }

}
