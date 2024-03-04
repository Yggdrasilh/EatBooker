<?php

$title = "EatBooker - Changer le mot de passe";
?>
<h1>Changer mon Mot de passe</h1>
<!-- Penser a envoyer ses requetes POST vers son propre controlleur.  -->

<form class="formadd" id="envoyer" action="index.php?controller=user&action=updateMdpProfil" method="post">
    <div class="mb-3">
        <label class="form-label" for="id">Nouveau mot de passe : </label>
        <input class="form-control" id="mdp" type="password" name="new_password_user">
    </div>
    <div class="mb-3">
        <label class="form-label" for="password"> Valider le Nouveau Mot de passe : </label>
        <input class="form-control" id="mdp" type="password" name="confim_new_password_user">
    </div>
    <div class="mb-3">
        <label class="form-label" for="password"> Indiquer votre ancien Mot de passe : </label>
        <input class="form-control" id="mdp" type="password" name="password_user">
    </div>
    <button class="btn btn-primary" type="submit">Valider</button>

</form>

<?php
echo '<pre>';
var_dump($newPassword);
echo '</pre>';
echo '<pre>';
var_dump($confirmNewPassword);
echo '</pre>';
echo '<pre>';
var_dump($oldPassword);
echo '</pre>';
echo '<pre>';
var_dump($hashedPassword);
echo '</pre>';
echo '<pre>';
var_dump($_SESSION['password_user']);
echo '</pre>';

?>