<?php
$title = 'Demande de reservation';
?>
<?php
// var_dump($_SESSION) 
?>


<h2 class='titrePage'>Demande de reservation</h2>
<table class="table table-striped table-dark">
    <thead>
        <tr>
            <th>ID</th>
            <th>Date</th>
            <th>Heure</th>
            <th>Nombre de couverts</th>
            <th>Statut</th>
            <!-- <th>Restaurant</th> -->
            <th>Utilisateur</th>
            <th>Valider</th>
            <th>Refuser</th>
        </tr>
    </thead>
    <tbody>


        <?php foreach ($reservations as $reservation) : ?>


            <tr>
                <td><?php echo $reservation['id_reservation']; ?></td>
                <td><?php echo $reservation['date_reservation']; ?></td>
                <td><?php echo $reservation['heure_reservation']; ?></td>
                <td><?php echo $reservation['nb_couvert_reservation']; ?></td>
                <td><?php echo $reservation['statut_reservation']; ?></td>

                <td><?php echo $reservation['id_user']; ?></td>
                <td>
                    <a href="index.php?controller=Restaurant&action=UpdateStatutResa&id=<?php echo $reservation['id_reservation'] ?>">
                        <button type="button" class="btn btn-success">Valider</button>
                    </a>
                </td>
                <td>
                    <a href="index.php?controller=Restaurant&action=deleteReservation&id=<?php echo $reservation['id_reservation'] ?>">
                        <button type="button" class="btn btn-danger">Refuser</button>
                    </a>
                </td>
            </tr> <?php endforeach; ?>

    </tbody>
</table>