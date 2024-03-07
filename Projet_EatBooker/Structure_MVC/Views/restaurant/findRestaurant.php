<?php

$title = 'Trouver un restaurant';

$apiUrl = $this->baseUrlApi . '/restaurant';
$apiData = file_get_contents($apiUrl);
$restaurantData = json_decode($apiData, true);

?>

<h1>Trouver votre restaurant</h1>

<!-- formulaire pour trouver un restaurant en selectionnant une ville -->

<form action="index.php?controller=restaurant&action=findRestaurant" method="POST" class="formulaire_v">

    <label for="ville">Sélectionnez votre ville :</label>

    <select name="ville" id="ville">
        <option value="">Choisissez une option</option>
        <?php
        // Créer un tableau pour stocker les villes uniques
        $villes = [];

        // Parcourir les restaurants pour collecter les villes uniques
        foreach ($restaurantData['restaurant'] as $restaurant) {
            $ville = $restaurant['ville_restaurant'];
            // Vérifier si la ville n'est pas déjà dans le tableau
            if (!in_array($ville, $villes)) {
                // Ajouter la ville au tableau des villes uniques
                $villes[] = $ville;
                // Générer l'option pour la ville
                echo "<option value='$ville'>$ville</option>";
            }
        }

        // if (!in_array($ville, $villes)) { ... }: Cette condition vérifie si le nom de la ville actuelle ($ville)
        //  n'existe pas déjà dans le tableau $villes. in_array() est une fonction PHP qui vérifie si une valeur existe dans un tableau. 
        // Si la ville n'est pas déjà dans le tableau $villes, cela signifie qu'elle est unique.
        // $villes[] = $ville;: Si la ville est unique, elle est ajoutée au tableau $villes à l'aide de
        //  la syntaxe des crochets []. Cela ajoute la ville à la fin du tableau.

        ?>
    </select>


    <div class="boutons">
        <button type="submit" class="" name="soumettre">Soumettre</button>
    </div>

</form>


<!-- formulaire pour choisir un type de restaurant -->
<form action="index.php?controller=restaurant&action=findRestaurant" method="POST" class="formulaire_v">

    <label for="type">Quel type de restaurant souhaitez-vous ?</label>

    <select name="type" id="type">
        <option value="">Choisissez votre type de restaurant</option>
        <?php
        // Créer un tableau pour stocker les villes uniques
        $type = [];

        // Parcourir les restaurants pour collecter les villes uniques
        foreach ($restaurantData['restaurant'] as $restaurant) {
            $type = $restaurant['type_restaurant'];
            // Vérifier si la ville n'est pas déjà dans le tableau
            if (!in_array($type, $types)) {
                // Ajouter la ville au tableau des villes uniques
                $types[] = $type;
                // Générer l'option pour la ville
                echo "<option value='$type'>$type</option>";
            }
        }

        // if (!in_array($ville, $villes)) { ... }: Cette condition vérifie si le nom de la ville actuelle ($ville)
        //  n'existe pas déjà dans le tableau $villes. in_array() est une fonction PHP qui vérifie si une valeur existe dans un tableau. 
        // Si la ville n'est pas déjà dans le tableau $villes, cela signifie qu'elle est unique.
        // $villes[] = $ville;: Si la ville est unique, elle est ajoutée au tableau $villes à l'aide de
        //  la syntaxe des crochets []. Cela ajoute la ville à la fin du tableau.

        ?>
    </select>


    <div class="boutons">
        <button type="submit" class="" name="soumettre">Soumettre</button>
    </div>

</form>



<div class="les_restos" id="resto_mieux">

    <?php
    foreach ($restaurantData['restaurant'] as $restaurant) {
        if ($restaurant['ville_restaurant'] == $_POST["ville"]) {
    ?>

            <div id="tous_restos" class="card card-container" style="width: 13rem;">
                <img src="images/imageAccueil.png" class="card-img-top" alt="image du restaurant">
                <div class="card-body">
                    <h5 class="card-title"><?= $restaurant['type_restaurant'] ?> </h5>
                    <p class="card-text"><?= $restaurant['note_moyenne_restaurant'] ?>/5</p>
                    <h3 class="card-title"><?= $restaurant['nom_restaurant'] ?></h3>
                    <p class="card-text"><?= $restaurant['ville_restaurant'] ?></p>
                    <p class="card-text">20-35€</p>
                    <a href="index.php?controller=restaurant&action=find&id=<?= $restaurant['id_restaurant'] ?>" class="btn btn-primary btn-reserver" id="btn_reserver">Réserver</a>
                </div>
            </div>

    <?php
        }
    }
    ?>
</div>


<div id="resto_mieux">
    <?php
    foreach ($restaurantData['restaurant'] as $restaurant) {
        if ($restaurant['type_restaurant'] == $_POST["type"]) {
    ?>

            <div id="tous_restos" class="card card-container" style="width: 13rem;">
                <img src="images/imageAccueil.png" class="card-img-top" alt="image du restaurant">
                <div class="card-body">
                    <h5 class="card-title"><?= $restaurant['type_restaurant'] ?> </h5>
                    <p class="card-text"><?= $restaurant['note_moyenne_restaurant'] ?>/5</p>
                    <h3 class="card-title"><?= $restaurant['nom_restaurant'] ?></h3>
                    <p class="card-text"><?= $restaurant['ville_restaurant'] ?></p>
                    <p class="card-text">20-35€</p>
                    <a href="index.php?controller=restaurant&action=find&id=<?= $restaurant['id_restaurant'] ?>" class="btn btn-primary btn-reserver" id="btn_reserver">Réserver</a>
                </div>
            </div>

    <?php
        }
    }
    ?>
</div>