<?php

namespace App\Controllers;


use App\Core\Validator;
use App\Controllers\Controller;

class FavoriController extends Controller
{

    public function findFavoris($id)
    {

        // recuperer l'id user stocké en session
        $userId = $_SESSION['id_user'];
        $restoId = $id;

        $apiUrl = $this->baseUrlApi . '/favori';
        // var_dump($apiUrl);
        // die;
        $apiData = file_get_contents($apiUrl);
        // var_dump($apiData);
        // die;
        $favoriData = json_decode($apiData, true);
        // var_dump($favoriData);
        // die;


        // récupération commentaires

        // $apiUrl = $this->baseUrlApi . '/Comments/find/' . $userId;
        // $apiData = file_get_contents($apiUrl);
        // $commentsData = json_decode($apiData, true);

        $this->render('user/favori', ['favoriData' => $favoriData]);
    }
}
