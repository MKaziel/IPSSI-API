<?php

use App\Controller\DefaultController;
use Firebase\JWT\JWT;

require "vendor/autoload.php";

if (strpos($_SERVER["REQUEST_URI"],"infoSwagger")) {
    $cont = new DefaultController;
    $cont->infoSwagger(__DIR__,["vendor","Swagger-API","Core","index.php"]);
}
else if (isset($_GET["access"]) && $_GET["access"] === "845c4f3dd5ec02c3ff0caf3a1a255f9b") {
    $role = array("ROLE_USER");
    if (isset($_COOKIE["jwToken"])) {
        $jwt = $_COOKIE["jwToken"];
        $decoded = JWT::decode($jwt, "toto", array('HS256'));
        $role = array_merge($role, json_decode($decoded->roles));
    }
    require "Core/Router/Router.php";
} 
else {
    $controller = new DefaultController;
    $controller->UnauthorizedJsonResponse("Access key manquante");
}