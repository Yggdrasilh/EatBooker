<?php $title = "Mes informations personnels" ?>

<div class="card profilcard" style="width: 18rem;">
    <div class="card-body">
        <h4 class="card-title nameprofil"><b> Nom :</b> <?php echo $_SESSION['nom_user'] ?></h4>
        <h4 class="card-title nameprofil"><b>Prenom :</b> <?php echo $_SESSION['prenom_user'] ?></h4>
        <h4 class="card-title nameprofil"><b>Email :</b> <?php echo $_SESSION['email_user'] ?></h4>
        <h4 class="card-title nameprofil"><b>Mot de passe : </b>******** </h4>
        <a href="index.php?controller=user&action=updateMdpProfil">
            <p class="card-text">Changer de mot de passe? </p>
        </a>
    </div>
</div>