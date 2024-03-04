<?php

namespace App\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        // Appeler l'API pour récupérer les informations restaurant
        $apiUrl = $this->baseUrlApi . '/restaurant';
        $apiData = file_get_contents($apiUrl);
        $restoData = json_decode($apiData, true);

        // var_dump($restoData);


        // renvoie sur la view homme/index

        $this->render('home/index', ['restoData' => $restoData]);
    }

    public function test()
    {
        $this->render('home/index');
    }
}
