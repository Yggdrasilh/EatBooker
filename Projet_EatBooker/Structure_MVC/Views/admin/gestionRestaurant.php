<?php

$title = "Gestion des restaurants - Administrateur ";
?>

<h2>Liste des Restaurants</h2>
<table class="table table-striped-columns" id="tableauRestoValid">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Email</th>
            <th>Adresse</th>
            <th>cp</th>
            <th>ville</th>
            <th>description</th>
            <th>place_max</th>
            <th>prix</th>
            <th>menu</th>
            <th>type</th>
            <th>note moyenne</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($restoValid as $value) {
        ?>
            <tr class="rowRestoValid" id="<?= $value['id_restaurant'] ?>" data-idPlanning="<?= $value['id_planning'] ?>">
                <td><input type="text" class="form-control input<?= $value['id_restaurant'] ?>" value="<?= $value['nom_restaurant'] ?>" id="nom_restaurant"></td>
                <td><input type="text" class="form-control input<?= $value['id_restaurant'] ?>" value="<?= $value['email_restaurant'] ?>" id="email_restaurant"></td>
                <td><input type="text" class="form-control input<?= $value['id_restaurant'] ?>" value="<?= $value['adresse_restaurant'] ?>" id="adresse_restaurant"></td>
                <td><input type="text" class="form-control input<?= $value['id_restaurant'] ?>" value="<?= $value['cp_restaurant'] ?>" id="cp_restaurant"></td>
                <td><input type="text" class="form-control input<?= $value['id_restaurant'] ?>" value="<?= $value['ville_restaurant'] ?>" id="ville_restaurant"></td>
                <td><input type="text" class="form-control input<?= $value['id_restaurant'] ?>" value="<?= $value['description_restaurant'] ?>" id="description_restaurant"></td>
                <td><input type="number" class="form-control input<?= $value['id_restaurant'] ?>" value="<?= $value['place_max_restaurant'] ?>" id="place_max_restaurant"></td>
                <td><input type="text" class="form-control input<?= $value['id_restaurant'] ?>" value="<?= $value['prix_restaurant'] ?>" id="prix_restaurant"></td>
                <td><input type="text" class="form-control input<?= $value['id_restaurant'] ?>" value="<?= $value['menu_restaurant'] ?>" id="menu_restaurant"></td>
                <td><input type="text" class="form-control input<?= $value['id_restaurant'] ?>" value="<?= $value['type_restaurant'] ?>" id="type_restaurant"></td>
                <td><input type="number" class="form-control input<?= $value['id_restaurant'] ?>" value="<?= $value['note_moyenne_restaurant'] ?>" id="note_moyenne_restaurant"></td>
                <td> <button class="btn btn-primary modifier" id="modif<?= $value['id_restaurant'] ?>">Update</button></td>
                <td> <button class="btn btn-danger supprimer" id="supp<?= $value['id_restaurant'] ?>">Delete</button></td>
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
            <th>Adresse</th>
            <th>cp</th>
            <th>ville</th>
            <th>description</th>
            <th>place_max</th>
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
            <tr class="rowRestoValid" id="<?= $value['id_restaurant'] ?>" data-idPlanning="<?= $value['id_planning'] ?>">
                <td><input type="text" class="form-control input<?= $value['id_restaurant'] ?>" value="<?= $value['nom_restaurant'] ?>" id="nom_restaurant"></td>
                <td><input type="text" class="form-control input<?= $value['id_restaurant'] ?>" value="<?= $value['email_restaurant'] ?>" id="email_restaurant"></td>
                <td><input type="text" class="form-control input<?= $value['id_restaurant'] ?>" value="<?= $value['adresse_restaurant'] ?>" id="adresse_restaurant"></td>
                <td><input type="text" class="form-control input<?= $value['id_restaurant'] ?>" value="<?= $value['cp_restaurant'] ?>" id="cp_restaurant"></td>
                <td><input type="text" class="form-control input<?= $value['id_restaurant'] ?>" value="<?= $value['ville_restaurant'] ?>" id="ville_restaurant"></td>
                <td><input type="text" class="form-control input<?= $value['id_restaurant'] ?>" value="<?= $value['description_restaurant'] ?>" id="description_restaurant"></td>
                <td><input type="number" class="form-control input<?= $value['id_restaurant'] ?>" value="<?= $value['place_max_restaurant'] ?>" id="place_max_restaurant"></td>
                <td><input type="text" class="form-control input<?= $value['id_restaurant'] ?>" value="<?= $value['prix_restaurant'] ?>" id="prix_restaurant"></td>
                <td><input type="text" class="form-control input<?= $value['id_restaurant'] ?>" value="<?= $value['menu_restaurant'] ?>" id="menu_restaurant"></td>
                <td><input type="text" class="form-control input<?= $value['id_restaurant'] ?>" value="<?= $value['type_restaurant'] ?>" id="type_restaurant"></td>
                <td><input type="number" class="form-control input<?= $value['id_restaurant'] ?>" value="<?= $value['note_moyenne_restaurant'] ?>" id="note_moyenne_restaurant"></td>
                <td><button class="btn btn-success valider" id="modif<?= $value['id_restaurant'] ?>">Valider</button></td>
                <td><button class="btn btn-primary modifier" id="modif<?= $value['id_restaurant'] ?>">Update</button></td>
                <td><button class="btn btn-danger supprimer" id="supp<?= $value['id_restaurant'] ?>">Delete</button></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>