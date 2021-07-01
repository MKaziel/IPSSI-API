<?php

//Configuration des variables nécessaire au routing de l'application
$path = $_SERVER["REQUEST_URI"];
$pos=1;

$uri = explode("/", explode("?",$path)[0]);
if($uri[1] === "Ipssi-Api"){
    $pos = 2;
}
define("SERVER", $_SERVER["HTTP_HOST"]."/");
$entity = (ucfirst($uri[$pos]) and substr($uri[$pos],0,1)!=="?")  ? ucfirst($uri[$pos]) : "Default";
$controller = $entity==="Ipssi-Api"? "App\Controller\\DefaultController" :"App\Controller\\" . $entity . "Controller";
$cont = new $controller();
$htmlVerb = $_SERVER['REQUEST_METHOD'];

//Détection du verbe et application de la route en conséquence
// if($rMethod === "OPTIONS") {
//     $cont->optionResponse("ok");
// }

if ($path === "/" or substr($path,0,2)==="/?" or $htmlVerb === 'OPTIONS') {
    $cont->default();
}
else {
    if(isset($uri[$pos+1])) {
        echo($uri[$pos+1]);
        if (method_exists($cont, $uri[$pos+1])) {
            switch ($htmlVerb) {
                case 'GET':
                    if (in_array("admin", $role) or in_array("user", $role)) {
                        # code...
                        if(isset($uri[$pos+2]) && preg_match("[\d]", $uri[$pos+2])) {
                            $method = $uri[$pos+1];
                            $cont->$method($uri[$pos+2]);
                        }
                        else {
                            $method = $uri[$pos+1];
                            $cont->$method();
                        }
                    }
                    else {
                        $cont->unauthorizedResponse("Authorisation manquante");
                    }
                    break;

                case 'POST':
                    if (in_array("admin", $role)) {
                        if(isset($uri[$pos+2])){
                            if(isset($_POST) && !empty($_POST)) {
                                $method = $uri[$pos+1];
                                $cont->$method($uri[$pos+2], $_POST);
                            }
                            else {
                                $cont->BadRequestJsonResponse("No data provided in the request");
                            }
                        } 
                        else {
                            if(isset($_POST) && !empty($_POST)) {
                                $method = $uri[$pos+1];
                                $cont->$method($_POST);
                            }
                            else {
                                $cont->BadRequestJsonResponse("No data provided in the request");
                            }
                        }
                    }
                    else {
                        $cont->unauthorizedResponse("Authorisation manquante");
                    }
                    break;

                case 'PATCH':
                case 'PUT':
                    if (in_array("admin", $role)) {
                        if(isset($uri[$pos+2]) && preg_match("[\d]", $uri[$pos+2])){
                            $_PUT = array();
                            parse_str(file_get_contents("php://input"), $_PUT);
                            if(isset($_PUT) && !empty($_PUT)) {
                                $method = $uri[$pos+1];
                                $cont->$method($uri[$pos+2], $_PUT);
                            }
                            else {
                                $cont->BadRequestJsonResponse("No data provided in the request");
                            }
                        } else {
                            $cont->BadRequestJsonResponse("No {id} found in the url's request");
                        }
                    }
                    else {
                        $cont->unauthorizedResponse("Authorisation manquante");
                    }
                    break;

                case 'DELETE':
                    if (in_array("admin", $role)) {
                        if(isset($uri[$pos+2]) && preg_match("[\d]", $uri[$pos+2])) {
                            $method = $uri[$pos+1];
                            $cont->$method($uri[$pos+2]);
                        }
                        else {
                            $cont->BadRequestJsonResponse("No data provided in the request");
                        }
                    }
                    else {
                        $cont->unauthorizedResponse("Authorisation manquante");
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
    else if (!isset($uri[$pos+1])) {
        $cont->list();
    } 
    else {
        $cont->BadRequestJsonResponse();
    }
}
