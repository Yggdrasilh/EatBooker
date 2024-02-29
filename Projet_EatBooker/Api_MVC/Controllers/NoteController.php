<?php

namespace App\Controllers;


use App\Core\Validator;
use App\Entities\Note;
use App\Models\NoteModel;

class ReservationController extends Controller
{

    public function index()
    {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        echo  json_encode(["note" => (new NoteModel())->findAll()]);
    }

    function ajout()
    {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        $noteModel = new NoteModel();
        $messageError = '';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Récupérer les données JSON du corps de la requête
            $json = file_get_contents('php://input');

            // Convertir les données JSON en tableau PHP
            $data = json_decode($json, true);

            //tableau de qui référence toute les clés qui corresponde au champs de formulaire
            $keys = [
                'note_note',
                'id_user',
                'id_restaurant'
            ];


            //vérification que tout les champs de formulaire sont remplie et gestion des erreurs
            if (Validator::validPostSelect($data, $keys)) {

                $note = new Note;
                $note->setNote_note($this->protected_values($data['note_note']));
                $note->setId_user($this->protected_values($data['id_user']));
                $note->setId_restaurant($this->protected_values($data['id_restaurant']));

                $noteModel->create($note);
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

        echo  json_encode(["note" => (new NoteModel())->findOne($id), 'id' => $id]);
    }

    function delete()
    {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        $id = $_GET['id'] ?? '';
        $noteModel = new NoteModel();

        // vérifier que l'id est bien renseigner
        if ($id != '') {
            $noteModel->delete($id);

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

        $noteModel = new NoteModel();
        $messageError = '';
        $id = $_GET['id'] ?? '';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Récupérer les données JSON du corps de la requête
            $json = file_get_contents('php://input');

            // Convertir les données JSON en tableau PHP
            $data = json_decode($json, true);

            //tableau de qui référence toute les clés qui corresponde au champs de formulaire
            $keys = [
                'note_note',
                'id_user',
                'id_restaurant'
            ];


            //vérification que tout les champs de formulaire sont remplie et gestion des erreurs
            if (Validator::validPostSelect($data, $keys) && $id != '') {

                $note = new Note;
                $note->setNote_note($this->protected_values($data['note_note']));
                $note->setId_user($this->protected_values($data['id_user']));
                $note->setId_restaurant($this->protected_values($data['id_restaurant']));

                $noteModel->update($note, $id);
                echo  json_encode(['status' => true]);
            } else {
                $messageError =  "Tous les champs du formulaire ne sont pas correctement renseignés OU l'id n'est pas bien passer en paramètre !";
                echo  json_encode(['status' => false, 'message' => $messageError]);
            }
        }
    }
}
