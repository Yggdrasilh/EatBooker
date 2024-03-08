<?php

namespace App\Controllers;


use App\Core\Validator;

use App\Controllers\CommentsController;



class RestaurantController extends Controller
{
    public function findPlanning($idresto)
    {
        // Appeler l'API pour récupérer les informations restaurant
        $apiUrl = $this->baseUrlApi . '/planning/find/' . $idresto;
        $apiData = file_get_contents($apiUrl);
        $planningData = json_decode($apiData, true);
        // return $planningData;
        // var_dump($planningData);
        // die;

        // renvoie sur la view homme/index
        // $this->render('restaurant/formPlanning', ['planningData' => $planningData]);
        return [
            'planning' => $planningData
        ];
    }


    public function gestionRestaurantAdmin()
    {
        // Consulter les restaurant et trier entre les valider et ceux qui ont besoin d'être valider
        $apiUrl = $this->baseUrlApi . '/restaurant';
        $apiData = file_get_contents($apiUrl);
        $restaurantData = json_decode($apiData, true);

        //préparation des variables pour séparer les restaurants valider de ceux en Cours de validation
        $restaurantAValider = [];
        $restaurantValid = [];

        foreach ($restaurantData['restaurant'] as $resto) {
            if ($resto['statut_restaurant'] == 'Valider') {

                //Génération du tableau des resto déjà valider
                $item = [
                    'id_restaurant' =>  $resto['id_restaurant'],
                    'nom_restaurant' =>  $resto['nom_restaurant'],
                    'email_restaurant' =>  $resto['email_restaurant'],
                    'password_restaurant' =>  $resto['password_restaurant'],
                    'adresse_restaurant' =>  $resto['adresse_restaurant'],
                    'cp_restaurant' =>  $resto['cp_restaurant'],
                    'ville_restaurant' =>  $resto['ville_restaurant'],
                    'description_restaurant' =>  $resto['description_restaurant'],
                    'place_max_restaurant' =>  $resto['place_max_restaurant'],
                    'prix_restaurant' =>  $resto['prix_restaurant'],
                    'menu_restaurant' =>  $resto['menu_restaurant'],
                    'type_restaurant' =>  $resto['type_restaurant'],
                    'note_moyenne_restaurant' =>  $resto['note_moyenne_restaurant'],
                    'statut_restaurant' => $resto['statut_restaurant'],
                    'id_planning' =>  $resto['id_planning']
                ];
                $restaurantValid[] = $item;
                // array_push($restaurantValid, $item);
            } elseif ($resto['statut_restaurant'] == 'En attente') {

                //Génération du  tableau des resto en attente de validation
                $enCours = [
                    'id_restaurant' =>  $resto['id_restaurant'],
                    'nom_restaurant' =>  $resto['nom_restaurant'],
                    'email_restaurant' =>  $resto['email_restaurant'],
                    'password_restaurant' =>  $resto['password_restaurant'],
                    'adresse_restaurant' =>  $resto['adresse_restaurant'],
                    'cp_restaurant' =>  $resto['cp_restaurant'],
                    'ville_restaurant' =>  $resto['ville_restaurant'],
                    'description_restaurant' =>  $resto['description_restaurant'],
                    'place_max_restaurant' =>  $resto['place_max_restaurant'],
                    'prix_restaurant' =>  $resto['prix_restaurant'],
                    'menu_restaurant' =>  $resto['menu_restaurant'],
                    'type_restaurant' =>  $resto['type_restaurant'],
                    'note_moyenne_restaurant' =>  $resto['note_moyenne_restaurant'],
                    'statut_restaurant' => $resto['statut_restaurant'],
                    'id_planning' =>  $resto['id_planning']
                ];
                $restaurantAValider[] = $enCours;
                // array_push($restaurantAValider, $enCours);
            }
        }

        $this->render('admin/gestionRestaurant', ['restoValid' => $restaurantValid, 'restoAValider' => $restaurantAValider]);
    }

