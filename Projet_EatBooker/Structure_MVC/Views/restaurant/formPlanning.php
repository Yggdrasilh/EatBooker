<?php

$title = "Votre planning d'ouverture ";

if ($erreur) {
?>
    <div class="alert alert-danger" role="alert">
        Un problème est survenue et les informations non pas pu être enregistrer. Veuillez réessayer.
    </div>
<?php
}
?>


<form action="" method="post" id="renseignerPlanningRestaurant">

    <h2>Rentrer vos horaires d'ouverture</h2>
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
    <div class="col-12 submitFormResto">
        <button class="btn btn-primary" type="submit">Envoyer</button>
    </div>
</form>