<?php

namespace App\Controller;

use App\Controller\DefaultController;
use App\Model\AnimalModel;

use OpenApi\Annotations as OA;

class AnimalController extends DefaultController
{
    public function __construct()
    {
        $this->model = new AnimalModel;
    }

    /**
     * @OA\Get(
     * path="/animal",
     * summary="List all animals",
     * tags={"Animal"},
     *  @OA\Parameter(
     *          name="access key",
     *          in="query",
     *          description="access key permettant de valider l'application",
     *          required=true,
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Response(
     *          response = "200",
     *          description="List all animals",
     *          @OA\JsonContent(
     *              type="array",
     *              description="Animal[]",
     *              @OA\Items(
     *                  ref="#/components/schemas/Animal"
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
        $this->jsonResponse($this->model->findAll());
    }

 /**
     * Retourne un animal
     * @OA\Get(
     *      path="/animal/{id}",
     *      summary="Retourne un animal",
     *      tags={"Animal"},
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          description="id de l'animal à récupérer",
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
     *          description="Retourne un animal",
     *          @OA\JsonContent(ref="#/components/schemas/Animal")
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
     * Créer un animal
     * 
     * @OA\Post(
     *      path="/animal/create",
     *      summary="Create animal",
     *      tags={"Animal"},
     *      @OA\Parameter(
     *          name="access key",
     *          in="query",
     *          description="access key permettant de valider l'application",
     *          required=true,
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Response(
     *          response="201",
     *          description="Animal enregistré",
     *          @OA\JsonContent(
     *              type="string"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          description="Animal à enregistrer",
     *          required=true,
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="nom",
     *                  type="string",
     *                  example="medeor"
     *              ),
     *              @OA\Property(
     *                  property="type",
     *                  type="string",
     *                  example="chien"
     *              ),
     *              @OA\Property(
     *                  property="race",
     *                  type="string",
     *                  example="labrador"
     *              ),
     *              @OA\Property(
     *                  property="poids",
     *                  type="float",
     *                  example=29.95
     *              ),
     *              @OA\Property(
     *                  property="age",
     *                  type="int",
     *                  example=4
     *              ),
     *              @OA\Property(
     *                  property="description",
     *                  type="string",
     *                  example="Il est gentil"
     *              ),
     *              @OA\Property(
     *                  property="photo",
     *                  type="string",
     *                  example="219779417329"
     *              ),
     *              @OA\Property(
     *                  property="proprietaire",
     *                  type="int",
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
            $this->saveJsonResponse("Animal bien enregistré");
        } else {
            $this->BadRequestJsonResponse($save);
        }
    }


    /**
     * Update animal in Db
     * 
     * @OA\Put(
     *      path="/animal/update/{id}",
     *      summary="Update animal",
     *      tags={"Animal"},
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
     *          description="id de l'animal à mettre à jour",
     *          required=true,
     *          @OA\Schema(type="integer")
     *      ),
     *      @OA\Response(
     *          response="200",
     *          description="Animal enregistré",
     *          @OA\JsonContent(
     *              type="string"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          description="Animal à enregistrer",
     *          required=true,
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="nom",
     *                  type="string",
     *                  example="medeor"
     *              ),
     *              @OA\Property(
     *                  property="type",
     *                  type="string",
     *                  example="chien"
     *              ),
     *              @OA\Property(
     *                  property="race",
     *                  type="chien",
     *                  example="labrador"
     *              ),
     *              @OA\Property(
     *                  property="poids",
     *                  type="float",
     *                  example=29.95
     *              ),
     *              @OA\Property(
     *                  property="age",
     *                  type="int",
     *                  example=4
     *              ),
     *              @OA\Property(
     *                  property="description",
     *                  type="string",
     *                  example="Il est gentil"
     *              ),
     *              @OA\Property(
     *                  property="photo",
     *                  type="string",
     *                  example="219779417329"
     *              ),
     *              @OA\Property(
     *                  property="proprietaire",
     *                  type="int",
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
                $this->saveJsonResponse("Animal modifié ");
            } else {
                $this->BadRequestJsonResponse($save);
            }
        } else {
            $this->jsonResponse(array("message" => "Animal non trouvé"));
        }
    }

/**
     * Delete animal in Db
     * @OA\Delete(
     *      path="/animal/delete/{id}",
     *      summary="Delete animal",
     *      tags={"Animal"},
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          description="id de l'animal à supprimer",
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
     *              example="Animal supprimé"
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
            $this->saveJsonResponse("Animal bien supprimé");
        } else {
            $this->BadRequestJsonResponse($save);
        }
    }

    public function model()
    {
        $this->jsonResponse($this->model->model());
    }
}
