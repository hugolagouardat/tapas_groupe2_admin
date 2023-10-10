<?php
include_once("tools/RequestSender.php");
include_once("DTO/tapasDTO.php");
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
				$tapase->setImage($result['image']);
				$tapase->setPrix($result['prix']);
				$tapase->setDescription($result['description']);
				$tapase->setNom($result['nom']);
				$tapas[] = $tapase;
			}
		}


		return $tapas;
	}


	public static function get($id)
	{
		$resultats = RequestSender::sendGetRequest("tapas/" . $id);
		$resultats = json_decode($resultats, true);
		
		return $resultats;
	}

	public static function update($id)
	{
		
	}

	public static function insert($id)
	{
	}
	public static function delete($id)
	{
		$delete = RequestSender::sendDeleteRequest("tapas/".$id);
		return $delete; 
	}
}
