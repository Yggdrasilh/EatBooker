<?php
$title = 'Demande de reservation';
?>
<?php
// var_dump($_SESSION);
// var_dump($planningData); 
?>
<div id='ResaDemande'>
    <div id='joursResto'>
        <h2 class='titrePage'> Jours d'ouverture du restaurant</h2>
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th>Jours</th>
                    <th>AM</th>
                    <th>PM</th>
                </tr>
            </thead>
            <tbody> <?php

                    $joursSemaine = ['lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche']; ?>
                <?php foreach ($joursSemaine as $jour) : ?> <tr>
                        <th><?php echo ucfirst($jour); ?></th>
                        <?php if (isset($planningData['planning']['planning'][$jour . '_am']) && isset($planningData['planning']['planning'][$jour . '_pm'])) : ?>
                            <td><?php echo $planningData['planning']['planning'][$jour . '_am'] ? 'Ouvert' : 'Fermé'; ?></td>
                            <td><?php echo $planningData['planning']['planning'][$jour . '_pm'] ? 'Ouvert' : 'Fermé'; ?></td> <?php else : ?>
                            <td></td>
                            <td></td> <?php endif; ?>
                    </tr> <?php endforeach; ?> </tbody>
        </table>
    </div>



    <div id="formResa">
        <h2 class="titrePage">Demande de réservation</h2>
        <form class="formaddResa" id="envoyer" action="index.php?controller=reservation&action=traitementAskResa" method="post">
            <div class="mb-3">
                <label class="form-label" for="id">Jour de la reservation:</label><br>
                <select name="jour_reservation" class='jourResa'>
                    <?php
                    // Tableau des jours de la semaine
                    $joursSemaine = ['dimanche', 'lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi'];

                    // Récupération du planning du restaurant
                    $planning = $planningData['planning']['planning'];

                    // Date actuelle
                    $dateActuelle = date('Y-m-d');

                    // Date formatée pour l'option
                    $dateOption = strtotime($dateActuelle);

                    // Nombre de jours à afficher dans le select
                    $joursAffiches = 7;

                    // Boucle pour ajouter les options dans le select
                    for ($i = 0; $i < $joursAffiches; $i++) {
                        // Formatage de la date pour l'option
                        $dateOptionFormat = date('Y-m-d', $dateOption);
                        // Récupération du nom du jour
                        $nomJour = ucfirst($joursSemaine[date('w', $dateOption)]);

                        // Vérifier si le restaurant est ouvert ce jour-là
                        $ouverture_am = $planning[$joursSemaine[date('w', $dateOption)] . '_am'];
                        $ouverture_pm = $planning[$joursSemaine[date('w', $dateOption)] . '_pm'];

                        if ($ouverture_am && $ouverture_pm) {
                            // Affichage de l'option avec le nom du jour et la date
                            echo "<option value='$dateOptionFormat'>$nomJour - $dateOptionFormat</option>";
                        }

                        // Ajout d'un jour à la date
                        $dateOption = strtotime('+1 day', $dateOption);
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label" for="time_input">Heure de la reservation:</label>
                <input class="form-control" id="heure" type="time" name="heure_reservation">
            </div>
            <div class="mb-3">
                <label class="form-label" for="nb_de_couvert">Nombre de personne:</label>
                <input class="form-control" id="nb_couvert_reservation" type="text" name="nb_couvert_reservation">
            </div>
            <div class="mb-3">
                <label class="form-label" for="nom_reservation">Nom:</label>
                <input class="form-control" value="<?php echo $_SESSION['nom_user'] ?>" id=" nomReservarion" type="text" name="nom_reservation">
            </div>
            <div class="mb-3">
                <label class="form-label" for="prenom_reservation">Prenom:</label>
                <input class="form-control" value="<?php echo $_SESSION['prenom_user'] ?>" id=" prenomReservarion" type="text" name="prenom_reservation">
            </div>
            <div class="mb-3">
                <label class="form-label" for="prenom_reservation">Email:</label>
                <input class="form-control" value="<?php echo $_SESSION['email_user'] ?>" id=" emailReservarion" type="text" name="email_reservation">
            </div>
            <input class="id_user" type='hidden' value="<?php echo $_SESSION['id_user']  ?>" name="id_user">
            <input class="id_restaurant" type="hidden" value="<?php echo $planningData['planning']['planning']['id_restaurant'] ?>" name="id_restaurant">

            <button class=" btn btn-light" type="submit">Valider</button>
        </form>
    </div>
</div>