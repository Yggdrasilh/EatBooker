<?php

namespace App\Controllers;

use App\Core\Validator;

class UserController extends Controller
{

    public function login()
    {
        // Récupérer les données de mes champs de formulaire

        $userEmail = $_POST['email_user'] ?? '';
        $userPassword = $_POST['password_user'] ?? '';

        // Appeler l'API pour récupérer les informations utilisateur
        $apiUrl = 'http://localhost:8888/Projet_EatBooker/Projet_EatBooker/Api_MVC/public/user';
        $apiData = file_get_contents($apiUrl);
        $userData = json_decode($apiData, true);

        // Boucler pour pouvoir trouver les Email / passeword correspondant.    
        foreach ($userData['user'] as $user) {
            if ($user['email_user'] === $userEmail && $user['password_user'] === $userPassword) {

                // Stocker les informations dans $_SESSION
                $_SESSION['id_user'] = $user['id_user'];
                $_SESSION['prenom_user'] = $user['prenom_user'];
                $_SESSION['nom_user'] = $user['nom_user'];
                $_SESSION['email_user'] = $user['email_user'];
                $_SESSION['role_user'] = $user['role_user'];

                //    Envoyer l'utilisateur connecté vers la page d'accueil.
                header('location:http://localhost:8888/Projet_EatBooker_appli/Projet_EatBooker/Structure_MVC/public/');
            }
        }
        // echo '<pre>';
        // var_dump($userData);
        // echo '</pre>';
        // var_dump($userEmail);
        // var_dump($userPassword);
        // Si pas ok, message d'erreur.
        echo "Email ou mot de passe incorrect.";
        // Si pas bon : Afficher le formulaire de connexion
        $this->render('user/formConnexion');
    }
    public function logout()
    {
        session_destroy();
        header('location:index.php?controller=User&action=login');
    }
}
