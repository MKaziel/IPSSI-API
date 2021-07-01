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

    /**
     * @OA\Get(
     * path="/article",
     * summary="List all articles",
     *      tags={"Article"},
     *  @OA\Parameter(
     *          name="access key",
     *          in="query",
     *          description="access key permettant de valider l'application",
     *          required=true,
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Response(
     *          response = "200",
     *          description="List all articles",
     *          @OA\JsonContent(
     *              type="array",
     *              description="Article[]",
     *              @OA\Items(
     *                  ref="#/components/schemas/Article"
     *              ),
     *          ),
     *          @OA\XmlContent(
     *              type="string"
     *          )
     *      ),
     *      @OA\Response(
     *          response="401",
     *          description="apiKey missing",
     *          @OA\JsonContent(
     *              type="string",
     *              description="access key manquante"
     *          )
     *      ),
     *      @OA\Response(
     *          response="500",
     *          description="internal server error",
     *          @OA\JsonContent(
     *              type="string",
     *              description="access key manquante"
     *          )
     *      ),
     *      @OA\Response(
     *          response="403",
     *          description="Accès à la page refusé",
     *          @OA\JsonContent(
     *          type="string",
     *          description="access key manquante"
     *          )
     *      )
     * )
     * 
     * @return void
     */
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

/**
     * Retourne un article
     * @OA\Get(
     *      path="/article/{id}",
     *      summary="Retourne un article",
     *       tags={"Article"},
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          description="id de l'article à récupérer",
     *          required=true,
     *          @OA\Schema(type="integer")
     *      ),
     *      @OA\Parameter(
     *          name="access key",
     *          in="query",
     *          description="access key permettant de valider l'application",
     *          required=true,
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Response(
     *          response ="200",
     *          description="Retourne un article",
     *          @OA\JsonContent(ref="#/components/schemas/Achat")
     *      ),
     *      @OA\Response(
     *          response="401",
     *          description="apiKey missing",
     *          @OA\JsonContent(
     *              type="string",
     *              description="access key manquante"
     *          )
     *      ),
     *      @OA\Response(
     *          response="500",
     *          description="internal server error",
     *          @OA\JsonContent(
     *              type="string",
     *              description="access key manquante"
     *          )
     *      ),
     *     @OA\Response(
     *          response="403",
     *          description="Accès à la page refusé",
     *          @OA\JsonContent(
     *          type="string",
     *          description="access key manquante"
     *          )
     *      )
     * )
     *
     * @param integer $id
     * @return void
     */
    public function single($id)
    {
        $this->jsonResponse($this->model->find($id));
    }

/**
     * Créer un article
     * 
     * @OA\Post(
     *      path="/article/create",
     *      summary="Create article",
     *       tags={"Article"},
     *      @OA\Parameter(
     *          name="access key",
     *          in="query",
     *          description="access key permettant de valider l'application",
     *          required=true,
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Response(
     *          response="201",
     *          description="Article enregistré",
     *          @OA\JsonContent(
     *              type="string"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          description="Article à enregistrer",
     *          required=true,
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="titre",
     *                  type="string",
     *                  example="les nouvelles astuces pour promener son chien"
     *              ),
     *              @OA\Property(
     *                  property="contenue",
     *                  type="string",
     *                  example="Lorem Ipsum"
     *              ),
     *              @OA\Property(
     *                  property="categorie_id",
     *                  type="int",
     *                  example=3
     *              ),
     *              @OA\Property(
     *                  property="user_id",
     *                  type="int",
     *                  example=4
     *              ),
     *              @OA\Property(
     *                  property="illustration",
     *                  type="string",
     *                  example=null
     *              ),
     *          )
     *      )
     * )
     *
     * @param array $data
     * @return void
     */
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

  /**
     * Update article in Db
     * 
     * @OA\Put(
     *      path="/article/update/{id}",
     *      summary="Update article",
     *       tags={"Article"},
     *      @OA\Parameter(
     *          name="access key",
     *          in="query",
     *          description="access key permettant de valider l'application",
     *          required=true,
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          description="id de l'article à mettre à jour",
     *          required=true,
     *          @OA\Schema(type="integer")
     *      ),
     *      @OA\Response(
     *          response="200",
     *          description="Article enregistré",
     *          @OA\JsonContent(
     *              type="string"
     *          )
     *      ),
    @OA\RequestBody(
     *          description="Article à enregistrer",
     *          required=true,
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="titre",
     *                  type="string",
     *                  example="les nouvelles astuces pour promener son chien"
     *              ),
     *              @OA\Property(
     *                  property="contenue",
     *                  type="string",
     *                  example="Lorem Ipsum"
     *              ),
     *              @OA\Property(
     *                  property="categorie_id",
     *                  type="int",
     *                  example=3
     *              ),
     *              @OA\Property(
     *                  property="user_id",
     *                  type="int",
     *                  example=4
     *              ),
     *              @OA\Property(
     *                  property="illustration",
     *                  type="string",
     *                  example=null
     *              ),
     *          )
     *      )
     * )
     *
     * @param array $data
     * @param int $id
     * @return void
     */
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

/**
     * Delete article in Db
     * @OA\Delete(
     *      path="/article/delete/{id}",
     *      summary="Delete article",
     *       tags={"Article"},
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          description="id de l'article à supprimer",
     *          required=true,
     *          @OA\Schema(type="integer")
     *      ),
     *      @OA\Parameter(
     *          name="access key",
     *          in="query",
     *          description="access key permettant de valider l'application",
     *          required=true,
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Response(
     *          response="200",
     *          description="Suppression validée",
     *          @OA\JsonContent(
     *              type="string",
     *              example="Article supprimé"
     *          )
     *      )
     * )
     *
     * @param string $id
     * @return void
     */
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
