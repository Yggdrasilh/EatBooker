<?php
$title = "Supprimer un utilisateur";
?>

<div class="container">
    <div>
        <p>Etes-vous sur de vouloir supprimer cet utilisateur ?</p>
    </div>
    <div>
        <a href="index.php?controller=admin&action=delete&id_user=<?php echo $_GET['id_user']; ?>">
            <button type="button">OUI</button>
        </a>
        <a href="index.php?controller=admin&action=findAll">
            <button type="button" name="non">NON</button>
        </a>
    </div>
</div>
</div>