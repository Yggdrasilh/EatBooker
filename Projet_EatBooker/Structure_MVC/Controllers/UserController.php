<?php

namespace App\Controllers;

use App\Core\Validator;
use App\Controllers\Controller;

class UserController extends Controller
{

    public function login()
    {
        // Récupérer les données de mes champs de formulaire

        $userEmail = $_POST['email_user'] ?? '';
        $userPassword = $_POST['password_user'] ?? '';
        $valider = $_POST['valider'] ?? '';

        // Appeler l'API pour récupérer les informations utilisateur
        $apiUrl = 'http://localhost:8888/Api_MVC/public/user';
        $apiData = file_get_contents($apiUrl);
        $userData = json_decode($apiData, true);

        // Boucler pour pouvoir trouver les Email / passeword correspondant.    
        foreach ($userData['user'] as $user) {
            if ($user['email_user'] === $userEmail && password_verify($userPassword, $user['password_user'])) {

                // Stocker les informations dans $_SESSION
                $_SESSION['id_user'] = $user['id_user'];
                $_SESSION['prenom_user'] = $user['prenom_user'];
                $_SESSION['nom_user'] = $user['nom_user'];
                $_SESSION['email_user'] = $user['email_user'];
                $_SESSION['role_user'] = $user['role_user'];

                //    Envoyer l'utilisateur connecté vers la page d'accueil.
                header('location:http://localhost:8888/Projet_EatBooker/Projet_EatBooker/Structure_MVC/public/');
            }
        }
        if ($valider)
            // Si pas ok, message d'erreur.
            echo "Email ou mot de passe incorrect.";
        // Si pas bon : Afficher le formulaire de connexion
        $this->render('user/formConnexion');
    }

    //                                  ******************
    public function logout()
    {
        // detruire la session en cliquant sur le lien 
        session_destroy();
        header('location:index.php?controller=User&action=login');
        header('location:' . $this->baseUrlSite . '/' . 'index.php?controller=User&action=login');
    }
    //                                      ******************

    public function signin()
    {

        // Je verifie que les champs sont remplis


        // Je stocke les données 
        $nom = $_POST['nom_user'] ?? '';
        $prenom = $_POST['prenom_user'] ?? '';
        $email = $_POST['email_user'] ?? '';
        $mdp = $_POST['password_user'] ?? '';

        // Je protege mes données et hash le password.
        $userNom = $this->protected_values($nom);
        $userPrenom = $this->protected_values($prenom);
        $userEmail = $this->protected_values($email);
        $hashedPassword = password_hash($mdp, PASSWORD_DEFAULT);

        // Je reprends le modele de ma BDD
        $userData = [
            'nom_user' => $userNom,
            'prenom_user' => $userPrenom,
            'email_user' => $userEmail,
            'password_user' => $hashedPassword
        ];


        // Convertir les données en JSON
        $jsonData = json_encode($userData);
        // var_dump($userData);
        // URL de votre API
        $apiUrl = 'http://localhost:8888/Api_MVC/public/user/add';

        // Configuration de la requête HTTP
        $options = [
            'http' => [
                'header'  => 'Content-Type: application/json',
                'method'  => 'POST',
                'content' => $jsonData
            ]
        ];


        $context  = stream_context_create($options);
        $result = file_get_contents($apiUrl, false, $context);

        // Vérifier le résultat de la requête
        if ($result === FALSE) {
            // Gestion des erreurs
            echo "Une erreur s'est produite lors de l'envoi des données à l'API.";
        } else {
            // Traitement de la réponse de l'API
            $responseData = json_decode($result, true);
            echo "L'utilisateur a bien été ajouté";
            if (isset($responseData['success']) && $responseData['success'] === true) {
                echo "L'utilisateur a été ajouté avec succès.";
            }
        }



        $this->render('user/formConnexion');
    }
}
//                                      ***********************