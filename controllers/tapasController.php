<?php

class tapasController {

    private $requestMethod;
    private $idTapas = null;

    public function __construct($requestMethod, $id) {
        $this->requestMethod = $requestMethod;
		$this->idTapas = $id;
    }

    public function processRequest() {
		
		$response = $this->notFoundResponse();
		
        switch ($this->requestMethod) {
            case 'GET':
                if ($this->idTapas) {
                    $response = $this->getTapas($this->idTapas);
                } else {
                    $response = $this->getAlltapas();
                };
                break;
            default:
                $response = $this->notFoundResponse();
                break;
        }

        header($response['status_code_header']);
		echo $response['body'];
    }

    public function getAllTapas() {		
        $result = tapasDAO::getAlltapas();
        $response['status_code_header'] = $_SERVER['SERVER_PROTOCOL'] . ' 200 OK';
        $response['body'] = json_encode($result, JSON_UNESCAPED_UNICODE);
        
        return $response;
    }   
    private function getTapas($id) {	
		$result = tapasDAO::get($id);
        if ($result == null) {
            return $this->notFoundResponse();
        }

        $response['status_code_header'] = $_SERVER['SERVER_PROTOCOL'] . ' 200 OK';
        $response['body'] = json_encode($result, JSON_UNESCAPED_UNICODE);
        return $response;
    }

    private function unprocessableEntityResponse() {
        $response['status_code_header'] = $_SERVER['SERVER_PROTOCOL'] . ' 422 Unprocessable Entity';
        $response['body'] = json_encode([
            'error' => 'Invalid input'
        ]);
        return $response;
    }

    private function notFoundResponse() {
        $response['status_code_header'] = $_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found';
        $response['body'] = null;
        return $response;
    }
}