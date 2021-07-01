<?php
namespace App\Controller;

use App\Model\CategorieModel;
use App\Controller\DefaultController;

class CategorieController extends DefaultController{
    
    public function __construct()
    {
        $this->model = new CategorieModel;
    }

  /**
     * @OA\Get(
     * path="/categorie",
     * summary="List all categories",
     *       tags={"Catégories"},
     *  @OA\Parameter(
     *          name="access key",
     *          in="query",
     *          description="access key permettant de valider l'application",
     *          required=true,
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Response(
     *          response = "200",
     *          description="List all categories",
     *          @OA\JsonContent(
     *              type="array",
     *              description="Categorie[]",
     *              @OA\Items(
     *                  ref="#/components/schemas/Categorie"
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
    public function list ()
    {
        $this->jsonResponse($this->model->findAll());
    }


  /**
     * Retourne un categorie
     * @OA\Get(
     *      path="/categorie/{id}",
     *      summary="Retourne une categorie",
     *       tags={"Catégories"},
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          description="id de la categorie à récupérer",
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
     *          description="Retourne une categorie",
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
     * Créer une catégorie
     * 
     * @OA\Post(
     *      path="/catégorie/create",
     *      summary="Create catégorie",
     *       tags={"Catégories"},
     *      @OA\Parameter(
     *          name="access key",
     *          in="query",
     *          description="access key permettant de valider l'application",
     *          required=true,
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Response(
     *          response="201",
     *          description="Catégorie enregistré",
     *          @OA\JsonContent(
     *              type="string"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          description="Catégorie à enregistrer",
     *          required=true,
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="nom",
     *                  type="string",
     *                  example="Alimentation"
     *              ),
     *          )
     *      )
     * )
     *
     * @param array $data
     * @return void
     */
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

 /**
     * Update catégorie in Db
     * 
     * @OA\Put(
     *      path="/catégorie/update/{id}",
     *      summary="Update catégorie",
     *       tags={"Catégories"},
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
     *          description="id de l'catégorie à mettre à jour",
     *          required=true,
     *          @OA\Schema(type="integer")
     *      ),
     *      @OA\Response(
     *          response="200",
     *          description="Catégorie enregistré",
     *          @OA\JsonContent(
     *              type="string"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          description="Catégorie à enregistrer",
     *          required=true,
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="nom",
     *                  type="string",
     *                  example="Alimentation"
     *              ),
     *          )
     *      )
     * )
     *
     * @param array $data
     * @param int $id
     * @return void
     */
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

    /**
     * Delete catégorie in Db
     * @OA\Delete(
     *      path="/catégorie/delete/{id}",
     *      summary="Delete catégorie",
     *       tags={"Catégories"},
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          description="id de la catégorie à supprimer",
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
     *              example="Catégorie supprimé"
     *          )
     *      )
     * )
     *
     * @param string $id
     * @return void
     */
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