    public function inscriptionRestaurant()
    {
        if (empty($_POST)) {
            $this->render('restaurant/inscription', ['erreur' => false]);
        } else {

            if (Validator::validPostGlobal()) {
                //Création du body et récupération de toute les data a envoyer dans la requête
                $tableau = [
                    'http' => [
                        'method' => "POST",
                        'header' => ["Content-type: application/json"],
                        'content' => json_encode([
                            'nom_restaurant' => $_POST['inputeNom'],
                            'email_restaurant' => $_POST['inputeEmail'],
                            'password_restaurant' => $_POST['inputePassword'],
                            'adresse_restaurant' => $_POST['inputeAdresse'],
                            'cp_restaurant' => $_POST['inputeCp'],
                            'ville_restaurant' => $_POST['inputeVille'],
                            'description_restaurant' => $_POST['inputeDescription'],
                            'place_max_restaurant' => $_POST['inputeNbCouvertMax'],
                            'prix_restaurant' => $_POST['inputePrixMoyen'],
                            'menu_restaurant' => $_POST['inputeMenu'],
                            'type_restaurant' => $_POST['inputeTypeCuisine'],
                        ]),
                    ]
                ];

                $tab = stream_context_create($tableau);

                //envoie de la requête
                $data = file_get_contents($this->baseUrlApi . '/restaurant/add', false, $tab);
                $convert = json_decode($data, true);
                // var_dump($tableau);
                // var_dump($data);
                // var_dump($convert);
                //Gestion des erreurs
                if ($convert['status']) {
                    header("Location:" . $this->baseUrlSite);
                } else {
                    $this->render('user/formConnexion', ['erreur' => true]);
                }
            } else {
                $this->render('user/formConnexion', ['erreur' => true]);
            }
        }
    }


    public function planningRestaurant()
    {
        // $planningData = $this->findPlanning($idresto);

        $idresto = $_SESSION['id_restaurant'];
        // // var_dump($this->baseUrlApi . '/restaurant/update/' . $idresto);
        if (empty($_POST)) {
            $this->render('restaurant/formPlanning', ['erreur' => false]);
        } else {

            ////////////////////////////////////////////////////////////////////////////////////////////////////
            // Mise a jour  de la clé de l'id_planning dans la table restaurant


            // var_dump($_SESSION['id_restaurant']);
            // die;
            $dataResto = file_get_contents($this->baseUrlApi . '/restaurant/find/' . $idresto);
            $resto = json_decode($dataResto, true);


            $tableauResto = [
                'http' => [
                    'method' => "POST",
                    'header' => ["Content-type: application/json"],
                    'content' => json_encode([
                        'nom_restaurant' => $resto['restaurant']['nom_restaurant'],
                        'email_restaurant' => $resto['restaurant']['email_restaurant'],
                        'password_restaurant' => $resto['restaurant']['password_restaurant'],
                        'adresse_restaurant' => $resto['restaurant']['adresse_restaurant'],
                        'cp_restaurant' => $resto['restaurant']['cp_restaurant'],
                        'ville_restaurant' => $resto['restaurant']['ville_restaurant'],
                        'description_restaurant' => $resto['restaurant']['description_restaurant'],
                        'place_max_restaurant' => $resto['restaurant']['place_max_restaurant'],
                        'prix_restaurant' => $resto['restaurant']['prix_restaurant'],
                        'menu_restaurant' => $resto['restaurant']['menu_restaurant'],
                        'type_restaurant' => $resto['restaurant']['type_restaurant'],
                        'note_moyenne_restaurant' => $resto['restaurant']['note_moyenne_restaurant'],
                        'statut_restaurant' => $resto['restaurant']['statut_restaurant'],
                        'id_planning' => $resto['restaurant']['id_restaurant'],
                    ]),
                ]
            ];

            $tabResto = stream_context_create($tableauResto);

            //envoie de la requête
            $dataResultResto = file_get_contents($this->baseUrlApi . '/restaurant/update/' . $idresto, false, $tabResto); // remplacer 28 par  l'id du restaurant connecté => $_SESSION['?']
            $convertResultResto = json_decode($dataResultResto, true);

            ////////////////////////////////////////////////////////////////////////////////////////////////////////////
            if ($convertResultResto['status']) {
                // var_dump($convertResultResto);
                // die;
                //eviter les valeur null et attribuer les false au champs non cocher
                $post = [
                    'checkLundiAm' => false,
                    'checkLundiPm' => false,
                    'checkMardiAm' => false,
                    'checkMardiPm' => false,
                    'checkMercrediAm' => false,
                    'checkMercrediPm' => false,
                    'checkJeudiAm' => false,
                    'checkJeudiPm' => false,
                    'checkVendrediAm' => false,
                    'checkVendrediPm' => false,
                    'checkSamediAm' => false,
                    'checkSamediPm' => false,
                    'checkDimancheAm' => false,
                    'checkDimanchePm' => false,
                ];
                foreach ($_POST as $key => $value) {
                    if (!empty($value) && isset($value)) {
                        $post[$key] = true;
                    }
                }
                // var_dump($post);
                // die;
                //Création du body et récupération de toute les data a envoyer dans la requête
                $tableau = [
                    'http' => [
                        'method' => "POST",
                        'header' => ["Content-type: application/json"],
                        'content' => json_encode([
                            'id_planning' => $idresto, // l'id du resto puisque il ya un planning par resto  =>  $_SESSION['idResto ?']
                            'lundi_am' => $post['checkLundiAm'],
                            'lundi_pm' => $post['checkLundiPm'],
                            'mardi_am' => $post['checkMardiAm'],
                            'mardi_pm' => $post['checkMardiPm'],
                            'mercredi_am' => $post['checkMercrediAm'],
                            'mercredi_pm' => $post['checkMercrediPm'],
                            'jeudi_am' => $post['checkJeudiAm'],
                            'jeudi_pm' => $post['checkJeudiPm'],
                            'vendredi_am' => $post['checkVendrediAm'],
                            'vendredi_pm' => $post['checkVendrediPm'],
                            'samedi_am' => $post['checkSamediAm'],
                            'samedi_pm' => $post['checkSamediPm'],
                            'dimanche_am' => $post['checkDimancheAm'],
                            'dimanche_pm' => $post['checkDimanchePm'],
                            'id_restaurant' => $idresto, //definir le nom de la session pour l'id des restaurant  => $_SESSION['?']
                        ]),
                    ]
                ];
                $tab = stream_context_create($tableau);
                // var_dump($tableau);
                // die;
                //envoie de la requête
                $data = file_get_contents($this->baseUrlApi . '/planning/add', false, $tab);
                $convert = json_decode($data, true);
                // var_dump($data);
                // die;
                //Gestion des erreurs
                if ($convert['status']) {
                    header("Location:" . $this->baseUrlSite . "/");
                } else {
                    $this->render('restaurant/formPlanning', ['erreur' => true]);
                }
            } else {
                $this->render('restaurant/formPlanning', ['erreur' => true]);
            }
        }
    }

