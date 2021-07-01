<?php

namespace App\Controller;

use App\Controller\DefaultController;
use App\Model\AchatModel;

use OpenApi\Annotations as OA;


class AchatController extends DefaultController
{
    public function __construct()
    {
        $this->model = new AchatModel;
    }

    /**
     * @OA\Get(
     * path="/achat",
     * tags={"Achat"},
     * summary="List all achats",
     *  @OA\Parameter(
     *          name="access key",
     *          in="query",
     *          description="access key permettant de valider l'application",
     *          required=true,
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Response(
     *          response = "200",
     *          description="List all achats",
     *          @OA\JsonContent(
     *              type="array",
     *              description="achat[]",
     *              @OA\Items(
     *                  ref="#/components/schemas/Achat"
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
     * Retourne un achat
     * @OA\Get(
     *      path="/achat/{id}",
     *      summary="Retourne un achat",
     *      tags={"Achat"},
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          description="id de l'achat à récupérer",
     *          required=true,
     *          @OA\Schema(type="integer")
     *      ),
     *      @OA\Parameter(
     *          name="apikey",
     *          in="query",
     *          description="apikey permettant de valider l'application",
     *          required=true,
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Response(
     *          response ="200",
     *          description="Retourne un achat",
     *          @OA\JsonContent(ref="#/components/schemas/Achat")
     *      ),
     *      @OA\Response(
     *          response="401",
     *          description="apiKey missing",
     *          @OA\JsonContent(
     *              type="string",
     *              description="apikey manquante"
     *          )
     *      ),
     *      @OA\Response(
     *          response="500",
     *          description="internal server error",
     *          @OA\JsonContent(
     *              type="string",
     *              description="apikey manquante"
     *          )
     *      ),
     *     @OA\Response(
     *          response="403",
     *          description="Accès à la page refusé",
     *          @OA\JsonContent(
     *          type="string",
     *          description="apikey manquante"
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
     * Créer un achat
     * 
     * @OA\Post(
     *      path="/achat/create",
     *      summary="Create achat",
     *      tags={"Achat"},
     *      @OA\Parameter(
     *          name="apikey",
     *          in="query",
     *          description="apikey permettant de valider l'application",
     *          required=true,
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Response(
     *          response="201",
     *          description="Achat enregistré",
     *          @OA\JsonContent(
     *              type="string"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          description="Achat à enregistrer",
     *          required=true,
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="id_utilisateur",
     *                  type="integer",
     *                  example=32
     *              ),
     *              @OA\Property(
     *                  property="id_produit",
     *                  type="integer",
     *                  example=19
     *              ),
     *              @OA\Property(
     *                  property="montant",
     *                  type="float",
     *                  example=49.99
     *              ),
     *              @OA\Property(
     *                  property="quantite",
     *                  type="integer",
     *                  example=34
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
            $this->saveJsonResponse("Achat bien enregistré");
        } else {
            $this->BadRequestJsonResponse($save);
        }
    }


    /**
     * Update achat in Db
     * 
     * @OA\Put(
     *      path="/achat/update/{id}",
     *      summary="Update achat",
     *      tags={"Achat"},
     *      @OA\Parameter(
     *          name="apikey",
     *          in="query",
     *          description="apikey permettant de valider l'application",
     *          required=true,
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          description="id de l'achat à mettre à jour",
     *          required=true,
     *          @OA\Schema(type="integer")
     *      ),
     *      @OA\Response(
     *          response="200",
     *          description="Achat enregistré",
     *          @OA\JsonContent(
     *              type="string"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          description="Achat à enregistrer",
     *          required=true,
     *          request="Update achat",
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="id_utilisateur",
     *                  type="integer",
     *                  example=32
     *              ),
     *              @OA\Property(
     *                  property="id_produit",
     *                  type="integer",
     *                  example=19
     *              ),
     *              @OA\Property(
     *                  property="montant",
     *                  type="float",
     *                  example=49.99
     *              ),
     *              @OA\Property(
     *                  property="quantite",
     *                  type="integer",
     *                  example=34
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
                $this->saveJsonResponse("Achat modifié ");
            } else {
                $this->BadRequestJsonResponse($save);
            }
        } else {
            $this->jsonResponse(array("message" => "Achat non trouvé"));
        }
    }

    /**
     * Delete achat in Db
     * @OA\Delete(
     *      path="/achat/delete/{id}",
     *      summary="Delete achat",
     *      tags={"Achat"},
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          description="id de l'achat à supprimer",
     *          required=true,
     *          @OA\Schema(type="integer")
     *      ),
     *      @OA\Parameter(
     *          name="apikey",
     *          in="query",
     *          description="apikey permettant de valider l'application",
     *          required=true,
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Response(
     *          response="200",
     *          description="Suppression validée",
     *          @OA\JsonContent(
     *              type="string",
     *              example="Achat supprimé"
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
            $this->saveJsonResponse("Achat bien supprimé");
        } else {
            $this->BadRequestJsonResponse($save);
        }
    }

    public function model()
    {
        $this->jsonResponse($this->model->model());
    }
}
