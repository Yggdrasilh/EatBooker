<?php

namespace App\Controllers;

use App\Core\Validator;

class AdminController extends Controller
{

    public function findAll()
    {
        // Appeler l'API pour récupérer les informations utilisateur

        $apiUrl = $this->baseUrlApi . '/user';

        $apiData = file_get_contents($apiUrl);
        // var_dump($apiData);
        // die;
        $userData = json_decode($apiData, true);
        // var_dump($userData);
        // on récupere une liste tableau d'ou la syntaxe en dessous
        $this->render('admin/findAll', ['list' => $userData]);
    }

    public function supprimer()
    {
        $this->render('admin/supprimer');
    }

    public function delete($id_user)
    {

        $apiUrl = $this->baseUrlApi . '/delete/' . $id_user;

        $apiData = file_get_contents($apiUrl);
        // var_dump($apiData);
        // die;
        $userData = json_decode($apiData, true);
        // var_dump($userData);
        // on récupere une liste tableau d'ou la syntaxe en dessous
        if ($apiData !== false) {
            // Appeler findAll() pour récupérer à nouveau les données utilisateur après la suppression
            $this->findAll();
            return;
        } else {
            echo "Erreur lors de la suppression de l'utilisateur.";
            return;
        }
    }

    public function update($id_user)
    {
        //     $apiUrl = 'http://localhost:8888/Projet_EatBooker/Projet_EatBooker/Api_MVC/public/user/update/' . $id_user;

        //     // Récupérer les données envoyées par la requête AJAX
        //     $inputJson = file_get_contents('php://input');
        //     $Data = json_decode($inputJson, true);
        //     $id_user = $Data['id_user'];
        //     // var_dump($Data);
        //     // die;
        //     // Appeler l'API pour ajouter le restaurant aux favoris de l'utilisateur

        //     $options = [
        //         'http' => [
        //             'header'  => 'Content-Type: application/json',
        //             'method'  => 'POST',
        //             'content' => json_encode(['id_user' => $id_user] + $Data),
        //         ]
        //     ];
        //     $context = stream_context_create($options);
        //     $result = file_get_contents($apiUrl, false, $context);
        //     // Vérifier le résultat de la requête
        //     if ($result === FALSE) {
        //         // Gestion des erreurs
        //         echo "Une erreur s'est produite.";
        //     } else {
        //         // Traitement de la réponse de l'API
        //         $responseData = json_decode($result, true);
        //         // Répondre à la requête AJAX avec un objet JSON indiquant si l'opération a réussi ou non
        //         echo json_encode(['success' => isset($responseData['success']) && $responseData['success'] === true]);
        //     }
    }
}
