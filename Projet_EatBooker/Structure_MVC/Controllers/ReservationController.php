<?php


namespace App\Controllers;


use App\Controllers\RestaurantController;


class ReservationController extends Controller

{
    public function askResa($id)
    {

        $restaurantController = new RestaurantController;


        $planningData = $restaurantController->findPlanning($id);
        // var_dump($planningData);
        $this->render('reservation/askResa', ['planningData' => $planningData]);
    }

    public function traitementAskResa()
    {

        $jourResa = $_POST['jour_reservation'] ?? '';
        $heureResa = $_POST['heure_reservation'] ?? '';
        $nbCouvertResa = intval($_POST['nb_couvert_reservation'] ?? '');
        $nomResa = $_POST['nom_reservation'] ?? '';
        $prenomResa = $_POST['prenom_reservation'] ?? '';
        $emailResa = $_POST['email_reservation'] ?? '';
        $idresto = $_POST['id_restaurant'] ?? '';
        $iduser = $_POST['id_user'] ?? '';


        // var_dump($_POST);
        // die;

        $ReservationData = [
            'http' => [
                'header' => 'Content-Type: application/json',
                'method' => 'POST',
                'content' => json_encode([

                    'date_reservation' => $jourResa,
                    'heure_reservation' => $heureResa,
                    'nb_couvert_reservation' => $nbCouvertResa,
                    'statut_reservation' => 'En Attente',
                    'id_restaurant' => $idresto,
                    'id_user' => $iduser,
                ])
            ]
        ];

        // $jsonData = json_encode($ReservationData);
        $context = stream_context_create($ReservationData);


        // Envoi de la requete 
        $apiUrl = $this->baseUrlApi . '/reservation/add';




        $result = file_get_contents($apiUrl, false, $context);
        // var_dump($jsonData);
        if ($result === FALSE) {
            echo "une erreur s'est produite lors de l'envoie des données a l'API";
        } else {
            // Traitement de la réponse de l'API
            $responseData = json_decode($result, true);
?> <script>
                if (alert("Reservation envoyé avec succès")) {

                    <?php
                    header('location:' . $this->baseUrlSite); ?>
                }
            </script><?php

                        if (isset($responseData['success']) && $responseData['success'] === true) {
                            echo "La demande de reservation a été envoyé avec succès.";
                        }
                    }
                }
            }
