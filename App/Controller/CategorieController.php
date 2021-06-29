<?php
namespace App\Controller;

use App\Model\CategorieModel;
use App\Controller\DefaultController;

class CategorieController extends DefaultController{
    
    public function __construct()
    {
        $this->model = new CategorieModel;
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
        // $this->jsonResponse($this->model->create($data));
        $save = $this->model->create($data);
        if ($save === true){
            $this->saveJsonResponse("Catégorie bien enregistrée");
        } else {
            $this->BadRequestJsonResponse($save);
        }

    }

    public function update ($data) 
    {
        if($this->model->find($data['id'])){
             $save=$this->model->update($data);
      
            if ($save === true) {
            $this->saveJsonResponse("La catégorie  a été modifiée ");
             } else {
            $this->BadRequestJsonResponse($save);
        }
    }
        else{
             $this->jsonResponse(array(
                    "message" => "Catégorie non trouvée",
                    "connecter" => false
                ));
            

        }

    }

    public function delete (string $id)
    {
        // $this->jsonResponse($this->model->delete($id));
        $save = $this->model->delete($id);
        if ($save === true){
            $this->saveJsonResponse("Catégorie bien supprimée");
        } else {
            $this->BadRequestJsonResponse($save);
        }
    }

    public function model(){
        $this->jsonResponse($this->model->model());
    }
}