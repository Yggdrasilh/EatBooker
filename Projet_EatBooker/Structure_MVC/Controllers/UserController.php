<?php

namespace App\Controllers;

use App\Core\Validator;
use App\Controllers\Controller;
use PasswordHash;

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

    //                                      ***********************
    public function profil()
    {

        $this->render('user/profil');
    }

    //                                      ***********************
    // public function updateMdpProfil()
    // {


    //     // Récupérer les données du formulaire
    //     $oldPassword = $_POST['password_user'] ?? '';
    //     $newPassword = $_POST['new_password_user'] ?? '';
    //     $confirmNewPassword = $_POST['confirm_new_password_user'] ?? '';

    //     // Vérifier que les champs ne sont pas vides
    //     if (!empty($oldPassword) && !empty($newPassword) && !empty($confirmNewPassword)) {
    //         // Vérifier que le nouveau mot de passe correspond à la confirmation
    //         if ($newPassword === $confirmNewPassword) {
    //             // Hacher le nouveau mot de passe
    //             $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
    //             if (password_verify($oldPassword, $_SESSION['password_hash'])) {
    //                 // Hacher le nouveau mot de passe
    //                 $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    //                 // Mettre à jour le mot de passe haché en session
    //                 $_SESSION['password_hash'] = $hashedPassword;

    //                 // Construire l'URL de l'API avec l'identifiant de l'utilisateur
    //                 $apiUrl = 'http://localhost:8888/Api_MVC/public/user/update/' . $_SESSION['id_user'];

    //                 // Envoyer les données à l'API pour mettre à jour le mot de passe
    //                 $postData = array(
    //                     'id_user' => $_SESSION['id_user'],
    //                     'nom_user' => $_SESSION['nom_user'],
    //                     'prenom_user' => $_SESSION['prenom_user'],
    //                     'password_user' => $hashedPassword,
    //                     'role_user' => $_SESSION['role_user']
    //                 );

    //                 $options = array(
    //                     'http' => array(
    //                         'method' => 'POST',
    //                         'header' => 'Content-type: application/x-www-form-urlencoded',
    //                         'content' => http_build_query($postData)
    //                     )
    //                 );

    //                 $context = stream_context_create($options);
    //                 $result = file_get_contents($apiUrl, false, $context);

    //                 // Afficher un message de succès à l'utilisateur
    //                 echo "Mot de passe mis à jour avec succès !";
    //             } else {
    //                 // Afficher un message d'erreur si les mots de passe ne correspondent pas
    //                 echo "Les mots de passe ne correspondent pas.";
    //             }
    //         } else {
    //             // Afficher un message d'erreur si un champ est vide
    //             echo "Veuillez remplir tous les champs du formulaire.";
    //         }

    //         // Rendre la vue du formulaire
    //         $this->render('user/formMdp');
    //     }
    // }
}
