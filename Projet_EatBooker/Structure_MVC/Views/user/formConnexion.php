<?php
// var_dump($_SESSION);

$title = "EatBooker - Se Connecter";
?>
<h1 class="titrePage">Je me connecte</h1>
<!-- Penser a envoyer ses requetes POST vers son propre controlleur.  -->
<div id="FormulaireSignIn">
    <div id='formUserr'>
        <h1> Utilisateur</h1>
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
    </div>
    </form>
    <div id='formRestoo'>
        <h1> Restaurateur</h1>
        <form class="formadd" id="envoyer" action="index.php?controller=restaurant&action=login" method="post">
            <div class="mb-3">
                <label class="form-label" for="id">Email : </label>
                <input class="form-control" id="email" type="text" name="email_resto">
            </div>
            <div class="mb-3">
                <label class="form-label" for="password">Mot de passe : </label>
                <input class="form-control" id="mdp" type="password" name="password_resto">
            </div>
            <button class="btn btn-primary" type="submit">Valider</button>

        </form>

    </div>
</div>
<div id="FormulaireSignIn">
    <div id='formadd'>
        <h1>Je suis un Utilisateur </h1>

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
    <div id='lienResto'>




        <form action="http://localhost:8888/Projet_EatBooker/Projet_EatBooker/Structure_MVC/public/index.php?controller=Restaurant&action=inscriptionRestaurant" method="post" id="inscriptionRestaurant">


            <h1>Indiquez les informations de votre restaurant</h1>
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
    </div>
</div>