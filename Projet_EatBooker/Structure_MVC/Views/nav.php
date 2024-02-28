<?php

// On stocke dans un tableau chaques bouton pour la nav selon nos entités.

// Les éléments de navigation pour l'utilisateur "user"
$user_nav_elements = array(
    '<a class="nav" href="#"><button type="button" class="btn btn-light">Accueil</button></a>',
    '<a class="nav" href="#"><button type="button" class="btn btn-light">Page profil</button></a>',
    '<a class="nav" href="#"><button type="button" class="btn btn-light">Trouver un restaurant</button></a>',
    '<a class="nav" href="#"><button type="button" class="btn btn-light">Mes restaurants préférés</button></a>',
);

// Les éléments de navigation pour l'admin"
$admin_nav_elements = array(
    '<a class="nav" href="#"><button type="button" class="btn btn-light">Accueil</button></a>',
    '<a class="nav" href="#"><button type="button" class="btn btn-light">Gestion Restaurant</button></a>',
    '<a class="nav" href="#"><button type="button" class="btn btn-light">Gestion des Utilisateurs</button></a>',
    '<a class="nav" href="#"><button type="button" class="btn btn-light">Modération des commentaires</button></a>',
);
// Les éléments de navigation pour l'admin.
$restaurant_nav_elements = array(
    '<a class="nav" href="#"> <button type="button" class="btn btn-light"> Accueil </button> </a>',
    '<a class="nav" href="#"> <button type="button" class="btn btn-light"> Page du Restaurant </button> </a>',
    '<a class="nav" href="#"> <button type="button" class="btn btn-light"> Planning du Restaurant </button> </a>',
    '<a class="nav" href="#"> <button type="button" class="btn btn-light"> Gerer les demandes de reservation </button> </a>',
    '<a class="nav" href="#"> <button type="button" class="btn btn-light"> Les avis </button> </a>'
);

// On conditionne.
if ($_SESSION['role_user'] == 'user') {
    $nav_elements = $user_nav_elements;
} elseif ($_SESSION['role_user'] == 'admin') {
    $nav_elements = $admin_nav_elements;
} elseif ($_SESSION['role_user'] == 'restaurant') {
    $nav_elements = $restaurant_nav_elements;
};


// On construit la nav 
?>
<nav id="navigation">
    <?php
    // On boucle pour afficher les elements. 
    foreach ($nav_elements as $nav_element) {
        echo $nav_element;
    }
    ?>
</nav>
<div class="menu-icon" onclick="toggleMenu()">
    <div class="bar"></div>
    <div class="bar"></div>
    <div class="bar"></div>
</div>