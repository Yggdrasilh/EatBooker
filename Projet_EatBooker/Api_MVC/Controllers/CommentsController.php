<?php

namespace App\Controllers;

use App\Models\CommentsModel;
use App\Entities\Comments;
use App\Core\Validator;

class CommentsController extends Controller
{

    public function index()
    {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        echo  json_encode(["comments" => (new CommentsModel())->findAll()]);
    }

    function ajout()
    {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        $commentsModel = new CommentsModel();
        $messageError = '';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Récupérer les données JSON du corps de la requête
            $json = file_get_contents('php://input');

            // Convertir les données JSON en tableau PHP
            $data = json_decode($json, true);

            //tableau de qui référence toute les clés qui corresponde au champs de formulaire
            $keys = [
                'titre_comments',
                'corps_comments',
                'reporting_comments',
                'id_user',
                'id_restaurant',
            ];


            //vérification que tout les champs de formulaire sont remplie et gestion des erreurs
            if (Validator::validPostSelect($data, $keys)) {

                $comments = new Comments;
                $comments->setTitre_comments($this->protected_values($data['titre_comments']));
                $comments->setCorps_comments($this->protected_values($data['corps_comments']));
                $comments->setReporting_comments($this->protected_values($data["reporting_comments"]));
                $comments->setId_user($this->protected_values($data['id_user']));
                $comments->setId_restaurant($this->protected_values($data['id_restaurant']));

                $commentsModel->create($comments);
                echo  json_encode(['status' => true]);
            } else {
                $messageError =  "Tous les champs du formulaire ne sont pas correctement renseignés !";
                echo  json_encode(['status' => false, 'message' => $messageError]);
            }
        }
    }

    function affichage()
    {
        $id = $_GET['id'];
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        echo  json_encode(["comments" => (new CommentsModel())->findOne($id), 'id' => $id]);
    }

    function delete()
    {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        $id = $_GET['id'] ?? '';
        $commentsModel = new CommentsModel();

        // vérifier que l'id est bien renseigner
        if ($id != '') {
            $commentsModel->delete($id);

            echo  json_encode(['status' => true]);
        } else {
            echo  json_encode(['status' => false, 'message' => "Vérifier que l'id est bien passer en paramètre"]);
        }
    }

    function update()
    {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        $commentsModel = new CommentsModel();
        $messageError = '';
        $id = $_GET['id'] ?? '';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Récupérer les données JSON du corps de la requête
            $json = file_get_contents('php://input');

            // Convertir les données JSON en tableau PHP
            $data = json_decode($json, true);

            //tableau de qui référence toute les clés qui corresponde au champs de formulaire
            $keys = [
                'titre_comments',
                'corps_comments',
                'reporting_comments',
                'id_user',
                'id_restaurant',
            ];


            //vérification que tout les champs de formulaire sont remplie et gestion des erreurs
            if (Validator::validPostSelect($data, $keys) && $id != '') {

                $comments = new Comments;
                $comments->setTitre_comments($this->protected_values($data['titre_comments']));
                $comments->setCorps_comments($this->protected_values($data['corps_comments']));
                $comments->setReporting_comments($this->protected_values($data["reporting_comments"]));
                $comments->setId_user($this->protected_values($data['id_user']));
                $comments->setId_restaurant($this->protected_values($data['id_restaurant']));

                $commentsModel->update($comments, $id);
                echo  json_encode(['status' => true]);
            } else {
                $messageError =  "Tous les champs du formulaire ne sont pas correctement renseignés OU l'id n'est pas bien passer en paramètre !";
                echo  json_encode(['status' => false, 'message' => $messageError]);
            }
        }
    }
}
