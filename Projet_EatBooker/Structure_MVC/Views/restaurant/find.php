<?php

$title = 'EatBooker ' . $restaurantData['restaurant']['nom_restaurant'];
// var_dump($_SESSION['id_user'])
echo "Bonjour " . $_SESSION['prenom_user'];
?>


<section id="section_fiche_resto">

    <div class="container-fluid" id="fiche_resto">

        <h1 id="titre_fiche_resto">Restaurant <?= $restaurantData['restaurant']['nom_restaurant'] ?></h1>


        <form id="ajout_favori" method="post">
            <button id="favori" type="submit">
                <!-- Icône du cœur avec l'ID du restaurant stocké  id user dans un attribut de données -->
                <i id="favori_coeur" class="fa-solid fa-heart fa-2xl" data-restaurant-id="<?= $restaurantData['restaurant']['id_restaurant'] ?>" data-user-id="<?= $_SESSION['id_user'] ?>"></i>
            </button>
        </form>

    </div>

    <div id="fiche_resto" class="container-fluid">

        <div id="img_fiche">
            <img id="img_fiche_resto" src="images/imageAccueil.png" alt="image du restaurant">
        </div>

        <div id="description_resto">
            <p><?= $restaurantData['restaurant']['description_restaurant'] ?></p>
        </div>


        <div id="info_fiche_resto">
            <div id="type_fiche_resto">
                <h5 id="type_fiche_resto" class="card-title"><?= $restaurantData['restaurant']['type_restaurant']; ?> </h5>

            </div>
            <p id="nom_fiche_resto" class="card-title"><?= $restaurantData['restaurant']['adresse_restaurant'] ?></p>
            <h3 id="ville_fiche_resto" class="card-text"><?= $restaurantData['restaurant']['cp_restaurant'] ?><?= $restaurantData['restaurant']['ville_restaurant'] ?></h3>
            <p id="prix_fiche_resto" class="card-text">20-35€</p>



            <!-- attention modifier lien -->
            <a href="index.php?controller=restaurant&action=reservation&id=" class="btn btn-light btn-reserver" id="btn_reserver">Réserver</a>


        </div>

    </div>
    <div id="comment_restaurant" class="container-fluid">
        <h3 id="note_fiche_resto" class="card-title">Note : <?= $restaurantData['restaurant']['note_moyenne_restaurant'] ?>/5</h3>

        <h3>Commentaires : </h3>
        <h5 id="titreComment_fiche_resto" class="card-title"><?= $commentsData['comments']['titre_comments']; ?> </h5>
        <p id="comment_fiche_resto" class="card-title"><?= $commentsData['comments']['corps_comments']; ?> </p>
        <a href="index.php?controller=comments&action=addComments&id=<?= $restaurantData['restaurant']['id_restaurant'] ?>">
            <button id="ajout_comments" type="submit" class="btn btn-light">Ajouter un commentaire</button></a>
    </div>
</section>