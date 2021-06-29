<?php
namespace App\Controller;

use App\Controller\DefaultController;
use App\Model\DonModel;

class DonController extends DefaultController
{
    public function __construct()
    {
        $this->model = new DonModel;
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
        $this->jsonResponse($this->model->create($data));

    }

    public function update ($data) 
    {
        $this->jsonResponse($this->model->update($data));

    }

    public function delete (string $id)
    {
        $this->jsonResponse($this->model->delete($id));
    }

    public function model(){
        $this->jsonResponse($this->model->model());
    }
}