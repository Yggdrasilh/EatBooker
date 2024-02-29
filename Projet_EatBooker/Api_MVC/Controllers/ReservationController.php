<?php

namespace App\Controllers;


use App\Core\Validator;
use App\Entities\Reservation;
use App\Models\ReservationModel;

class ReservationController extends Controller
{

    public function index()
    {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        echo  json_encode(["reservation" => (new ReservationModel())->findAll()]);
    }

    function ajout()
    {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        $reservationModel = new ReservationModel();
        $messageError = '';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Récupérer les données JSON du corps de la requête
            $json = file_get_contents('php://input');

            // Convertir les données JSON en tableau PHP
            $data = json_decode($json, true);

            //tableau de qui référence toute les clés qui corresponde au champs de formulaire
            $keys = [
                'date_reservation',
                'heure_reservation',
                'nb_couvert_reservation',
                'statut_reservation',
                'id_restaurant',
                'id_user'
            ];


            //vérification que tout les champs de formulaire sont remplie et gestion des erreurs
            if (Validator::validPostSelect($data, $keys)) {

                $reservation = new Reservation;
                $reservation->setDate_reservation($this->protected_values($data['date_reservation']));
                $reservation->setHeure_reservation($this->protected_values($data['heure_reservation']));
                $reservation->setNb_couvert_reservation($this->protected_values($data['nb_couvert_reservation']));
                $reservation->setSatut_reservation($this->protected_values($data['statut_reservation']));
                $reservation->setId_restaurant($this->protected_values($data['id_restaurant']));
                $reservation->setId_user($this->protected_values($data['id_user']));

                $reservationModel->create($reservation);
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

        echo  json_encode(["reservation" => (new ReservationModel())->findOne($id), 'id' => $id]);
    }

    function delete()
    {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        $id = $_GET['id'] ?? '';
        $reservationModel = new ReservationModel();

        // vérifier que l'id est bien renseigner
        if ($id != '') {
            $reservationModel->delete($id);

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

        $reservationModel = new ReservationModel();
        $messageError = '';
        $id = $_GET['id'] ?? '';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Récupérer les données JSON du corps de la requête
            $json = file_get_contents('php://input');

            // Convertir les données JSON en tableau PHP
            $data = json_decode($json, true);

            //tableau de qui référence toute les clés qui corresponde au champs de formulaire
            $keys = [
                'date_reservation',
                'heure_reservation',
                'nb_couvert_reservation',
                'statut_reservation',
                'id_restaurant',
                'id_user'
            ];


            //vérification que tout les champs de formulaire sont remplie et gestion des erreurs
            if (Validator::validPostSelect($data, $keys) && $id != '') {

                $reservation = new Reservation;
                $reservation->setDate_reservation($this->protected_values($data['date_reservation']));
                $reservation->setHeure_reservation($this->protected_values($data['heure_reservation']));
                $reservation->setNb_couvert_reservation($this->protected_values($data['nb_couvert_reservation']));
                $reservation->setSatut_reservation($this->protected_values($data['statut_reservation']));
                $reservation->setId_restaurant($this->protected_values($data['id_restaurant']));
                $reservation->setId_user($this->protected_values($data['id_user']));

                $reservationModel->update($reservation, $id);
                echo  json_encode(['status' => true]);
            } else {
                $messageError =  "Tous les champs du formulaire ne sont pas correctement renseignés OU l'id n'est pas bien passer en paramètre !";
                echo  json_encode(['status' => false, 'message' => $messageError]);
            }
        }
    }
}
