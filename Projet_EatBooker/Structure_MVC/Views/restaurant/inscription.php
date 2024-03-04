<?php

$title = "Inscription restaurateur ";
$keysResto = [
    'nom_restaurant',
    'email_restaurant',
    'password_restaurant',
    'adresse_restaurant',
    'cp_restaurant',
    'ville_restaurant',
    'description_restaurant',
    'place_max_restaurant',
    'prix_restaurant',
    'menu_restaurant',
    'type_restaurant',
    'note_moyenne_restaurant',
    'statut_restaurant',
    'id_planning',
];

$keysPlanning = [
    'lundi_am',
    'lundi_pm',
    'mardi_am',
    'mardi_pm',
    'mercredi_am',
    'mercredi_pm',
    'jeudi_am',
    'jeudi_pm',
    'vendredi_am',
    'vendredi_pm',
    'samedi_am',
    'samedi_pm',
    'dimanche_am',
    'dimanche_pm',
    'id_restaurant',
];
?>

<form action="" method="post" id="inscriptionRestaurant">

    <?php
    if ($renseignerPlanning) {
    ?>
        <h2>Rentrer les informations de votre restaurant</h2>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Nom</span>
            <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
        </div>

        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
            <span class="input-group-text" id="basic-addon2">Email</span>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Password</span>
            <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
        </div>

        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
            <span class="input-group-text" id="basic-addon2">Adresse</span>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">CP</span>
            <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
        </div>

        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
            <span class="input-group-text" id="basic-addon2">Ville</span>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Description</span>
            <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
        </div>

        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
            <span class="input-group-text" id="basic-addon2">Nombre de couvert maximum</span>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Prix moyen d'un menue (fourchette de prix)</span>
            <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
        </div>

        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
            <span class="input-group-text" id="basic-addon2">Menu (URL du fichier PDF ou image)</span>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Type de cuisine</span>
            <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
        </div>

    <?php
    } else {
    ?>




        <h2>Rentrer vos horaire d'ouverture</h2>
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th>Jours</th>
                    <th>AM</th>
                    <th>PM</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Lundi</th>
                    <td> <input class="form-check-input" type="checkbox" id="checkLundiAm" name="checkLundiAm"></td>
                    <td> <input class="form-check-input" type="checkbox" id="checkLundiPm" name="checkLundiPm"></td>
                </tr>
                <tr>
                    <th>Mardi</th>
                    <td> <input class="form-check-input" type="checkbox" id="checkMardiAm" name="checkMardiAm"></td>
                    <td> <input class="form-check-input" type="checkbox" id="checkMardiPm" name="checkMardiPm"></td>
                </tr>
                <tr>
                    <th>Mercredi</th>
                    <td> <input class="form-check-input" type="checkbox" id="checkMercrediAm" name="checkMercrediAm"></td>
                    <td> <input class="form-check-input" type="checkbox" id="checkMercrediPm" name="checkMercrediPm"></td>
                </tr>
                <tr>
                    <th>Jeudi</th>
                    <td> <input class="form-check-input" type="checkbox" id="checkJeudiAm" name="checkJeudiAm"></td>
                    <td> <input class="form-check-input" type="checkbox" id="checkJeudiPm" name="checkJeudiPm"></td>
                </tr>
                <tr>
                    <th>Vendredi</th>
                    <td> <input class="form-check-input" type="checkbox" id="checkVendrediAm" name="checkVendrediAm"></td>
                    <td> <input class="form-check-input" type="checkbox" id="checkVendrediPm" name="checkVendrediPm"></td>
                </tr>
                <tr>
                    <th>Samedi</th>
                    <td> <input class="form-check-input" type="checkbox" id="checkSamediAm" name="checkSamediAm"></td>
                    <td> <input class="form-check-input" type="checkbox" id="checkSamediPm" name="checkSamediPm"></td>
                </tr>
                <tr>
                    <th>Dimanche</th>
                    <td> <input class="form-check-input" type="checkbox" id="checkDimancheAm" name="checkDimancheAm"></td>
                    <td> <input class="form-check-input" type="checkbox" id="checkDimanchePm" name="checkDimanchePm"></td>
                </tr>
            </tbody>
        </table>
    <?php
    }
    ?>
</form>