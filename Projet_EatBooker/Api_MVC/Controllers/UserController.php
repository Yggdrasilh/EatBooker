<?php

namespace App\Controllers;


use App\Core\Validator;
use App\Entities\User;
use App\Models\UserModel;

class UserController extends Controller
{

    public function index()
    {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        echo  json_encode(["user" => (new UserModel())->findAll()]);
    }

    function ajout()
    {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        $userModel = new UserModel();
        $messageError = '';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Récupérer les données JSON du corps de la requête
            $json = file_get_contents('php://input');

            // Convertir les données JSON en tableau PHP
            $data = json_decode($json, true);

            //tableau de qui référence toute les clés qui corresponde au champs de formulaire
            $keys = [
                'nom_user',
                'prenom_user',
                'email_user',
                'password_user'
            ];


            //vérification que tout les champs de formulaire sont remplie et gestion des erreurs
            if (Validator::validPostSelect($data, $keys)) {

                $user = new User;
                $user->setNom_user($this->protected_values($data['nom_user']));
                $user->setPrenom_user($this->protected_values($data['prenom_user']));
                $user->setEmail_user($this->protected_values($data['email_user']));
                $user->setPassword_user($this->protected_values($data['password_user']));


                $userModel->create($user);
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

        echo  json_encode(["user" => (new UserModel())->findOne($id), 'id' => $id]);
    }

    function delete()
    {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        $id = $_GET['id'] ?? '';
        $userModel = new UserModel();

        // vérifier que l'id est bien renseigner
        if ($id != '') {
            $userModel->delete($id);

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

        $userModel = new UserModel();
        $messageError = '';
        $id = $_GET['id'] ?? '';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Récupérer les données JSON du corps de la requête
            $json = file_get_contents('php://input');

            // Convertir les données JSON en tableau PHP
            $data = json_decode($json, true);

            //tableau de qui référence toute les clés qui corresponde au champs de formulaire
            $keys = [
                'nom_user',
                'prenom_user',
                'email_user',
                'password_user'
            ];


            //vérification que tout les champs de formulaire sont remplie et gestion des erreurs
            if (Validator::validPostSelect($data, $keys) && $id != '') {

                $user = new User;
                $user->setNom_user($this->protected_values($data['nom_user']));
                $user->setPrenom_user($this->protected_values($data['prenom_user']));
                $user->setEmail_user($this->protected_values($data['email_user']));
                $user->setPassword_user($this->protected_values($data['password_user']));

                $userModel->update($user, $id);
                echo  json_encode(['status' => true]);
            } else {
                $messageError =  "Tous les champs du formulaire ne sont pas correctement renseignés OU l'id n'est pas bien passer en paramètre !";
                echo  json_encode(['status' => false, 'message' => $messageError]);
            }
        }
    }
}
