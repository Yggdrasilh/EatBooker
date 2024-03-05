<?php

$title = 'EatBooker - Mes Favoris';
// var_dump($_SESSION['id_user'])
echo "Bonjour " . $_SESSION['prenom_user'];

?>
<h1>Mes restaurants Favoris</h1>

<?php
foreach ($favoriData as $favori) : ?>
    <div class="card mes_favoris" style="width: 18rem;">
        <div class="card-body">
            <h4 class="card-title favori"><b> Nom du Restaurant :</b> <?= $favori['nom_restaurant'] ?></h4>
            <h4 class="card-title favori"><b>Ville :</b> <?= $favori['ville_restaurant']  ?></h4>
            <a href="index.php?controller=restaurant&action=find&id=<?= $favori['id_restaurant']  ?>">
                <p class="card-text">Voir la fiche du restaurant</p>
            </a>
            <a href="index.php?controller=restaurant&action=deleteFavori&id=<?= $favori['id_restaurant']  ?>">
                <p class="card-text">Supprimer ce restaurant des favoris</p>
            </a>
        </div>
    </div>
<?php endforeach ?>