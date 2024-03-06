<?php

namespace App\Controllers;


use App\Core\Validator;
use App\Controllers\Controller;


class FavoriController extends Controller
{
    // Ajouter un restaurant aux favoris de l'utilisateur
    public function addFavori()
    {
        // Récupérer les données envoyées par la requête AJAX
        $inputJson = file_get_contents('php://input');
        $inputData = json_decode($inputJson, true);
        // var_dump($inputData);
        // die;
        $userId = $inputData['id_user'];
        $restaurantId = $inputData['id_restaurant'];
        // var_dump($userId, $restaurantId);

        // Appeler l'API pour ajouter le restaurant aux favoris de l'utilisateur
        $api = $this->baseUrlApi . '/favori/add';

        $data = json_encode(['id_user' => $userId, 'id_restaurant' => $restaurantId]);

        $ch = curl_init($api);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data)
            )
        );

        $result = curl_exec($ch);

        // Vérifier le résultat de la requête
        if ($result === FALSE) {
            // Gestion des erreurs
            echo "Une erreur s'est produite.";
        } else {
            // Traitement de la réponse de l'API
            $responseData = json_decode($result, true);
            // var_dump($responseData);
            // die;
            // Répondre à la requête AJAX avec un objet JSON indiquant si l'opération a réussi ou non
            echo json_encode(['success' => isset($responseData['success']) && $responseData['success'] === true]);
        }

        curl_close($ch);
    }



    public function findFavoris()
    {



        // URL de l'API pour récupérer tous les favoris lié à l'user
        $apiUrl = $this->baseUrlApi . '/favori';
        // var_dump($apiUrl);
        // die;

        // Envoi de la requête à l'API pour récupérer tous les favoris
        $result  = file_get_contents($apiUrl);
        // var_dump($result);
        // die;

        // Vérification du résultat de la requête
        if ($result === FALSE) {
            // Gestion des erreurs
            return [];
        } else {

            $responseData = json_decode($result, true);
            // var_dump($responseData);
            // die;

            if (isset($responseData['favori'])) {
                // var_dump($responseData['favori']);
                // die;

                $restoController = new RestaurantController();

                // var_dump($userId);
                // die;
                if (!isset($_SESSION['id_user'])) {
                    // Redirigez l'utilisateur vers la page de connexion s'il n'est pas connecté
                    header('Location: index.php?controller=User&action=login');
                    exit();
                }
                // recuperer l'id user stocké en session
                $userId = $_SESSION['id_user'];

                $restoFavoris = []; // Initialisez un tableau vide pour stocker les favoris

                foreach ($responseData['favori'] as $favori) {
                    if ($favori['id_user'] === $userId && isset($favori['id_restaurant'])) {
                        $restoInfo = $restoController->findRestoById($favori['id_restaurant']);
                        $favori['nom_restaurant'] = $restoInfo['nom_restaurant'];
                        $favori['type_restaurant'] = $restoInfo['type_restaurant'];
                        $favori['ville_restaurant'] = $restoInfo['ville_restaurant'];
                        $favori['note_moyenne_restaurant'] = $restoInfo['note_moyenne_restaurant'];



                        $restoFavoris[] = $favori; // Ajoutez le favori au tableau
                    }
                }
                // var_dump($restoFavoris);
                // die;
                // Retournez la vue avec le tableau de favoris
                return $this->render('user/favori', ['restoFavoris' => $restoFavoris]);
            } else {
                return []; // Retourner une liste vide si aucun favori n'est trouvé
            }
        }
    }



    // // trouver les restaurant en fonction id user
    // public function FindByID()
    // {

    //     $userId = $_SESSION['id_user'];
    //     // Récupérer tous les favoris
    //     $allFavoris = $this->findFavoris();
    //     // var_dump($allFavoris);
    //     // die;
    //     // Filtrer les favoris pour ne conserver que ceux associés à l'user avec l'ID spécifié
    //     $favori = array_filter($allFavoris, function ($favori) use ($userId) {
    //         return $favori['id_user'] == $userId;
    //     });
    //     // var_dump($favori);
    //     // die;
    //     // Retourner les favoris filtrés
    //     return $restaurantData['restaurant'];
    // }
}
