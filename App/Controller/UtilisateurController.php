<?php
namespace App\Controller;

use App\Controller\DefaultController;
use App\Model\UtilisateurModel;

class UtilisateurController extends DefaultController
{
    public function __construct()
    {
        $this->model = new UtilisateurModel;
    }

/**
     * @OA\Get(
     * path="/utilisateur",
     * summary="List all utilisateurs",
     *       tags={"Utilisateur"},
     *  @OA\Parameter(
     *          name="access key",
     *          in="query",
     *          description="access key permettant de valider l'application",
     *          required=true,
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Response(
     *          response = "200",
     *          description="List all utilisateurs",
     *          @OA\JsonContent(
     *              type="array",
     *              description="Utilisateur[]",
     *              @OA\Items(
     *                  ref="#/components/schemas/Utilisateur"
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
     * Retourne un utilisateur
     * @OA\Get(
     *      path="/utilisateur/{id}",
     *      summary="Retourne un utilisateur",
     *       tags={"Utilisateur"},
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          description="id du utilisateur à récupérer",
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
     *          description="Retourne un utilisateur",
     *          @OA\JsonContent(ref="#/components/schemas/Utilisateur")
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
     * Créer un utilisateur
     * 
     * @OA\Post(
     *      path="/utilisateur/create",
     *      summary="Create utilisateur",
     *       tags={"Utilisateur"},
     *      @OA\Parameter(
     *          name="access key",
     *          in="query",
     *          description="access key permettant de valider l'application",
     *          required=true,
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Response(
     *          response="201",
     *          description="Utilisateur enregistré",
     *          @OA\JsonContent(
     *              type="string"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          description="Utilisateur à enregistrer",
     *          required=true,
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="identifiant",
     *                  type="string",
     *                  example="Bob77"
     *              ),
     *              @OA\Property(
     *                  property="motdepasse",
     *                  type="string",
     *                  example="password"
     *              ),
     *              @OA\Property(
     *                  property="role",
     *                  type="string",
     *                  example="user"
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
        
        //$this->jsonResponse($this->model->create($data));
        $save = $this->model->create($data);
        if ($save === true){
            $this->saveJsonResponse("Utilisateur bien enregistré");
        } else {
            $this->BadRequestJsonResponse($save);
        }

    }

/**
     * Update utilisateur in Db
     * 
     * @OA\Put(
     *      path="/utilisateur/update/{id}",
     *      summary="Update utilisateur",
     *       tags={"Utilisateur"},
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
     *          description="id de l'utilisateur à mettre à jour",
     *          required=true,
     *          @OA\Schema(type="integer")
     *      ),
     *      @OA\Response(
     *          response="200",
     *          description="Utilisateur enregistré",
     *          @OA\JsonContent(
     *              type="string"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          description="Utilisateur à enregistrer",
     *          required=true,
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="identifiant",
     *                  type="string",
     *                  example="Bob77"
     *              ),
     *              @OA\Property(
     *                  property="motdepasse",
     *                  type="string",
     *                  example="password"
     *              ),
     *              @OA\Property(
     *                  property="role",
     *                  type="string",
     *                  example="user"
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
            $this->saveJsonResponse("L'utilisateur a été modifié ");
             } else {
            $this->BadRequestJsonResponse($save);
        }
    }
        else{
             $this->jsonResponse(array(
                    "message" => "Utilistateur non trouvé",
                    "connecter" => false
                ));
            

        }

    }

/**
     * Delete utilisateur in Db
     * @OA\Delete(
     *      path="/utilisateur/delete/{id}",
     *      summary="Delete utilisateur",
     *       tags={"Utilisateur"},
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          description="id du utilisateur à supprimer",
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
     *              example="Utilisateur supprimé"
     *          )
     *      )
     * )
     *
     * @param string $id
     * @return void
     */
    public function delete (string $id)
    {
        $save =$this->model->delete($id);
        if ($save === true) {
            $this->saveJsonResponse("L'utilisateur a été supprimé ");
        } else {
            $this->BadRequestJsonResponse($save);
        }

    }

    public function model(){
        
        $this->jsonResponse($this->model->model());
    }


/**
     * Connexion pour un utilisateur
     * 
     * @OA\Post(
     *      path="/utilisateur/connexion",
     *      summary="Connect utilisateur",
     *       tags={"Utilisateur"},
     *      @OA\Parameter(
     *          name="access key",
     *          in="query",
     *          description="access key permettant de valider l'application",
     *          required=true,
     *          @OA\Schema(type="string")
     *      ),
     *      @OA\Response(
     *          response="200",
     *          description="Utilisateur connecté",
     *          @OA\JsonContent(
     *              type="string"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          description="Utilisateur à connecté",
     *          required=true,
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="identifiant",
     *                  type="string",
     *                  example="Bob77"
     *              ),
     *              @OA\Property(
     *                  property="motdepasse",
     *                  type="string",
     *                  example="password"
     *              ),
     *              @OA\Property(
     *                  property="role",
     *                  type="string",
     *                  example="user"
     *              ),
     *          )
     *      )
     * )
     *
     * @param array $data
     * @return void
     */
    public function connexion(array $data) {
        $allUtilisateur = $this->model->findAll();
        $bool = false;

        while(next($allUtilisateur) && !$bool){
            $current = current($allUtilisateur);
            if($current['identifiant'] == $data['identifiant'] && $current['motdepasse'] == $data['motdepasse']){
                $bool = true;
            }
        }

        if($bool){
            $this->jsonResponse(array(
                "message" => "Utilistateur trouvé",
                "connecter" => true
            ));
        } else {
            $this->jsonResponse(array(
                "message" => "Utilistateur non trouvé",
                "connecter" => false
            ));
        }
    }
}