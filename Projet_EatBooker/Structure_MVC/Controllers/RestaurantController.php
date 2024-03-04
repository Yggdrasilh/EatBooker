<?php

namespace App\Controllers;

use App\Core\Validator;

class RestaurantController extends Controller
{

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
        if (Validator::validPostGlobal()) {
        } else {
            $this->render('restaurant/inscription', ['renseignerPlanning' => false]);
        }
    }
}
