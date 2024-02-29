<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <!-- lien bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- lien feuille de style -->

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="styleJu.css">
    <link rel="stylesheet" href="styleSim.css">





    <!--  liens font awesome et google fonts -->
    <script src="https://kit.fontawesome.com/cff33ecd93.js" crossorigin="anonymous"></script>
    <script src="https://fonts.google.com/specimen/Libre+Baskerville?query=libre"></script>
</head>

<body>
    <div id="wrapper">

        <!---------- STRUCTURE HEADER --------------------- -->
        <header id="header_sans_nav" class="row">


            <div id="header_logo_connexion">


                <!-- logo ATTENTION MODIFIER LE LIEN ajout lien vers accueil-->
                <a href="#"><img src="../public/images/logoSansFond.png" alt="logo eat booker" id="logo_header"></a>

                <div id="header_connexion">

                    <!--bouton connexion restaurateur ATTENTION CHANGER LE LIEN mettre lien vers formulaire de connexion restaurant-->
                    <a href="#" id="connexion_restaurant">
                        <button type="button" class="btn btn-light" id="connexion_restaurant">
                            <p class="text_button">Inscrire Mon Restaurant</p>
                        </button>
                    </a>


                    <!--bouton inscription/connexion user et admin ATTENTION CHANGER LE LIEN mettre lien vers formulaire de connexion -->
                    <a href="#" id="connexion_user">
                        <button type="button" class="btn btn-light" id="connexion_user">
                            <p class="text_button">Connexion/Inscription</p>
                        </button>
                    </a>
                </div>

            </div>



        </header>
        <!-- ------------FIN HEADER---------------------- -->



        <!-- NAVIGATION CONDITIONNEE EN FONCTION DU ROLE - VOIR nav.php pour la structure -->
        <nav id='navigation'>

            <?php

            $navigation = isset($_SESSION['id_user']) ? $nav : '';

            echo $navigation;
            ?> <!-- menu burger pour mobile media queries 480px -->
        </nav>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" id="menu-icon">
            <path fill="#313131" d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z" />
        </svg>


        <!-- ---------------------------------FIN NAVIGATION--------------------------------------------------------- -->



        <main>
            <?= $content ?>
        </main>




        <!---------- STRUCTURE FOOTER --------------------- -->
        <footer id="footer">

            <!-- colonne gauche footer - ATTENTION MODIFIER LES LIENS -->
            <ul id="colonne_gauche_footer" class="colonne_footer">
                <li class="menu_footer">
                    <a href="#" class="lien_menu_footer">Page Contact</a>
                </li>
                <li class="menu_footer">
                    <a href="#" class="lien_menu_footer">Plan du site</a>
                </li>

            </ul>

            <!-- colonne milieu footer - ATTENTION MODIFIER LES LIENS - reprendre lien bouton header -->
            <ul id="colonne_milieu_footer" class="colonne_footer">
                <li class="menu_footer">
                    <a href="#" class="lien_menu_footer">Inscrire Mon Restaurant</a>
                </li>
                <li class="menu_footer">
                    <a href="#" class="lien_menu_footer">Vous souhaitez réserver</a>
                </li>

            </ul>

            <!-- colonne droite footer - ATTENTION MODIFIER LES LIENS -->
            <ul id="colonne_droite_footer" class="colonne_footer">

                <li class="menu_footer">
                    <a href="#" class="lien_menu_footer">Mentions Légales</a>
                </li>
                <li class="menu_footer">
                    <a href="#" class="lien_menu_footer">Politique de Confidentialité</a>
                </li>

                <li class="menu_footer">
                    EatBooker Copyright 2024
                </li>
            </ul>

        </footer>


        <!---------- FIN FOOTER --------------------- -->







    </div>
    <!-- ----- FIN DE WRAPPER------------ -->


    <!-- CONNEXION FICHIER SCRIPT.JS DANS DOSSIER JS -->
    <script src="js/scripts.js"></script>

    <!-- CONNEXION js bootstrap -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>