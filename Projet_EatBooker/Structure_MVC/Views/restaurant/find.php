<?php

$title = 'EatBooker ' . $restaurantData['restaurant']['nom_restaurant'];



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

    <form method="post" action="index.php?controller=Note&action=Addnote&id=<?php echo $restaurantData['restaurant']['id_restaurant'] ?>">
        <div id="star-container">

            <span id="selected-rating">
                <h5>Noter le restaurant? </h5>
            </span>

            <span class="star">★</span>

            <span class="star">★</span>

            <span class="star">★</span>

            <span class="star">★</span>

            <span class="star">★</span>
            <input type="hidden" name="rating" id="rating" value="0">
            <button id="validate-rating">
                <p>Valider</p>
            </button>
        </div>
    </form>


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
            <h3 id="ville_fiche_resto" class="card-text"><?= $restaurantData['restaurant']['cp_restaurant'] ?> <?= $restaurantData['restaurant']['ville_restaurant'] ?></h3>
            <p id="prix_fiche_resto" class="card-text">20-35€</p>



            <!-- attention modifier lien -->
            <a href="index.php?controller=restaurant&action=reservation&id=" class="btn btn-light btn-reserver" id="btn_reserver">Réserver</a>


        </div>

    </div>
    <div id="comment_restaurant" class="container-fluid">

        <div id="note_moyenne">
            <div id="note_moyenne">
                <?php if (!empty($restaurantData['restaurant']['note_moyenne_restaurant'])) :
                    var_dump($restaurantData['restaurant']['note_moyenne_restaurant']);
                    die; ?>
                    <h3 id="note_fiche_resto" class="card-title">Note : <?= $restaurantData['restaurant']['note_moyenne_restaurant'] ?>/5</h3>


                <?php else : ?>
                    Aucune note disponible.
                <?php endif; ?>
            </div>

            <div id='commFindAll'>
                <h3>Commentaires : </h3>

                <?php foreach ($commentsData as $comment) {
                ?>

                    <div class="comment">
                        <h4 class="comment-title"><b>Par:</b> <?php echo $comment['prenom_user']; ?></h4>
                        <h4 class="comment-title"><b>Titre:</b> <?php echo $comment['titre_comments']; ?></h4>
                        <h5 class="comment-body"><b> Commentaire: </b><?php echo $comment['corps_comments']; ?></h5>
                        <button type="button" class="btn btn-danger"> Signaler?</button>
                    </div>
                <?php } ?>
            </div>



        </div>


        <div id='Commentaire'>
            <h3> J'ajoute un commentaire :</h3>

            <!-- Penser a envoyer ses requetes POST vers son propre controlleur.  -->

            <form class="formadd" id="envoyer" action="index.php?controller=Comments&action=addComments&id=<?= $restaurantData['restaurant']['id_restaurant'] ?>" method="post">
                <div class="mb-3">
                    <label class="form-label" for="id">Titre du commentaire </label>
                    <input class="form-control" id="titre" type="text" name="titre">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="password">Commentaire </label>
                    <input class="form-control" id="commentaire" type="text" name="commentaire">
                </div>

                <button name="valider" class="btn btn-primary" type="submit">Valider</button>

            </form>

</section>