    public function find($id)
    {
        // recuperer l'id restaurant récupérer en GET
        $restoId = $id;
        // var_dump($restoId);
        // die;

        $apiUrl = $this->baseUrlApi . '/restaurant/find/' . $restoId;
        // var_dump($apiUrl);
        // die;
        $apiData = file_get_contents($apiUrl);
        // var_dump($apiData);
        // die;
        $restaurantData = json_decode($apiData, true);
        // var_dump($restaurantData);
        // die;


        // récupération commentaires

        $apiUrl = $this->baseUrlApi . '/Comments/find/' . $restoId;
        $apiData = file_get_contents($apiUrl);
        $commentsData = json_decode($apiData, true);
        (new CommentsController())->FindByID($id);
        // (new AdminController())->findAll();


        $this->render('restaurant/find', ['restaurantData' => $restaurantData, 'commentsData' => (new CommentsController())->FindByID($id)]);
        return $restaurantData;
    }



    // trouver tous les restaurants
    public function findAllResto()
    {
        // Appeler l'API pour récupérer les informations restaurant
        $apiUrl = $this->baseUrlApi . '/restaurant';
        $apiData = file_get_contents($apiUrl);
        $restoData = json_decode($apiData, true);

        // var_dump($restoData);


        // renvoie sur la view homme/index

        return $restoData['restaurant'];
    }

    public function findRestoById($id)
    {
        // recuperer l'id restaurant récupérer en GET
        $restoId = $id;
        // var_dump($restoId);
        // die;

        $apiUrl = $this->baseUrlApi . '/restaurant/find/' . $restoId;
        // var_dump($apiUrl);
        // die;
        $apiData = file_get_contents($apiUrl);
        // var_dump($apiData);
        // die;
        $restaurantData = json_decode($apiData, true);
        // var_dump($restaurantData);
        // die;

        return $restaurantData['restaurant'];
    }

