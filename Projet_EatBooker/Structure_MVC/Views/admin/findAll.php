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
                <td class="uno"><?php echo "<p>" . $user['nom_user'] . "</p>"; ?></td>
                <td class="deux"><?php echo "<p>" . $user['prenom_user'] . "</p>"; ?></td>
                <td class="uno"><?php echo "<p>" . $user['email_user'] . "</p>"; ?></td>
                <td class="deux"><?php echo "<p>" . $user['role_user'] . "</p>"; ?></td>
                <td>
                    <a href="index.php?controller=admin&action=modifier&id_creation=<?php echo $user['id_user']; ?>" class="button">Modifier</a>
                </td>
                <td> <a href="index.php?controller=admin&action=supprimer&id_user=<?php echo $user['id_user']; ?> " class="button">Supprimer</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>

</div>