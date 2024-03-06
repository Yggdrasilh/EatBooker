<?php


namespace App\Controllers;

use App\Controllers\RestaurantController;

class NoteController extends Controller
{
    public function addNote($id)
    {
        // J'instancie la class pour profiter de la methode find et recuperer l'id
        $RestaurantController = new RestaurantController();
        // Récupération de l'identifiant du restaurant
        $idResto = $RestaurantController->find($id);

        // Récupération de l'identifiant de l'utilisateur à partir de la session
        $idUser = $_SESSION['id_user'];
        // var_dump($idResto);
        // var_dump($_POST['submit']);
        // var_dump($_POST['rating']);

        // Recuperation de la note grace a l'input caché. 
        if (isset($_POST['rating'])) {


            // Filtrage et validation de la note
            $rating = filter_var($_POST['rating'], FILTER_VALIDATE_INT);

            if ($idUser !== null && $rating !== false && $rating >= 1 && $rating <= 5) {
                // Création des données à envoyer à l'API
                $data = array(

                    'note_note' => $rating,
                    'id_user' => $idUser,
                    'id_restaurant' => $idResto['restaurant']['id_restaurant'],
                );
                // var_dump($data);
                // die;
                // Configuration de la requête HTTP
                $options = array(
                    'http' => array(
                        'header'  => "Content-Type: application/json",
                        'method'  => 'POST',
                        'content' => json_encode($data),
                    ),
                );


                $context  = stream_context_create($options);

                $api_url = $this->baseUrlApi . '/note/add';
                $result = file_get_contents($api_url, false, $context);
                // var_dump($result);
                // die;
                if ($result === false) {
                    // Erreur lors de l'envoi de la requête
                    http_response_code(500);
                    echo 'Erreur lors de l enregistrement de la note';
                } else {
                    // La requête a été envoyée avec succès
                    echo 'Note enregistrée avec succès';
                }
            } else {
                // Données d'entrée invalides
                http_response_code(400);
                echo 'Données d entrée invalides';
            }
        } else {
            // Données d'entrée manquantes
            http_response_code(400);
            echo 'Données d entrée manquantes';
        }


        header('location:' . $this->baseUrlSite . 'index.php?controller=restaurant&action=find&id=' . $idResto['restaurant']['id_restaurant']);
    }
}
