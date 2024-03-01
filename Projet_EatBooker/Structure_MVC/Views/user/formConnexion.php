<?php
// var_dump($_SESSION);

$title = "EatBooker - Se Connecter";
?>
<h1>Se connecter</h1>
<!-- Penser a envoyer ses requetes POST vers son propre controlleur.  -->

<form class="formadd" id="envoyer" action="index.php?controller=user&action=login" method="post">
    <div class="mb-3">
        <label class="form-label" for="id">Email : </label>
        <input class="form-control" id="email" type="text" name="email_user">
    </div>
    <div class="mb-3">
        <label class="form-label" for="password">Mot de passe : </label>
        <input class="form-control" id="mdp" type="password" name="password_user">
    </div>
    <button class="btn btn-primary" type="submit">Valider</button>

</form>