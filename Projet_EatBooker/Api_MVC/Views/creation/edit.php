<?php

$title = 'Mon portfolio - Création';
?>
<form action="index.php?controller=Creation&action=edit&id=<?= $_GET['id'] ?>" method="post" id="uptdateCreation" enctype='multipart/form-data'>
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Titre</span>
        <input type="text" class="form-control" value=" <?= $titleArticle ?>" aria-label="Username" aria-describedby="basic-addon1" name='title'>
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text">Description</span>
        <textarea class="form-control" aria-label="With textarea" name='description'><?= $desc ?></textarea>
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Date</span>
        <input type="timestamp" readonly min="2023-01-01" max="2024-12-31" class="form-control" value="<?= $dateCreation ?>" aria-label="Username" aria-describedby="basic-addon1" name='date' required>
    </div>

    <div class="input-group mb-3">
        <label class="input-group-text" for="inputGroupFile01">Choisir une image</label>
        <input type="file" class="form-control" value="<?= $photo ?>" id="inputGroupFile01" name="image">
    </div>

    <input type="hidden" name="token" id="token" value="<?php echo (isset($_SESSION['token'])) ? $_SESSION['token'] : NULL; ?>">

    <input class="btn btn-primary" type="submit" value="Modifier" id="uptdateSubmit" name="uptdatSubmit">
</form>