<?php
$title = "Supprimer un utilisateur";
?>

<div class="container">
    <div>
        <p>Etes-vous sur de vouloir supprimer cet utilisateur ?</p>
    </div>
    <div>
        <form action="index.php?controller=admin&action=delete&id=<?php echo $_GET['id'] ?>" method="post">
            <button name="supprimer" type="submit" class="btn btn-outline-danger" for="danger-outlined">
                SUPPRIMER
            </button>
        </form>
        <a href="index.php?controller=admin&action=findAll">
            <button type="button" name="non">NON</button>
        </a>
    </div>
</div>
</div>