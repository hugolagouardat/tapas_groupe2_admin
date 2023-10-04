<?php
include_once("tools/RequestSender.php");
class tapasDAO
{

	public static function getAlltapas()
	{
		$tapas = array();
		$resultats = RequestSender::sendGetRequest("tapas");
		$resultats = json_decode($resultats, true); // Decoding as an associative array

		if (is_array($resultats)) {
			foreach ($resultats as $result) {
				// Notice the change from object syntax to array syntax
				$tapase = new tapasDTO($result['idTapas'], $result['image'], $result['prix'], $result['description'], $result['nom']);
				$tapase->setIdTapas($result['idTapas']);
				$tapas[] = $tapase;
			}
		}

		return $tapas;
	}

	public static function get($id)
	{
		$tapas = null;
		$resultats = RequestSender::sendGetRequest("tapas");
		$resultats = json_decode($resultats, true);

		if (is_array($resultats) && count($resultats) > 0) {
			$result = $resultats[0];
			$tapas = new tapasDTO($result['idTapas'], $result['image'], $result['prix'], $result['description'], $result['nom']);
			$tapas->setIdTapas($result['idTapas']);
		}

		return $tapas;
	}
	public static function delete($id)
	{
		$resultat = RequestSender::sendDeleteRequest("tapas");
		$resultats = tapasDAO::get($id);
		$resultats = json_encode($resultats, true);

		return $resultat;
	}
}