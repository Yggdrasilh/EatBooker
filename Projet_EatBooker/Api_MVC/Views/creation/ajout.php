<?php

$title = 'Mon portfolio - Création';
echo $messageError;

echo "coucou";

?>
<form action="index.php?controller=Creation&action=ajout" method="post" id="ajoutCreation" enctype='multipart/form-data'>
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Titre</span>
        <input type="text" class="form-control" placeholder="title" aria-label="Username" aria-describedby="basic-addon1" name='title'>
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text">Description</span>
        <textarea class="form-control" aria-label="With textarea" name='description'></textarea>
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Date</span>
        <input type="date" class="form-control" aria-label="Username" aria-describedby="basic-addon1" name='date'>
    </div>

    <div class="input-group mb-3">
        <label class="input-group-text" for="inputGroupFile01">Choisir une image</label>
        <input type="file" class="form-control" id="inputGroupFile01" name="image">
    </div>

    <input class="btn btn-primary" type="submit" value="Ajouter">
</form>