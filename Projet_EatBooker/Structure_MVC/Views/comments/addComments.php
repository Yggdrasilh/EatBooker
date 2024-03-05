<?php

$title = "EatBooker - Ajouter un commentaire";
?>
<h1>J'ajoute un commentaire</h1>
<!-- Penser a envoyer ses requetes POST vers son propre controlleur.  -->

<form class="formadd" id="envoyer" action="index.php?controller=Comments&action=addComments" method="post">
    <input type="hidden" name="id" value="<?php echo $restaurantId; ?>">
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