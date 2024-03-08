<?php

$title = "Gestion des restaurants - Administrateur ";
?>

<h2>Liste des Restaurants</h2>
<table class="table table-striped-columns" id="tableauRestoValid">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Email</th>
            <th>Mdp</th>
            <th>Adresse</th>
            <th>cp</th>
            <th>ville</th>
            <th>description</th>
            <th>place max</th>
            <th>prix</th>
            <th>menu</th>
            <th>type</th>
            <th>note moyenne</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody id="bodyTableauRestoValid">
        <?php
        foreach ($restoValid as $value) {
        ?>
            <tr class="rowRestoValid" id="rowRestoValid<?= $value['id_restaurant'] ?>">
                <td><input type="text" class="form-control input" value="<?= $value['nom_restaurant'] ?>" id="nom_restaurant<?= $value['id_restaurant'] ?>"></td>
                <td><input type="text" class="form-control input" value="<?= $value['email_restaurant'] ?>" id="email_restaurant<?= $value['id_restaurant'] ?>"></td>
                <td><input type="text" class="form-control input" value="<?= $value['password_restaurant'] ?>" id="password_restaurant<?= $value['id_restaurant'] ?>"></td>
                <td><input type="text" class="form-control input" value="<?= $value['adresse_restaurant'] ?>" id="adresse_restaurant<?= $value['id_restaurant'] ?>"></td>
                <td><input type="text" class="form-control input" value="<?= $value['cp_restaurant'] ?>" id="cp_restaurant<?= $value['id_restaurant'] ?>"></td>
                <td><input type="text" class="form-control input" value="<?= $value['ville_restaurant'] ?>" id="ville_restaurant<?= $value['id_restaurant'] ?>"></td>
                <td><input type="text" class="form-control input" value="<?= $value['description_restaurant'] ?>" id="description_restaurant<?= $value['id_restaurant'] ?>"></td>
                <td><input type="number" class="form-control input" value="<?= $value['place_max_restaurant'] ?>" id="place_max_restaurant<?= $value['id_restaurant'] ?>"></td>
                <td><input type="text" class="form-control input" value="<?= $value['prix_restaurant'] ?>" id="prix_restaurant<?= $value['id_restaurant'] ?>"></td>
                <td><input type="text" class="form-control input" value="<?= $value['menu_restaurant'] ?>" id="menu_restaurant<?= $value['id_restaurant'] ?>"></td>
                <td><input type="text" class="form-control input" value="<?= $value['type_restaurant'] ?>" id="type_restaurant<?= $value['id_restaurant'] ?>"></td>
                <td><input type="number" class="form-control input" value="<?= $value['note_moyenne_restaurant'] ?>" id="note_moyenne_restaurant<?= $value['id_restaurant'] ?>"></td>
                <td> <button class="btn btn-outline-primary modifier" id="<?= $value['id_restaurant'] ?>" data-idPlanning="<?= $value['id_planning'] ?>" data-statut="<?= $value['statut_restaurant'] ?>">Update</button></td>
                <td> <button class="btn btn-outline-danger supprimer" id="<?= $value['id_restaurant'] ?>" data-statut="<?= $value['statut_restaurant'] ?>">Delete</button></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>


<h2>Demande d'inscription des restaurateurs</h2>
<table class="table table-striped-columns" id="tableauRestoAValider">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Email</th>
            <th>Mdp</th>
            <th>Adresse</th>
            <th>cp</th>
            <th>ville</th>
            <th>description</th>
            <th>place max</th>
            <th>prix</th>
            <th>menu</th>
            <th>type</th>
            <th>note moyenne</th>
            <th>Validation</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($restoAValider as $value) {
        ?>
            <tr class="rowRestoAValider" id="rowRestoAValider<?= $value['id_restaurant'] ?>">
                <td><input type="text" class="form-control input" value="<?= $value['nom_restaurant'] ?>" id="nom_restaurant<?= $value['id_restaurant'] ?>"></td>
                <td><input type="text" class="form-control input" value="<?= $value['email_restaurant'] ?>" id="email_restaurant<?= $value['id_restaurant'] ?>"></td>
                <td><input type="text" class="form-control input" value="<?= $value['password_restaurant'] ?>" id="password_restaurant<?= $value['id_restaurant'] ?>"></td>
                <td><input type="text" class="form-control input" value="<?= $value['adresse_restaurant'] ?>" id="adresse_restaurant<?= $value['id_restaurant'] ?>"></td>
                <td><input type="text" class="form-control input" value="<?= $value['cp_restaurant'] ?>" id="cp_restaurant<?= $value['id_restaurant'] ?>"></td>
                <td><input type="text" class="form-control input" value="<?= $value['ville_restaurant'] ?>" id="ville_restaurant<?= $value['id_restaurant'] ?>"></td>
                <td><input type="text" class="form-control input" value="<?= $value['description_restaurant'] ?>" id="description_restaurant<?= $value['id_restaurant'] ?>"></td>
                <td><input type="number" class="form-control input" value="<?= $value['place_max_restaurant'] ?>" id="place_max_restaurant<?= $value['id_restaurant'] ?>"></td>
                <td><input type="text" class="form-control input" value="<?= $value['prix_restaurant'] ?>" id="prix_restaurant<?= $value['id_restaurant'] ?>"></td>
                <td><input type="text" class="form-control input" value="<?= $value['menu_restaurant'] ?>" id="menu_restaurant<?= $value['id_restaurant'] ?>"></td>
                <td><input type="text" class="form-control input" value="<?= $value['type_restaurant'] ?>" id="type_restaurant<?= $value['id_restaurant'] ?>"></td>
                <td><input type="number" class="form-control input" value="<?= $value['note_moyenne_restaurant'] ?>" id="note_moyenne_restaurant<?= $value['id_restaurant'] ?>"></td>
                <td><button class="btn btn-outline-success valider" id="<?= $value['id_restaurant'] ?>" data-idPlanning="<?= $value['id_planning'] ?>">Valider</button></td>
                <td><button class="btn btn-outline-primary modifier" id="<?= $value['id_restaurant'] ?>" data-idPlanning="<?= $value['id_planning'] ?>" data-statut="<?= $value['statut_restaurant'] ?>">Update</button></td>
                <td><button class="btn btn-outline-danger supprimer" id="<?= $value['id_restaurant'] ?>" data-statut="<?= $value['statut_restaurant'] ?>">Delete</button></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>