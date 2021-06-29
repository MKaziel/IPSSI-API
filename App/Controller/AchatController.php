<?php
namespace App\Controller;

use App\Controller\DefaultController;
use App\Model\AchatModel;


class AchatController extends DefaultController
{
    public function __construct()
    {
        $this->model = new AchatModel;
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
            $this->saveJsonResponse("Achat bien enregistré");
        } else {
            $this->BadRequestJsonResponse($save);
        }

    }

    public function update ($data) 
    {
        // $this->jsonResponse($this->model->update($data));
        if($this->model->update($data['id'])){
            $save=$this->model->update($data);
     
           if ($save === true) {
           $this->saveJsonResponse("Achat modifié ");
            } else {
           $this->BadRequestJsonResponse($save);
       }
   }
       else{
            $this->jsonResponse(array("message" => "Achat non trouvé"));
       }

    }

    public function delete (string $id)
    {
        // $this->jsonResponse($this->model->delete($id));

        $save = $this->model->delete($id);
        if ($save === true){
            $this->saveJsonResponse("Achat bien supprimé");
        } else {
            $this->BadRequestJsonResponse($save);
        }
    }

    public function model(){
        $this->jsonResponse($this->model->model());
    }
}