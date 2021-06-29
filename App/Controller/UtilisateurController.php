<?php
namespace App\Controller;

use App\Controller\DefaultController;
use App\Model\UtilisateurModel;

class UtilisateurController extends DefaultController
{
    public function __construct()
    {
        $this->model = new UtilisateurModel;
    }

    public function list ()
    {
        $this->jsonResponse($this->model->findAll());
    }

    public function info($id)
    {
        $this->jsonResponse($this->model->find($id));
    }

    public function create ($data) 
    {
        
        //$this->jsonResponse($this->model->create($data));
        $save = $this->model->create($data);
        if ($save === true){
            $this->saveJsonResponse("Utilisateur bien enregistré");
        } else {
            $this->BadRequestJsonResponse($save);
        }

    }

    public function update ($data) 
    {
        if($this->model->find($data['id'])){
             $save=$this->model->update($data);
      
            if ($save === true) {
            $this->saveJsonResponse("L'utilisateur a été modifié ");
             } else {
            $this->BadRequestJsonResponse($save);
        }
    }
        else{
             $this->jsonResponse(array(
                    "message" => "Utilistateur non trouvé",
                    "connecter" => false
                ));
            

        }

    }

    public function delete (string $id)
    {
        $save =$this->model->delete($id);
        if ($save === true) {
            $this->saveJsonResponse("L'utilisateur a été supprimé ");
        } else {
            $this->BadRequestJsonResponse($save);
        }

    }

    public function model(){
        $this->jsonResponse($this->model->model());
    }

    public function connexion(array $data) {
        $allUtilisateur = $this->model->findAll();
        $bool = false;

        while(next($allUtilisateur) && !$bool){
            $current = current($allUtilisateur);
            if($current['identifiant'] == $data['identifiant'] && $current['motdepasse'] == $data['motdepasse']){
                $bool = true;
            }
        }

        if($bool){
            $this->jsonResponse(array(
                "message" => "Utilistateur trouvé",
                "connecter" => true
            ));
        } else {
            $this->jsonResponse(array(
                "message" => "Utilistateur non trouvé",
                "connecter" => false
            ));
        }
    }
}