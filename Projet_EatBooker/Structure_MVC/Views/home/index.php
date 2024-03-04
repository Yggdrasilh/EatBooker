<?php

$title = 'EatBooker - Accueil';

echo "Bonjour " . $_SESSION['prenom_user']; ?><a href="index.php?controller=user&action=logout"> Se Deconnecter</a>

<section id="section_accueil">
    <h1 id="titre_accueil">Bienvenue sur EatBooker</h1>
    <div>
        <!-- presentation de l'appli -->
        <div id="text_presentation">

            <p id="txt_presentation">
                <img src="images/imageAccueil.png" alt="terrasse restaurant " id="imageAccueil" />
                <b>Coucou petit panda !</b> <br>

                Si toi aussi, tu veux retrouver tes restaurants préférés et découvrir de nouveaux endroits dans ta ville,
                <!-- ----------- ATTENTION REMETTRE LE LIEN------------------------------------------------------------------------>
                n’hésite plus et <a href="index.php?controller=user&action=login" id="description_lien_connexion">connecte-toi à « EatBooker » !</a>
                Notre application te permet de parcourir et de réserver dans une variété de restaurants de qualité.
                Explore et trouve l’endroit parfait pour déguster les meilleurs bambous de ta région.”
            </p>

        </div>
    </div>

    <h2> Les restaurants les mieux notés</h2>

    <div class="affichage_tous_restos" id="resto_mieux_notes">
        <?php
        $nbResto = 0;
        while ($nbResto < 5) :

            foreach ($restoData['restaurant'] as $resto) :
                // var_dump($restoData);
                // die; 
        ?>


                <?php if ($resto['note_moyenne_restaurant'] >= 4) : ?>
                    <!-- Afficher les informations du restaurant -->
                    <div id="tous_restos" class="card card-container" style="width: 13rem;">
                        <img id="img_tous_restos" src="images/imageAccueil.png" class="card-img-top" alt="image du restaurant">
                        <div class="card-body">
                            <div id="type_tous_restos">
                                <h5 id="type_tous_restoss" class="card-title"><?= $resto['type_restaurant'] ?> </h5>
                                <p id="note_tous_restos"><?= $resto['note_moyenne_restaurant'] ?>/5</p>
                            </div>
                            <h3 id="nom_tous_restos" class="card-title"><?= $resto['nom_restaurant'] ?></h3>
                            <p id="ville_tous_restos" class="card-text"><?= $resto['ville_restaurant'] ?></p>
                            <p id="prix_tous_restos" class="card-text">20-35€</p>
                            <!-- modifier route -->
                            <a href="index.php?controller=user&action=reserver&id=<?= $resto['id_restaurant'] ?>" class="btn btn-primary btn-reserver" id="btn_reserver">Réserver</a>
                        </div>
                    </div>
                <?php
                    $nbResto++;
                endif; ?>
        <?php endforeach;
        endwhile;
        ?>

    </div>


    <!--affichage tous les resto-->
    <h2>Les restaurants</h2>

    <div id="tous_les_restos" class="affichage_tous_restos">

        <?php
        $nbResto = 0;

        foreach ($restoData as $resto) :

            foreach ($resto as $valueResto) :
                if ($nbResto < 5) :

                    // var_dump($resto);
        ?>
                    <div id="tous_restos" class="card" style="width: 13rem;">
                        <img id="img_tous_restos" src="images/imageAccueil.png" class="card-img-top" alt="image du restaurant">
                        <div class="card-body">

                            <div id="type_tous_restos">
                                <h5 id="type_tous_restoss" class="card-title"><?= $valueResto['type_restaurant'] ?> </h5>
                                <p id="note_tous_restos"><?= $valueResto['note_moyenne_restaurant'] ?>/5</p>
                            </div>
                            <h3 id="nom_tous_restos" class="card-title"><?= $valueResto['nom_restaurant'] ?></h3>
                            <p id="ville_tous_restos" class="card-text"><?= $valueResto['ville_restaurant'] ?></p>
                            <p id="prix_tous_restos" class="card-text">20-35€</p>
                            <!-- modifier route -->
                            <a href="index.php?controller=user&action=re????????????????????" class="btn btn-primary" id="btn_reserver">Réserver</a>
                        </div>
                    </div>

        <?php
                    $nbResto++;
                endif;
            endforeach;
        endforeach;


        ?>
    </div>

</section>