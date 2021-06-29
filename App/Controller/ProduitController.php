<?php
namespace App\Controller;

use App\Controller\DefaultController;
use App\Model\ProduitModel;

class ProduitController extends DefaultController
{
    public function __construct()
    {
        $this->model = new ProduitModel;
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
        $save = $this->model->create($data);
        if ($save === true){
            $this->saveJsonResponse("Produit bien enregistré");
        } else {
            $this->BadRequestJsonResponse($save);
        }
    }

    public function update ($data) 
    {
        if($this->model->find($data['id'])){
            
            $save=$this->model->update($data);
               if ($save === true) {
                   $this->saveJsonResponse("Le produit a été modifié ");
             } else {
                   $this->BadRequestJsonResponse($save);
        }
    }
        else{
             $this->jsonResponse(array(
                    "message" => "Produit non trouvé",
                    "connecter" => false
                ));
            

        }

    }

    public function delete (string $id)
    {
        $save =$this->model->delete($id);
        if ($save === true) {
            $this->saveJsonResponse("Le produit a été supprimé ");
        } else {
            $this->BadRequestJsonResponse($save);
        }
    }

    public function model(){
        $this->jsonResponse($this->model->model());
    }
}