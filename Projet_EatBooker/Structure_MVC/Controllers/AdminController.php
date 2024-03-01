<?php

namespace App\Controllers;

use App\Core\Validator;

class AdminController extends Controller
{

    public function findAll()
    {
        // Appeler l'API pour récupérer les informations utilisateur
        $apiUrl = 'http://localhost:8888/Projet_EatBooker/Projet_EatBooker/Api_MVC/public/user';
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
        $apiUrl = 'http://localhost:8888/Projet_EatBooker/Projet_EatBooker/Api_MVC/public/user/delete/' . $id_user;
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
}
