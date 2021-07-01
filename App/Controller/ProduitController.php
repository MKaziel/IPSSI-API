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

/**
     * @OA\Get(
     * path="/produit",
     * summary="List all produits",
     *       tags={"Produit"},
     *  @OA\Parameter(
     *          name="access key",
     *          in="query",
     *          description="access key permettant de valider l'application",
     *          required=true,
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Response(
     *          response = "200",
     *          description="List all produits",
     *          @OA\JsonContent(
     *              type="array",
     *              description="Produit[]",
     *              @OA\Items(
     *                  ref="#/components/schemas/Produit"
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
     * Retourne un produit
     * @OA\Get(
     *      path="/produit/{id}",
     *      summary="Retourne un produit",
     *       tags={"Produit"},
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          description="id du produit à récupérer",
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
     *          description="Retourne un produit",
     *          @OA\JsonContent(ref="#/components/schemas/Produit")
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
     * Créer un produit
     * 
     * @OA\Post(
     *      path="/produit/create",
     *      summary="Create produit",
     *       tags={"Produit"},
     *      @OA\Parameter(
     *          name="access key",
     *          in="query",
     *          description="access key permettant de valider l'application",
     *          required=true,
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Response(
     *          response="201",
     *          description="Produit enregistré",
     *          @OA\JsonContent(
     *              type="string"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          description="Produit à enregistrer",
     *          required=true,
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="nom",
     *                  type="string",
     *                  example="laisse"
     *              ),
     *              @OA\Property(
     *                  property="prix",
     *                  type="float",
     *                  example=19.99
     *              ),
     *              @OA\Property(
     *                  property="type_animal",
     *                  type="string",
     *                  example="chien"
     *              ),
     *              @OA\Property(
     *                  property="id_categorie",
     *                  type="int",
     *                  example=3
     *              ),
     *              @OA\Property(
     *                  property="quantite",
     *                  type="integer",
     *                  example=20
     *              ),
     *              @OA\Property(
     *                  property="description",
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
        $save = $this->model->create($data);
        if ($save === true) {
            $this->saveJsonResponse("Produit bien enregistré");
        } else {
            $this->BadRequestJsonResponse($save);
        }
    }

/**
     * Update produit in Db
     * 
     * @OA\Put(
     *      path="/produit/update/{id}",
     *      summary="Update produit",
     *       tags={"Produit"},
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
     *          description="id du produit à mettre à jour",
     *          required=true,
     *          @OA\Schema(type="integer")
     *      ),
     *      @OA\Response(
     *          response="200",
     *          description="Produit enregistré",
     *          @OA\JsonContent(
     *              type="string"
     *          )
     *      ),
   *      @OA\RequestBody(
     *          description="Produit à enregistrer",
     *          required=true,
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="nom",
     *                  type="string",
     *                  example="laisse"
     *              ),
     *              @OA\Property(
     *                  property="prix",
     *                  type="float",
     *                  example=19.99
     *              ),
     *              @OA\Property(
     *                  property="type_animal",
     *                  type="string",
     *                  example="chien"
     *              ),
     *              @OA\Property(
     *                  property="id_categorie",
     *                  type="int",
     *                  example=3
     *              ),
     *              @OA\Property(
     *                  property="quantite",
     *                  type="integer",
     *                  example=20
     *              ),
     *              @OA\Property(
     *                  property="description",
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
        if ($this->model->find($data['id'])) {

            $save = $this->model->update($data);
            if ($save === true) {
                $this->saveJsonResponse("Le produit a été modifié ");
            } else {
                $this->BadRequestJsonResponse($save);
            }
        } else {
            $this->jsonResponse(array(
                "message" => "Produit non trouvé",
                "connecter" => false
            ));
        }
    }

/**
     * Delete produit in Db
     * @OA\Delete(
     *      path="/produit/delete/{id}",
     *      summary="Delete produit",
     *       tags={"Produit"},
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          description="id du produit à supprimer",
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
     *              example="Produit supprimé"
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
            $this->saveJsonResponse("Le produit a été supprimé ");
        } else {
            $this->BadRequestJsonResponse($save);
        }
    }

    public function model()
    {
        $this->jsonResponse($this->model->model());
    }
}
