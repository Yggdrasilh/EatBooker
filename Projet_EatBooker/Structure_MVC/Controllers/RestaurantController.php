<?php

namespace App\Controllers;

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
        // lecture API - restaurant

        $apiUrl = $this->baseUrlApi . '/Comments/find/' . $restoId;
        $apiData = file_get_contents($apiUrl);
        $commentsData = json_decode($apiData, true);


        $this->render('restaurant/find', ['restaurantData' => $restaurantData, 'commentsData' => $commentsData]);
    }

    public function addFavori($id)
    {
        $restoId = $id;
        $userid = $_SESSION['id_user'];

        $apiUrl = $this->baseUrlApi . '/favori/update/' . $restoId;

        // Envoyer les données à l'API pour mettre à jour le mot de passe
        $postData = array(

            'id_user' =>  $userid,

            'id_restaurant' => $restoId
        );

        $options = array(
            'http' => array(
                'method' => 'POST',
                'header' => ['Content-type: application/json'],
                'content' => json_encode($postData)
            )
        );

        $context = stream_context_create($options);
        $result = file_get_contents($apiUrl, true, $context);
        $convert = json_decode($result, true);
    }

    public function findRestaurant()
    {
        // renvoie sur la view restaurant/findRestaurant
        $this->render('restaurant/findRestaurant');
    }
}
