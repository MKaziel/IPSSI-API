<?php

//Configuration des variables nécessaire au routing de l'application
$path = $_SERVER["REQUEST_URI"];
define("SERVER", $_SERVER["HTTP_HOST"]."/");
$uri = explode("/", $path);
$entity = ucfirst($uri[1]) ? ucfirst($uri[1]) : "default";
$controller = "App\Controller\\" . $entity . "Controller";
$cont = new $controller();
$htmlVerb = $_SERVER['REQUEST_METHOD'];

//Détection du verbe et application de la route en conséquence
if ($path === "/") {
    $cont->default();
}
else {
    if(isset($uri[2])) {
        if (method_exists($cont, $uri[2])) {
            switch ($htmlVerb) {
                case 'GET':
                    if(isset($uri[3]) && preg_match("[\d]", $uri[3])) {
                        $cont->$uri[2]($uri[3]);
                    }
                    else {
                        $cont->BadRequestJsonResponse("No data provided in the request");
                    }
                    break;

                case 'POST':
                    if(isset($uri[3])){
                        if(isset($_POST) && !empty($_POST)) {
                            $cont->$uri[2]($uri[3], $_POST);
                        }
                        else {
                            $cont->BadRequestJsonResponse("No data provided in the request");
                        }
                    } 
                    else {
                        if(isset($_POST) && !empty($_POST)) {
                            $cont->$uri[2]($_POST);
                        }
                        else {
                            $cont->BadRequestJsonResponse("No data provided in the request");
                        }
                    }
                    break;

                case 'PATCH':
                case 'PUT':
                    if(isset($uri[3]) && preg_match("[\d]", $uri[3])){
                        $_PUT = array();
                        parse_str(file_get_contents("php://input"), $_PUT);
                        if(isset($_PUT) && !empty($_PUT)) {

                            $cont->$uri[2]($uri[3], $_PUT);
                        }
                        else {
                            $cont->BadRequestJsonResponse("No data provided in the request");
                        }
                    } else {
                        $cont->BadRequestJsonResponse("No {id} found in the url's request");
                    }
                    break;

                case 'DELETE':
                    if(isset($uri[3]) && preg_match("[\d]", $uri[3])) {
                        $cont->$uri[2]($uri[3]);
                    }
                    else {
                        $cont->BadRequestJsonResponse("No data provided in the request");
                    }
                    break;
                
                default:
                    $cont->BadRequestJsonResponse();
                    break;
            }
        } else {
            $cont->BadRequestJsonResponse();
        }
    } 
    else if (!isset($uri[2])) {
        $cont->list();
    } 
    else {
        $cont->BadRequestJsonResponse();
    }
}
