<?php
namespace App\Controller;

class DefaultController {

    public function jsonResponse ($data)
    {
        header("content-type: Application/json");
        header("cache-control: public, max-age=1000");
        echo json_encode($data);
    }

    public function default() {
        return $this->jsonResponse(array("message"=>"Bienvenue sur l'API de l'animalerie de l'IPSSI"));
    }
}