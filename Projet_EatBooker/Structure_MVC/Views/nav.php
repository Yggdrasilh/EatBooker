<?php
// Fonction pour générer la navigation en fonction du rôle de l'utilisateur
function generateNavigation($role)
{
    switch ($role) {
        case 'user':
            $nav_elements = array(
                '<a class="nav" href="#"><button type="button" class="btn btn-light btnNav">Accueil</button></a>',
                '<a class="nav" href="#"><button type="button" class="btn btn-light btnNav">Page profil</button></a>',
                '<a class="nav" href="#"><button type="button" class="btn btn-light btnNav">Trouver un restaurant</button></a>',
                '<a class="nav" href="#"><button type="button" class="btn btn-light btnNav">Mes restaurants préférés</button></a>',
            );
            break;
        case 'admin':
            $nav_elements = array(
                '<a class="nav" href="#"><button type="button" class="btn btn-light btnNav">Accueil</button></a>',
                '<a class="nav" href="http://application/Projet_EatBooker_2s/Projet_EatBooker/Structure_MVC/public/index.php?controller=Restaurant&action=gestionRestaurantAdmin"><button type="button" class="btn btn-light btnNav">Gestion Restaurant</button></a>',
                '<a class="nav" href="#"><button type="button" class="btn btn-light btnNav">Gestion des Utilisateurs</button></a>',
                '<a class="nav" href="#"><button type="button" class="btn btn-light btnNav">Modération des commentaires</button></a>',
            );
            break;
        case 'restaurant':
            $nav_elements = array(
                '<a class="nav" href="#"> <button type="button" class="btn btn-light btnNav"> Accueil </button> </a>',
                '<a class="nav" href="#"> <button type="button" class="btn btn-light btnNav"> Page du Restaurant </button> </a>',
                '<a class="nav" href="#"> <button type="button" class="btn btn-light btnNav"> Planning du Restaurant </button> </a>',
                '<a class="nav" href="#"> <button type="button" class="btn btn-light btnNav"> Gerer les demandes de reservation </button> </a>',
                '<a class="nav" href="#"> <button type="button" class="btn btn-light btnNav"> Les avis </button> </a>'
            );
            break;
        default:
            $nav_elements = array(); // Cas par défaut: aucune navigation
            break;
    }

    // Générer la navigation
    foreach ($nav_elements as $nav_element) {
        echo $nav_element;
    }
}
