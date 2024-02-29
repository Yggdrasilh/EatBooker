<?php

namespace App\Controllers;

use App\Entities\Planning;
use App\Models\PlanningModel;
use App\Core\Validator;

class PlanningController extends Controller
{

    public function index()
    {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        echo  json_encode(["planning" => (new PlanningModel())->findAll()]);
    }

    public function affichage()
    {
        $id_planning = $_GET["id"];
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        echo  json_encode(["planning" => (new PlanningModel())->findOne($id_planning)]);
    }

    function ajout()
    {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        $planningModel = new PlanningModel();
        $messageError = '';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Récupérer les données JSON du corps de la requête
            $json = file_get_contents('php://input');

            // Convertir les données JSON en tableau PHP
            $data = json_decode($json, true);

            //tableau de qui référence toute les clés qui corresponde au champs de formulaire
            $keys = [
                'lundi_am',
                'lundi_pm',
                'mardi_am',
                'mardi_pm',
                'mercredi_am',
                'mercredi_pm',
                'jeudi_am',
                'jeudi_pm',
                'vendredi_am',
                'vendredi_pm',
                'samedi_am',
                'samedi_pm',
                'dimanche_am',
                'dimanche_pm',
                'id_restaurant',
            ];


            //vérification que tout les champs de formulaire sont remplie
            if (Validator::validPostSelect($data, $keys)) {

                $planning = new Planning;
                $planning->setLundi_am($this->protected_values($data['lundi_am']));
                $planning->setLundi_pm($this->protected_values($data['lundi_pm']));
                $planning->setMardi_am($this->protected_values($data['mardi_am']));
                $planning->setMardi_pm($this->protected_values($data['mardi_pm']));
                $planning->setMercredi_am($this->protected_values($data['mercredi_am']));
                $planning->setMercredi_pm($this->protected_values($data['mercredi_pm']));
                $planning->setJeudi_am($this->protected_values($data['jeudi_am']));
                $planning->setJeudi_pm($this->protected_values($data['jeudi_pm']));
                $planning->setVendredi_am($this->protected_values($data['vendredi_am']));
                $planning->setVendredi_pm($this->protected_values($data['vendredi_pm']));
                $planning->setSamedi_am($this->protected_values($data['samedi_am']));
                $planning->setSamedi_pm($this->protected_values($data['samedi_pm']));
                $planning->setDimanche_am($this->protected_values($data['dimanche_am']));
                $planning->setDimanche_pm($this->protected_values($data['dimanche_pm']));
                $planning->setId_restaurant($this->protected_values($data['id_restaurant']));
                $planningModel->create($planning);
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

        $planningModel = new PlanningModel();
        $messageError = '';
        $id = $_GET['id'] ?? '';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Récupérer les données JSON du corps de la requête
            $json = file_get_contents('php://input');

            // Convertir les données JSON en tableau PHP
            $data = json_decode($json, true);

            //tableau de qui référence toute les clés qui corresponde au champs de formulaire
            $keys = [
                'lundi_am',
                'lundi_pm',
                'mardi_am',
                'mardi_pm',
                'mercredi_am',
                'mercredi_pm',
                'jeudi_am',
                'jeudi_pm',
                'vendredi_am',
                'vendredi_pm',
                'samedi_am',
                'samedi_pm',
                'dimanche_am',
                'dimanche_pm',
                'id_restaurant',
            ];


            //vérification que tout les champs de formulaire sont remplie
            if (Validator::validPostSelect($data, $keys) && $id != '') {

                $planning = new Planning;
                $planning->setLundi_am($this->protected_values($data['lundi_am']));
                $planning->setLundi_pm($this->protected_values($data['lundi_pm']));
                $planning->setMardi_am($this->protected_values($data['mardi_am']));
                $planning->setMardi_pm($this->protected_values($data['mardi_pm']));
                $planning->setMercredi_am($this->protected_values($data['mercredi_am']));
                $planning->setMercredi_pm($this->protected_values($data['mercredi_pm']));
                $planning->setJeudi_am($this->protected_values($data['jeudi_am']));
                $planning->setJeudi_pm($this->protected_values($data['jeudi_pm']));
                $planning->setVendredi_am($this->protected_values($data['vendredi_am']));
                $planning->setVendredi_pm($this->protected_values($data['vendredi_pm']));
                $planning->setSamedi_am($this->protected_values($data['samedi_am']));
                $planning->setSamedi_pm($this->protected_values($data['samedi_pm']));
                $planning->setDimanche_am($this->protected_values($data['dimanche_am']));
                $planning->setDimanche_pm($this->protected_values($data['dimanche_pm']));
                $planning->setId_restaurant($this->protected_values($data['id_restaurant']));
                $planningModel->update($planning, $id);
                echo  json_encode(['status' => true]);
            } else {
                $messageError =  "Tous les champs du formulaire ne sont pas correctement renseignés !";
                echo  json_encode(['status' => false, 'message' => $messageError]);
            }
        }
    }

    function delete()
    {
        $id_planning = $_GET["id"] ?? '';
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        // vérifier que l'id est bien renseigner
        if ($id_planning != '') {
            (new PlanningModel())->delete($id_planning);

            echo  json_encode(['status' => true]);
        } else {
            echo  json_encode(['status' => false, 'message' => "Vérifier que l'id est bien passer en paramètre"]);
        }
    }
}
