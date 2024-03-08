<?php

namespace App\Controllers;




class CommentsController extends Controller
{

    public function addComments($id)
    {
        // Vérifier si l'utilisateur est connecté
        if (!isset($_SESSION['id_user'])) {
            echo "Veuillez vous connecter pour ajouter un commentaire.";
            return;
        }

        // Récupérer l'identifiant du restaurant
        $restoId = $id;
        // var_dump($restoId);
        // Récupérer les données du formulaire et les nettoyer
        $titreComm = isset($_POST['titre']) ? $this->protected_values($_POST['titre']) : '';
        $comComm = isset($_POST['commentaire']) ? $this->protected_values($_POST['commentaire']) : '';

        // Récupérer l'identifiant de l'utilisateur depuis la session
        $idUser = $_SESSION['id_user'];



        // Données du commentaire à insérer
        $commentsData = [
            'id_comments' => '',
            'titre_comments' => $titreComm,
            'corps_comments' => $comComm,
            'reporting_comments' => '0',
            'id_user' => $idUser,
            'id_restaurant' => $restoId,
        ];
        // var_dump($commentsData);
        // Convertir les données en format JSON
        $jsonData = json_encode($commentsData);

        // URL de votre API pour l'ajout de commentaires
        $apiUrl = $this->baseUrlApi . '/Comments/add';

        // Configuration de la requête HTTP
        $options = [
            'http' => [
                'header'  => 'Content-Type: application/json',
                'method'  => 'POST',
                'content' => $jsonData
            ]
        ];

        // Envoi de la requête à l'API pour ajouter le commentaire
        $context  = stream_context_create($options);
        $result = file_get_contents($apiUrl, false, $context);

        if ($result === FALSE) {
            // Gestion des erreurs
            echo "Une erreur s'est produite lors de l'envoi des données à l'API.";
        } else {
            // Traitement de la réponse de l'API
            $responseData = json_decode($result, true);
            echo "Le commentaire a bien été ajouté";
            if (isset($responseData['success']) && $responseData['success'] === true) {
                echo "Le commentaire a été ajouté avec succès.";
            }
        }
    }


    public function findAllComm()
    {
        // URL de l'API pour récupérer tous les commentaires
        $apiUrl = $this->baseUrlApi . '/Comments';

        // Envoi de la requête à l'API pour récupérer tous les commentaires
        $result = file_get_contents($apiUrl);

        // Vérification du résultat de la requête
        if ($result === FALSE) {
            // Gestion des erreurs
            return [];
        } else {

            $responseData = json_decode($result, true);
            if (isset($responseData['comments'])) {

                $adminController = new UserController();
                foreach ($responseData['comments'] as &$comment) {
                    if (isset($comment['id_user']))
                    //     var_dump($comment['id_user']);
                    // die; 
                    {
                        $userInfo = $adminController->getUserInfo($comment['id_user']);
                        $comment['prenom_user'] = $userInfo['prenom_user'];
                    }
                }

                return $responseData['comments'];
            } else {
                return []; // Retourner une liste vide si aucune donnée de commentaire n'est trouvée
            }
        }
    }

    public function FindByID($id)
    {
        // Récupérer tous les commentaires
        $allComments = $this->findAllComm();

        // Filtrer les commentaires pour ne conserver que ceux associés au restaurant avec l'ID spécifié
        $comments = array_filter($allComments, function ($comment) use ($id) {
            return $comment['id_restaurant'] == $id;
        });

        // Retourner les commentaires filtrés
        return $comments;
    }
}
