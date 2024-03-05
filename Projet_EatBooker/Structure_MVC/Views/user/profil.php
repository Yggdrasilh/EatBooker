<?php $title = "Mes informations personnels" ?>


<section id="profil_user">
    <div class="card profilcard" style="width: 18rem;">
        <div class="card-body">
            <h4 class="card-title nameprofil"><b> Nom :</b> <?php echo $_SESSION['nom_user'] ?></h4>
            <h4 class="card-title nameprofil"><b>Prenom :</b> <?php echo $_SESSION['prenom_user'] ?></h4>
            <h4 class="card-title nameprofil"><b>Email :</b> <?php echo $_SESSION['email_user'] ?></h4>
            <h4 class="card-title nameprofil"><b>Mot de passe : </b>******** </h4>
            <a href="index.php?controller=user&action=updateProfil">
                <p class="card-text">Modifier mes informations personnels? </p>
            </a>
            <a href="index.php?controller=user&action=updateMdpProfil">
                <p class="card-text">Changer de mot de passe? </p>
            </a>
        </div>
    </div>

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
</section>