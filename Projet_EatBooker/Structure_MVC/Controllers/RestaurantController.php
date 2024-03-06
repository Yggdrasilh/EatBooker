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
    }



    // trouver tous les restaurants
    public function findAllResto()
    {
        // Appeler l'API pour récupérer les informations restaurant
        $apiUrl = $this->baseUrlApi . '/restaurant';
        $apiData = file_get_contents($apiUrl);
        $restoData = json_decode($apiData, true);

        // var_dump($restoData);


        // renvoie sur la view homme/index

        return $restoData['restaurant'];
    }

    public function findRestoById($id)
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

        return $restaurantData['restaurant'];
    }
}
