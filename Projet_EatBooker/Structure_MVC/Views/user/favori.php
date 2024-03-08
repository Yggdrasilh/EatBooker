<?php

$title = 'EatBooker - Mes Favoris';
// var_dump($_SESSION['id_user'])
echo "Bonjour " . $_SESSION['prenom_user'];

?>
<h1>Mes restaurants Favoris</h1>
<div id="tous_les_restos" class="affichage_tous_restos">
    <?php if (!empty($restoFavoris)) : ?>
        <!-- Parcourez le tableau et affichez les favoris ici -->
        <?php foreach ($restoFavoris as $restoFavoris) :
            // var_dump($favori);
            // die; 
        ?>
            <div id="tous_restos" class="card" style="width: 13rem;">
                <img id="img_tous_restos" src="images/imageAccueil.png" class="card-img-top" alt="image du restaurant">
                <div class="card-body">
                    <div id="type_tous_restos">
                        <h5 id="type_tous_restoss" class="card-title"><?= $restoFavoris['type_restaurant'] ?> </h5>
                        <p id="note_tous_restos"><?= $restoFavoris['note_moyenne_restaurant'] ?>/5</p>
                    </div>
                    <h3 id="nom_tous_restos" class="card-title"><?= $restoFavoris['nom_restaurant'] ?></h3>
                    <p id="ville_tous_restos" class="card-text"><?= $restoFavoris['ville_restaurant'] ?></p>
                    <p id="prix_tous_restos" class="card-text">20-35€</p>
                    <?php if (empty($_SESSION['id_user'])) : ?>
                        <a href="index.php?controller=User&action=login" id="btn_reserver" class="btn btn-primary btn-reserver">Réserver</a>
                    <?php else : ?>
                        <a href="index.php?controller=restaurant&action=find&id=<?= $restoFavoris['id_restaurant'] ?>" class="btn btn-primary btn-reserver" id="btn_reserver">Réserver</a>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach;
    else : ?>
        <p>Aucun favori trouvé.</p>
    <?php endif; ?>
</div>