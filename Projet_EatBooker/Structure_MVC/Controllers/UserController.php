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


        $apiUrl = $this->baseUrlApi . '/user';

        $apiData = file_get_contents($apiUrl);
        $userData = json_decode($apiData, true);

        // Boucler pour pouvoir trouver les Email / passeword correspondant.    
        foreach ($userData['user'] as $user) {
            if ($user['email_user'] === $userEmail && password_verify($userPassword, $user['password_user'])) {

                // Stocker les informations dans $_SESSION
                $_SESSION['id_user'] = $user['id_user'];
                $_SESSION['prenom_user'] = $user['prenom_user'];
                $_SESSION['nom_user'] = $user['nom_user'];
                $_SESSION['password_user'] = $user['password_user'];
                $_SESSION['email_user'] = $user['email_user'];
                $_SESSION['role_user'] = $user['role_user'];
                // var_dump($_SESSION);
                //    Envoyer l'utilisateur connecté vers la page d'accueil.

                header('location:' . $this->baseUrlSite . '');
            }
        }
        if ($valider)
            // Si pas ok, message d'erreur.
            echo "Email ou mot de passe incorrect.";
        // Si pas bon : Afficher le formulaire de connexion
        $this->render('user/formConnexion');
    }

    //                                       ******************

    public function logout()
    {
        // detruire la session en cliquant sur le lien 
        session_destroy();

        header('location:' . $this->baseUrlSite . '/index.php?controller=User&action=login');
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
        $apiUrl = $this->baseUrlApi . '/user/add';

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

    public function updateMdpProfil()
    {
        // Récupérer les données du formulaire
        $newPassword = $_POST['new_password_user'] ?? '';
        $confirmNewPassword = $_POST['confim_new_password_user'] ?? '';
        $oldPassword = $_POST['password_user'] ?? '';

        if (Validator::validPostGlobal()) {
            // if (!empty($newPassword) && !empty($confirmNewPassword) && !empty($oldPassword)) {

            if ($newPassword === $confirmNewPassword) {

                $hashedPassword = $_SESSION['password_user'] ?? '';


                if (password_verify($oldPassword, $_SESSION['password_user'])) {

                    $newHashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

                    $_SESSION['password_user'] = $newHashedPassword;

                    $apiUrl = $this->baseUrlApi . '/user/update/' . $_SESSION['id_user'];

                    // Envoyer les données à l'API pour mettre à jour le mot de passe
                    $postData = array(
                        'id_user' => $_SESSION['id_user'],
                        'nom_user' => $_SESSION['nom_user'],
                        'prenom_user' => $_SESSION['prenom_user'],
                        'email_user' => $_SESSION['email_user'],
                        'password_user' => $newHashedPassword,
                        'role_user' => $_SESSION['role_user']
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

                    // Vérifier si la mise à jour a réussi
                    if ($convert['status']) {
                        // Afficher un message de succès à l'utilisateur
                        echo "Mot de passe mis à jour avec succès !";
                    } else {
                        // Afficher un message d'erreur
                        echo "Une erreur s'est produite lors de la mise à jour du mot de passe.";
                    }
                } else {
                    // Afficher un message d'erreur si les mots de passe ne correspondent pas
                    echo "L'ancien mot de passe est incorrect.";
                }
            } else {
                // Afficher un message d'erreur si les nouveaux mots de passe ne correspondent pas
                echo "Les nouveaux mots de passe ne correspondent pas.";
            }
        }

        // Définir les variables à envoyer à la vue
        $data = array(
            'newPassword' => $newPassword,
            'confirmNewPassword' => $confirmNewPassword,
            'oldPassword' => $oldPassword,
            'hashedPassword' => $hashedPassword ?? ''
        );

        // Rendre la vue du formulaire en passant les données
        $this->render('user/formMdp', $data);
    }

    public function updateProfil()
    {
        if (isset($_POST['update'])) {
            $newNomUser = $_POST['nom_user'] ?? '';
            $newPrenomUser = $_POST['prenom_user'] ?? '';
            $newEmailUser = $_POST['email_user'] ?? '';



            $apiUrl = $this->baseUrlApi . '/user/update/' . $_SESSION['id_user'];

            $postData = array(
                'id_user' => $_SESSION['id_user'],
                'nom_user' => $newNomUser,
                'prenom_user' => $newPrenomUser,
                'email_user' => $newEmailUser,
                'password_user' => $_SESSION['password_user'], // Note: vous envoyez toujours le mot de passe actuel, à modifier selon vos besoins
                'role_user' => $_SESSION['role_user']
            );

            $options = array(
                'http' => array(
                    'method' => 'POST',
                    'header' => 'Content-type: application/json',
                    'content' => json_encode($postData)
                )
            );

            $context = stream_context_create($options);
            $result = file_get_contents($apiUrl, false, $context);

            if ($result !== false) {
                $responseData = json_decode($result, true);
                if ($responseData['status']) {
                    echo "Les données ont été mises à jour !";
                    // Mettre à jour les données dans $_SESSION
                    $_SESSION['nom_user'] = $newNomUser;
                    $_SESSION['prenom_user'] = $newPrenomUser;
                    $_SESSION['email_user'] = $newEmailUser;
                } else {
                    echo "Une erreur s'est produite lors de la mise à jour du profil.";
                }
            } else {
                echo "Une erreur s'est produite lors de l'envoi des données au serveur.";
            }
        }

        $this->render('user/formProfil');
    }


    //                                  ********************
    // Recuperation des users : 

    public function getUserInfo($userId)
    {
        // URL de l'API pour récupérer les informations sur l'utilisateur
        $apiUrl = $this->baseUrlApi . '/user/find/' . $userId;

        // Envoi de la requête à l'API pour récupérer les informations sur l'utilisateur
        $result = file_get_contents($apiUrl);

        // Vérification du résultat de la requête
        if ($result === FALSE) {
            // Gestion des erreurs
            return []; // Retourner une liste vide en cas d'erreur
        } else {
            // Traitement de la réponse de l'API
            $responseData = json_decode($result, true);
            if (isset($responseData['user'])) {
                return $responseData['user'];
                var_dump($responseData['user']);
            } else {
                return []; // Retourner une liste vide si aucune donnée d'utilisateur n'est trouvée
            }
        }
    }
}
