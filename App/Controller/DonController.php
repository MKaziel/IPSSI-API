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

/**
     * @OA\Get(
     * path="/don",
     * summary="List all dons",
     *       tags={"Don"},
     *  @OA\Parameter(
     *          name="access key",
     *          in="query",
     *          description="access key permettant de valider l'application",
     *          required=true,
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Response(
     *          response = "200",
     *          description="List all dons",
     *          @OA\JsonContent(
     *              type="array",
     *              description="Don[]",
     *              @OA\Items(
     *                  ref="#/components/schemas/Don"
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
     * Retourne un don
     * @OA\Get(
     *      path="/don/{id}",
     *      summary="Retourne un don",
     *       tags={"Don"},
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          description="id du don à récupérer",
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
     *          description="Retourne un don",
     *          @OA\JsonContent(ref="#/components/schemas/Don")
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
     * Créer un don
     * 
     * @OA\Post(
     *      path="/don/create",
     *      summary="Create don",
     *       tags={"Don"},
     *      @OA\Parameter(
     *          name="access key",
     *          in="query",
     *          description="access key permettant de valider l'application",
     *          required=true,
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Response(
     *          response="201",
     *          description="Don enregistré",
     *          @OA\JsonContent(
     *              type="string"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          description="Don à enregistrer",
     *          required=true,
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="montant",
     *                  type="float",
     *                  example=39.99
     *              ),
     *              @OA\Property(
     *                  property="date",
     *                  type="date",
     *                  example="31/01/2021"
     *              ),
     *              @OA\Property(
     *                  property="id_utilisateur",
     *                  type="int",
     *                  example=3
     *              ),
     *              @OA\Property(
     *                  property="anonyme",
     *                  type="bool",
     *                  example=false
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
        $save = $this->model->create($data);
        if ($save === true) {
            $this->saveJsonResponse("Don bien enregistré");
        } else {
            $this->BadRequestJsonResponse($save);
        }
    }

/**
     * Update don in Db
     * 
     * @OA\Put(
     *      path="/don/update/{id}",
     *      summary="Update don",
     *       tags={"Don"},
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
     *          description="id du don à mettre à jour",
     *          required=true,
     *          @OA\Schema(type="integer")
     *      ),
     *      @OA\Response(
     *          response="200",
     *          description="Don enregistré",
     *          @OA\JsonContent(
     *              type="string"
     *          )
     *      ),
    *      @OA\RequestBody(
     *          description="Don à enregistrer",
     *          required=true,
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="montant",
     *                  type="float",
     *                  example=39.99
     *              ),
     *              @OA\Property(
     *                  property="date",
     *                  type="date",
     *                  example="31/01/2021"
     *              ),
     *              @OA\Property(
     *                  property="id_utilisateur",
     *                  type="int",
     *                  example=3
     *              ),
     *              @OA\Property(
     *                  property="anonyme",
     *                  type="bool",
     *                  example=false
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
        if ($this->model->find($data['id'])) {

            $save = $this->model->update($data);
            if ($save === true) {
                $this->saveJsonResponse("Le don a été modifié ");
            } else {
                $this->BadRequestJsonResponse($save);
            }
        } else {
            $this->jsonResponse(array(
                "message" => "Don non trouvé",
                "connecter" => false
            ));
        }
    }


/**
     * Delete don in Db
     * @OA\Delete(
     *      path="/don/delete/{id}",
     *      summary="Delete don",
     *       tags={"Don"},
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          description="id du don à supprimer",
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
     *              example="Don supprimé"
     *          )
     *      )
     * )
     *
     * @param string $id
     * @return void
     */
    public function delete(string $id)
    {
        $save = $this->model->delete($id);
        if ($save === true) {
            $this->saveJsonResponse("Le don a été supprimé ");
        } else {
            $this->BadRequestJsonResponse($save);
        }
    }

    public function model()
    {
        $this->jsonResponse($this->model->model());
    }
}
