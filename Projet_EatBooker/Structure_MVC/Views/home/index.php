<?php

$title = 'EatBooker - Accueil';
?>
<section id="section_accueil">
    <h1 id="titre_accueil">Bienvenue sur EatBooker</h1>


    <!-- presentation de l'appli -->
    <div id="presentation_accueil">



        <p id="txt_presentation">
            <img src="images/imageAccueil.png" alt="terrasse restaurant " id="imageAccueil" />
            <b>Coucou petit panda !</b> <br>

            Si toi aussi, tu veux retrouver tes restaurants préférés et découvrir de nouveaux endroits dans ta ville,
            n’hésite plus et <a href="#" id="description_lien_connexion">connecte-toi à « EatBooker » !</a>
            Notre application te permet de parcourir et de réserver dans une variété de restaurants de qualité.
            Explore et trouve l’endroit parfait pour déguster les meilleurs bambous de ta région.”
        </p>

    </div>

    <!-- les resto recommandés donc ceux qui ont les meilleurs notes -->

    <div id="resto_recommande" class="card" style="width: 18rem;">
        <img id="img_resto_recommande" src="images/imageAccueil.png" class="card-img-top" alt="image du restaurant">
        <div class="card-body">

            <div id="type_note_resto">
                <h5 id="type_resto_recommande" class="card-title">bistrot</h5>
                <p id="noteresto_recommande">4.8/5</p>
            </div>
            <h2 id="nom_resto_recommande" class="card-title">Chez Nono</h2>
            <p id="ville_resto_recommande" class="card-text">Angers</p>
            <p id="prix_resto_recommande" class="card-text">20-35€</p>
            <a href="#" class="btn btn-primary">Réserver</a>
        </div>
    </div>




</section>