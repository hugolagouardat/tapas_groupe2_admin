<?php

class categorieController {

    private $requestMethod;
    private $idCategorie = null;

    public function __construct($requestMethod, $id) {
        $this->requestMethod = $requestMethod;
		$this->idCategorie = $id;
    }

    public function processRequest() {
		
		$response = $this->notFoundResponse();
		
        switch ($this->requestMethod) {
            case 'GET':
                if ($this->idCategorie) {
                    $response = $this->getCategorie($this->idCategorie);
                } else {
                    $response = $this->getAllCategories();
                };
                break;
            default:
                $response = $this->notFoundResponse();
                break;
        }

        header($response['status_code_header']);
		echo $response['body'];
    }

    public function getAllCategories() {		
        $result = categorieDAO::getAllcategories();
        $response['status_code_header'] = $_SERVER['SERVER_PROTOCOL'] . ' 200 OK';
        $response['body'] = json_encode($result, JSON_UNESCAPED_UNICODE);

        return $response;
    }
    private function getCategorie($id) {	
		$result = categorieDAO::get($id);
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