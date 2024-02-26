<?php

$title = 'Mon portfolio - Création';

?>
<h1>Liste de mes créations</h1>
<a class="btn btn-primary" href="index.php?controller=Creation&action=ajout" role="button">Ajouter une création</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">created_at</th>
            <th scope="col">picture</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php

        echo "coucou julie la petite olive :)";


        foreach ($list as $key => $value) {

            echo "<tr>
            <th scope='row'>$value->id_creation</th>
            <td>$value->title</td>
            <td>$value->description</td>
            <td>$value->created_at</td>
            <td><img src='$value->picture' id='elementImage'></td>
            <td><a href='index.php?controller=Creation&action=affichage&id=$value->id_creation'><i class='bi bi-eye-fill'></i></a>
                <a href='index.php?controller=Creation&action=edit&id=$value->id_creation'><i class='bi bi-pencil-fill'></i></a>
                <a href='index.php?controller=Creation&action=delate&id=$value->id_creation''><i class='bi bi-trash-fill'></i></a></td>
        </tr>";
        }
        ?>
    </tbody>
</table>