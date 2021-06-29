<?php

namespace App\Controller;

use App\Model\ArticleModel;
use App\Controller\DefaultController;

class ArticleController extends DefaultController
{

    public function __construct()
    {
        $this->model = new ArticleModel;
    }

    public function list()
    {
        $data = array();
        foreach ($this->model->findAll() as $value) {
            $value->links = [
                "categorie" => SERVER . "categorie/" . $value->categorie_id,
                "user" => SERVER . "user/" . $value->user_id,
                "update" => SERVER . "article/update/" . $value->id,
                "delete" => SERVER . "article/delete/" . $value->id
            ];
            $data[] = $value;
        }
        $this->jsonResponse($data);
    }

    public function single($id)
    {
        $this->jsonResponse($this->model->find($id));
    }

    public function create($data)
    {
        // $this->jsonResponse($this->model->create($data));
        $save = $this->model->create($data);
        if ($save === true) {
            $this->saveJsonResponse("Article bien enregistré");
        } else {
            $this->BadRequestJsonResponse($save);
        }
    }

    public function update($data)
    {
        // $this->jsonResponse($this->model->update($data));
        if ($this->model->update($data['id'])) {
            $save = $this->model->update($data);

            if ($save === true) {
                $this->saveJsonResponse("Article modifié ");
            } else {
                $this->BadRequestJsonResponse($save);
            }
        }
    }

    public function delete(string $id)
    {
        // $this->jsonResponse($this->model->delete($id));
        $save = $this->model->delete($id);
        if ($save === true) {
            $this->saveJsonResponse("Article bien supprimé");
        } else {
            $this->BadRequestJsonResponse($save);
        }
    }

    public function model()
    {
        $this->jsonResponse($this->model->model());
    }
}
