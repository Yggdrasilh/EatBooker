<?php

namespace App\Controllers;

use App\Controllers\CommentsController;


class RestaurantController extends Controller
{


    public function find($id)
    {
        // recuperer l'id restaurant récupérer en GET
        $restoId = $id;
        // var_dump($restoId);
        // die;

        $apiUrl = $this->baseUrlApi . '/restaurant/find/' . $restoId;
        // var_dump($apiUrl);
        // die;
        $apiData = file_get_contents($apiUrl);
        // var_dump($apiData);
        // die;
        $restaurantData = json_decode($apiData, true);
        // var_dump($restaurantData);
        // die;


        // récupération commentaires

        $apiUrl = $this->baseUrlApi . '/Comments/find/' . $restoId;
        $apiData = file_get_contents($apiUrl);
        $commentsData = json_decode($apiData, true);
        (new CommentsController())->FindByID($id);
        // (new AdminController())->findAll();


        $this->render('restaurant/find', ['restaurantData' => $restaurantData, 'commentsData' => (new CommentsController())->FindByID($id)]);
        return $restaurantData;
    }

    // Ajouter un restaurant aux favoris de l'utilisateur
    public function addFavori()
    {
        // Récupérer les données envoyées par la requête AJAX
        $inputJson = file_get_contents('php://input');
        $inputData = json_decode($inputJson, true);

        $userId = $inputData['id_user'];
        $restaurantId = $inputData['id_restaurant'];

        // Appeler l'API pour ajouter le restaurant aux favoris de l'utilisateur
        $api = $this->baseUrlApi . '/favori/add';

        $options = [
            'http' => [
                'header'  => 'Content-Type: application/json',
                'method'  => 'POST',
                'content' => json_encode(['id_user' => $userId, 'id_restaurant' => $restaurantId])
            ]
        ];

        $context = stream_context_create($options);
        $result = file_get_contents($api, false, $context);

        // Vérifier le résultat de la requête
        if ($result === FALSE) {
            // Gestion des erreurs
            echo "Une erreur s'est produite.";
        } else {
            // Traitement de la réponse de l'API
            $responseData = json_decode($result, true);
            // Répondre à la requête AJAX avec un objet JSON indiquant si l'opération a réussi ou non
            echo json_encode(['success' => isset($responseData['success']) && $responseData['success'] === true]);
        }
    }
}
