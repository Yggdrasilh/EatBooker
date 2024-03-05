<?php

$title = "Inscription restaurateur ";

if ($erreur) {
?>
    <div class="alert alert-danger" role="alert">
        Un problème est survenue lors de votre inscription. Veuillez réessayer.
    </div>
<?php
}
?>

<form action="http://application/Projet_EatBooker_2s/Projet_EatBooker/Structure_MVC/public/index.php?controller=Restaurant&action=inscriptionRestaurant" method="post" id="inscriptionRestaurant">


    <h2>Rentrer les informations de votre restaurant</h2>
    <div class="input-group mb-3">
        <span class="input-group-text" id="spanNom">Nom</span>
        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="inpute" id="inputeNom" name="inputeNom">
    </div>

    <div class="input-group mb-3">
        <input type="email" class="form-control" placeholder="truc@mail.co" aria-label="Recipient's username" aria-describedby="inpute" id="inputeEmail" name="inputeEmail">
        <span class="input-group-text" id="spanEmail">Email</span>
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text" id="spanPassword">Password</span>
        <input type="password" class="form-control" placeholder="123456" aria-label="Username" aria-describedby="inpute" id="inputePassword" name="inputePassword">
    </div>

    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="10 allée de truc" aria-label="Recipient's username" aria-describedby="inpute" id="inputeAdresse" name="inputeAdresse">
        <span class="input-group-text" id="spanAdresse">Adresse</span>
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text" id="spanCp">CP</span>
        <input type="number" class="form-control" placeholder="49000" aria-label="Username" aria-describedby="inpute" id="inputeCp" name="inputeCp">
    </div>

    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Angers" aria-label="Recipient's username" aria-describedby="inpute" id="inputeVille" name="inputeVille">
        <span class="input-group-text" id="spanVille">Ville</span>
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text" id="spanDescription">Description</span>
        <input type="text" class="form-control" placeholder="blablabla" aria-label="Username" aria-describedby="inpute" id="inputeDescription" name="inputeDescription">
    </div>

    <div class="input-group mb-3">
        <input type="number" class="form-control" placeholder="30" aria-label="Recipient's username" aria-describedby="inpute" id="inputeNbCouvertMax" name="inputeNbCouvertMax">
        <span class="input-group-text" id="spanNbCouvertMax">Nombre de couvert maximum</span>
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text" id="spanPrixMoyen">Prix moyen d'un menue (fourchette de prix)</span>
        <input type="text" class="form-control" placeholder="30€ à 60€" aria-label="Username" aria-describedby="inpute" id="inputePrixMoyen" name="inputePrixMoyen">
    </div>

    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="https://pdf/resto..." value="Menue" aria-label="Recipient's username" aria-describedby="inpute" id="inputeMenu" name="inputeMenu">
        <span class="input-group-text" id="spanMenu">Menu (URL du fichier PDF ou image)</span>
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text" id="spanTypeCuisine">Type de cuisine</span>
        <input type="text" class="form-control" placeholder="Bistro" aria-label="Username" aria-describedby="inpute" id="inputeTypeCuisine" name="inputeTypeCuisine">
    </div>

    <div class="col-12 submitFormResto">
        <button class="btn btn-primary" type="submit">Envoyer</button>
    </div>
</form>