<?php
include_once("tools/RequestSender.php");
class tapasDAO
{

	public static function getAlltapas()
	{
		$tapas = array();
		$resultats = RequestSender::sendGetRequest("tapas");
		$resultats = json_decode($resultats);
		foreach ($resultats	as $result) {
			$tapase = new tapasDTO($result->idTapas, $result->image, $result->prix, $result->description, $result->nom);
			$tapase->setIdTapas($result->idTapas);
			$tapas[] = $tapase;
		}

		return $tapas;
	}
	public static function get($id)
    {
        $tapas = null;
		$resultats = RequestSender::sendGetRequest("tapas");
		$resultats = json_decode($resultats);
        if (sizeof($resultats) > 0) {
            $result = $resultats[0];
			$tapas= new tapasDTO($result->idTapas, $result->image, $result->prix, $result->description, $result->nom);
			$tapas->setIdTapas($result->idTapas);
        }

        return $tapas;
    }
}
