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
    if (isset($_COOKIE["connexionToken"])) {
        $jwt = $_COOKIE["connexionToken"];
        $decoded = JWT::decode($jwt, "mk", array('HS256'));
        $role = array_merge($role, array($decoded->roles));
    }
    require "Core/Router/Router.php";
} 
else {
    $controller = new DefaultController;
    $controller->UnauthorizedJsonResponse("Access key manquante");
}