    public function login()
    {
        $emailResto = $_POST['email_resto'] ?? '';
        $passwordResto = $_POST['password_resto'] ?? '';
        $valider = $_POST['valider'] ?? '';

        $apiUrl = $this->baseUrlApi . '/restaurant';

        // var_dump($emailResto);
        // var_dump($passwordResto);

        $apiData = file_get_contents($apiUrl);
        $restoData = json_decode($apiData, true);

        // Boucler pour pouvoir trouver les Email / passeword correspondant.    
        foreach ($restoData['restaurant'] as $resto) {
            if ($resto['email_restaurant'] === $emailResto && $resto['password_restaurant'] === $passwordResto) {
                // var_dump($resto['id_restaurant']);
                // die;
                // Stocker les informations dans $_SESSION
                $_SESSION['id_restaurant'] = $resto['id_restaurant'];
                $_SESSION['nom_restaurant'] = $resto['nom_restaurant'];
                $_SESSION['email_restaurant'] = $resto['email_restaurant'];
                $_SESSION['adresse_restaurant'] = $resto['adresse_restaurant'];
                $_SESSION['cp_restaurant'] = $resto['cp_restaurant'];
                $_SESSION['ville_restaurant'] = $resto['ville_restaurant'];
                $_SESSION['description_restaurant'] = $resto['description_restaurant'];
                $_SESSION['place_max_restaurant'] = $resto['place_max_restaurant'];
                $_SESSION['prix_restaurant'] = $resto['prix_restaurant'];
                $_SESSION['type_restaurant'] = $resto['type_restaurant'];
                $_SESSION['id_planning'] = $resto['id_planning'];
                $_SESSION['role_user'] = 'restaurant';
                // var_dump($_SESSION);
                // die;
                //    Envoyer l'utilisateur connecté vers la page d'accueil.


                header('location:index.php?controller=Restaurant&action=askResaAConfirm');
            }
        }
        if ($valider)
            // Si pas ok, message d'erreur.
            echo "Email ou mot de passe incorrect.";
        // Si pas bon : Afficher le formulaire de connexion
        $this->render('user/formConnexion');
    }
    public function logOut()
    {
        session_destroy();

        header('location:' . $this->baseUrlSite . 'index.php?controller=User&action=login');
    }


    public function askResaAConfirm()
    {
        // Appel de L'api pour recuperer les resa a confirmer.
        $apiUrl = $this->baseUrlApi . '/reservation';

        $result = file_get_contents($apiUrl);
        $responseData = json_decode($result, true);

        if ($responseData) {
            $reservations = [];

            // Filtrer les réservations en fonction de l'ID du restaurant stocké dans $_SESSION
            foreach ($responseData['reservation'] as $reservation) {
                if ($reservation['id_restaurant'] == $_SESSION['id_restaurant']) {
                    $reservations[] = $reservation;
                }
            }

            // Passer les réservations filtrées à la vue
            $this->render('restaurant/askResaAConfirm', ['reservations' => $reservations]);
        } else {
            // Gérer le cas où aucune réservation n'est retournée
            echo "Aucune réservation trouvée pour votre restaurant.";
        }
    }
    public function UpdateStatutResa($id)
    {
        $apiUrl = $this->baseUrlApi . '/reservation/find/' . $id;
        $apiUpdateUrl = $this->baseUrlApi . '/reservation/update/' . $id; // URL pour la requête PATCH

        // Récupérer les données de la réservation actuelle
        $currentReservationData = file_get_contents($apiUrl);
        $currentReservation = json_decode($currentReservationData, true);

        // Vérifier si la réservation a été récupérée avec succès
        if (isset($currentReservation['reservation'])) {
            // Mettre à jour le statut de la réservation
            $currentReservation['reservation']['statut_reservation'] = 'Validé !';

            // Préparer les options de la requête PATCH
            $options = array(
                'http' => array(
                    'method' => 'PATCH',
                    'header' => 'Content-type: application/json',
                    'content' => json_encode($currentReservation['reservation'])
                )
            );

            // Envoyer la requête PATCH à l'API
            $context = stream_context_create($options);
            $result = file_get_contents($apiUpdateUrl, false, $context); // Utiliser l'URL de mise à jour
            // var_dump($result);
            // die;

            if ($result !== false) {
                $responseData = json_decode($result, true);

                if (isset($responseData['status']) && $responseData['status']) {
                    echo "La réservation a été validée avec succès !";
                } else {
                    echo "Une erreur s'est produite lors de la mise à jour de la réservation.";
                }
            } else {
                echo "Une erreur s'est produite lors de l'envoi des données au serveur.";
            }
        } else {
            echo "Impossible de récupérer les détails de la réservation.";
        }
        header('location:' . $this->baseUrlSite . 'index.php?controller=Restaurant&action=askResaAConfirm');
    }



    public function deleteReservation($id)
    {
        $apiUrl = $this->baseUrlApi . '/reservation/delete/' . $id;


        $options = array(
            'http' => array(
                'method' => 'DELETE',
            )
        );

        // Envoyer la requête DELETE à l'API
        $context = stream_context_create($options);
        $result = file_get_contents($apiUrl, false, $context);

        if ($result !== false) {
            $responseData = json_decode($result, true);

            if (isset($responseData['status']) && $responseData['status']) {
                echo "La réservation a été supprimée avec succès !";
            } else {
                echo "Une erreur s'est produite lors de la suppression de la réservation.";
            }
        } else {
            echo "Une erreur s'est produite lors de l'envoi des données au serveur.";
        }
        header('location:' . $this->baseUrlSite . 'index.php?controller=Restaurant&action=askResaAConfirm');
    }
}
