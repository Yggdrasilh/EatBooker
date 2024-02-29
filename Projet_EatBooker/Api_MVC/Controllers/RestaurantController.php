<?php

namespace App\Controllers;

use App\Entities\Restaurant;
use App\Models\RestaurantModel;
use App\Core\Validator;

class RestaurantController extends Controller
{

    public function index()
    {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        echo  json_encode(["restaurant" => (new RestaurantModel())->findAll()]);
    }

    public function affichage()
    {
        $id_restaurant = $_GET["id"];
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        echo  json_encode(["restaurant" => (new RestaurantModel())->findOne($id_restaurant)]);
    }

    function ajout()
    {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        $restaurantModel = new RestaurantModel();
        $messageError = '';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Récupérer les données JSON du corps de la requête
            $json = file_get_contents('php://input');

            // Convertir les données JSON en tableau PHP
            $data = json_decode($json, true);

            //tableau de qui référence toute les clés qui corresponde au champs de formulaire
            $keys = [
                'nom_restaurant',
                'email_restaurant',
                'password_restaurant',
                'adresse_restaurant',
                'cp_restaurant',
                'ville_restaurant',
                'description_restaurant',
                'place_max_restaurant',
                'prix_restaurant',
                'menu_restaurant',
                'type_restaurant',
                'note_moyenne_restaurant',
                'id_planning',
            ];


            //vérification que tout les champs de formulaire sont remplie
            if (Validator::validPostSelect($data, $keys)) {

                $restaurant = new Restaurant;
                $restaurant->setNom_restaurant($this->protected_values($data['nom_restaurant']));
                $restaurant->setEmail_restaurant($this->protected_values($data['email_restaurant']));
                $restaurant->setPassword_restaurant($this->protected_values($data['password_restaurant']));
                $restaurant->setCp_restaurant($this->protected_values($data['cp_restaurant']));
                $restaurant->setVille_restaurant($this->protected_values($data['ville_restaurant']));
                $restaurant->setDescription_restaurant($this->protected_values($data['description_restaurant']));
                $restaurant->setPlace_max_restaurant($this->protected_values($data['place_max_restaurant']));
                $restaurant->setPrix_restaurant($this->protected_values($data['prix_restaurant']));
                $restaurant->setMenu_restaurant($this->protected_values($data['menu_restaurant']));
                $restaurant->setType_restaurant($this->protected_values($data['type_restaurant']));
                $restaurant->setNote_moyenne_restaurant($this->protected_values($data['note_moyenne_restaurant']));
                $restaurant->setId_planning($this->protected_values($data['id_planning']));
                $restaurantModel->create($restaurant);
                echo  json_encode(['status' => true]);
            } else {
                $messageError =  "Tous les champs du formulaire ne sont pas correctement renseignés !";
                echo  json_encode(['status' => false, 'message' => $messageError]);
            }
        }
    }


    function update()
    {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        $restaurantModel = new RestaurantModel();
        $messageError = '';
        $id = $_GET['id'] ?? '';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Récupérer les données JSON du corps de la requête
            $json = file_get_contents('php://input');

            // Convertir les données JSON en tableau PHP
            $data = json_decode($json, true);

            //tableau de qui référence toute les clés qui corresponde au champs de formulaire
            $keys = [
                'nom_restaurant',
                'email_restaurant',
                'password_restaurant',
                'adresse_restaurant',
                'cp_restaurant',
                'ville_restaurant',
                'description_restaurant',
                'place_max_restaurant',
                'prix_restaurant',
                'menu_restaurant',
                'type_restaurant',
                'note_moyenne_restaurant',
                'id_planning',
            ];

            //vérification que tout les champs de formulaire sont remplie
            if (Validator::validPostSelect($data, $keys) && $id != '') {

                $restaurant = new Restaurant;
                $restaurant->setNom_restaurant($this->protected_values($data['nom_restaurant']));
                $restaurant->setEmail_restaurant($this->protected_values($data['email_restaurant']));
                $restaurant->setPassword_restaurant($this->protected_values($data['password_restaurant']));
                $restaurant->setCp_restaurant($this->protected_values($data['cp_restaurant']));
                $restaurant->setVille_restaurant($this->protected_values($data['ville_restaurant']));
                $restaurant->setDescription_restaurant($this->protected_values($data['description_restaurant']));
                $restaurant->setPlace_max_restaurant($this->protected_values($data['place_max_restaurant']));
                $restaurant->setPrix_restaurant($this->protected_values($data['prix_restaurant']));
                $restaurant->setMenu_restaurant($this->protected_values($data['menu_restaurant']));
                $restaurant->setType_restaurant($this->protected_values($data['type_restaurant']));
                $restaurant->setNote_moyenne_restaurant($this->protected_values($data['note_moyenne_restaurant']));
                $restaurant->setId_planning($this->protected_values($data['id_planning']));
                $restaurantModel->update($restaurant, $id);
                echo  json_encode(['status' => true]);
            } else {
                $messageError =  "Tous les champs du formulaire ne sont pas correctement renseignés !";
                echo  json_encode(['status' => false, 'message' => $messageError]);
            }
        }
    }

    function delete()
    {
        $id_restaurant = $_GET["id"] ?? '';

        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


        // vérifier que l'id est bien renseigner
        if ($id_restaurant != '') {
            (new RestaurantModel())->delete($id_restaurant);

            echo  json_encode(['status' => true]);
        } else {
            echo  json_encode(['status' => false, 'message' => "Vérifier que l'id est bien passer en paramètre"]);
        }
    }
}
