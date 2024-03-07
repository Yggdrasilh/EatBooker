<?php
// var_dump($_SESSION);

$title = "EatBooker - Se Connecter";
?>
<h1>Je me connecte</h1>
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


<div id='formadd'>
    <h1>Je m'inscris </h1>

    <form id="envoyer" class="formadd" method="post" action="index.php?controller=user&action=signin">
        <div class="mb-3">
            <label for="nom" class="form-label">Nom : </label>
            <input name="nom_user" type="text" class="form-control" id="nom">
        </div>
        <div class="mb-3">
            <label for="prenom" class="form-label">Prénom : </label>
            <input name="prenom_user" type="text" class="form-control" id="prenom">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email : </label>
            <input name="email_user" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Mot de passe : </label>
            <input name="password_user" type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-primary" name="valider">Valider</button>
    </form>
</div>