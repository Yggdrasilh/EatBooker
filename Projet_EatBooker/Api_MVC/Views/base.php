<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/cff33ecd93.js" crossorigin="anonymous"></script>
</head>

<body>
    <div id="wrapper" style="margin: 0 auto; width:95%;">
        <header class="row">
            <h1 class="text-center cols-12">Mon Portfolio</h1>
            <nav class="navbar navbar-expand-lg bg-body-tertiary cols-12">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Mon portfolio</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/home">Accueil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?controller=Creation&action=index">Mes création</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?controller=User&action=monCompte">Mon compte</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <main>
            <?= $content ?>
        </main>
        <footer>
            <p class="text-center">Mon portfolio Copyright 2023</p>
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>