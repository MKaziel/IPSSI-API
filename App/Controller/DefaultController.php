<?php
namespace App\Controller;

class DefaultController {

    public function default() {
        return $this->jsonResponse(array("message"=>"Bienvenue sur l'API de l'animalerie de l'IPSSI"));
    }

    public function jsonResponse ($data, $message = "Récupération ok")
    {
        header("content-type: Application/json");
        header("cache-control: public, max-age=1000");
        header("Access-Control-Allow-Origin: *");
        header('HTTP/1.0 200');
        $response = [
            "statusCode" => 200,
            "message" => $message,
            "data" => $data
        ];
        echo json_encode($response);
    }

    public function saveJsonResponse($message = "Enregistrement ok")
    {
        header("content-type: Application/json");
        header("cache-control: public, max-age=1000");
        header('HTTP/1.0 201');
        $response = [
            "statusCode" => 201,
            "message" => $message
        ];
        echo json_encode($response);
    }

    public function BadRequestJsonResponse($message = "Page not found")
    {
        header("content-type: Application/json");
        header("cache-control: public, max-age=1000");
        header('HTTP/1.0 404');
        $response = [
            "statusCode" => 404,
            "message" => $message
        ];
        echo json_encode($response);
    }
    
    public function UnauthorizedJsonResponse($message = "Problème d'authentification à l'application")
    {
        header("content-type: Application/json");
        header("cache-control: public, max-age=1000");
        header('HTTP/1.0 401');
        $response = [
            "statusCode" => 401,
            "message" => $message
        ];
        echo json_encode($response);
    }
    
    public function ForbiddenJsonResponse($message = "Vous n'avez pas l'authorisation d'accéder à cette page !!")
    {
        header("content-type: Application/json");
        header("cache-control: public, max-age=1000");
        header('HTTP/1.0 403');
        $response = [
            "statusCode" => 403,
            "message" => $message
        ];
        echo json_encode($response);
    }

    public function MethodNotAllowed($message = "Cette méthode de requête n'est pas autorisé !!")
    {
        header("content-type: Application/json");
        header("cache-control: public, max-age=1000");
        header('HTTP/1.0 405');
        $response = [
            "statusCode" => 405,
            "message" => $message
        ];
        echo json_encode($response);
    }

    public function InternalServeurError($message = "Problème Interne du serveur !!!")
    {
        header("content-type: Application/json");
        header("cache-control: public, max-age=1000");
        header("Access-Control-Allow-Origin: *");
        header('HTTP/1.0 500');
        $response = [
            "statusCode" => 500,
            "message" => $message
        ];
        echo json_encode($response);
    }

    public function ServiceUnavailable($message = "Service indisponible !!! ")
    {
        header("content-type: Application/json");
        header("cache-control: public, max-age=1000");
        header('HTTP/1.0 503');
        $response = [
            "statusCode" => 503,
            "message" => $message
        ];
        echo json_encode($response);
    }

    public function optionResponse($message) 
    {
        header("content-type: Application/json");
        header("cache-control: public, max-age=1000");
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: *");
        header("Access-Control-Allow-Headers: *");
        header('HTTP/1.0 200');
        $response = [
            "statusCode" => 200,
            "message" => $message
        ];
        echo json_encode($response);
    }

    public function unauthorizedResponse($message = "Unauthorized")
    {
        header("content-type: Application/json");
        header("cache-control: no-cache");
        header('HTTP/1.0 401');
        $response = [
            "statusCode" => 401,
            "message" => $message
        ];
        echo json_encode($response);
    }

}