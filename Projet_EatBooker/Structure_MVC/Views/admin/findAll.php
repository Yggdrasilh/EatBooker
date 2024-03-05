<?php
$title = "Liste des utilisateurs";
?>

<div class="container">
    <h1>Liste des Utilisateurs</h1>

    <table class="tableau">
        <thead>
            <tr class="ligne1">
                <th>Nom utilisateur</th>
                <th>Prénom utilisateur</th>
                <th>Email</th>
                <th>Role</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
        </thead>

        <?php
        foreach ($list['user'] as $user) {
        ?>
            <tr>
                <td class="uno"> <input type="text" value="<?php echo $user['nom_user']; ?>" id="nom_user_<?php echo $user['id_user']; ?>">
                </td>
                <td class="deux"><input type="text" value="<?php echo $user['prenom_user']; ?>" id="prenom_user_<?php echo $user['id_user']; ?>"></td>
                <td class="uno"><input type="text" value="<?php echo $user['email_user']; ?>" id="email_user_<?php echo $user['id_user']; ?>"></td>
                <td class="deux"><input type="text" value="<?php echo $user['role_user']; ?>" id="role_user_<?php echo $user['id_user']; ?>"></td>
                <td>
                    <button id="updatebutton" class="button" data-user-id="<?php echo $user['id_user']; ?>">Modifier </button>
                </td>
                <td> <a href=" index.php?controller=admin&action=supprimer&id_user=<?php echo $user['id_user']; ?> " class=" button">Supprimer</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>

</div>