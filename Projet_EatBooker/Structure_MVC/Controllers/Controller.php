<?php

namespace App\Controllers;

use App\Core\Validator;
use App\Core\CSRFTokenManager;
use App\Entities\Creation;
use App\Models\CreationModel;


abstract class Controller
{

    protected $baseUrlApi = "";  // Base d'url pour l'API
    protected $baseUrlSite = ""; //base d'url pour le Site



    protected function render(string $path, array $data = [])
    {
        extract($data);

        ob_start();

        include dirname(__DIR__) . '/Views/' . $path . '.php';

        $content = ob_get_clean();

        // On inclu la nav avec le base.php 
        ob_start();
        include dirname(__DIR__) . '/Views/nav.php';
        $nav = ob_get_clean();

        include dirname(__DIR__) . '/Views/base.php';
    }

    // public function redirectedToRoute($controller, $action, $param = "")
    // {

    //     header('HTTP/1.0 301 Moved Permanently');
    //     header('Location: index.php?controller=' . $controller . '&action=' . $action . "&message=" . $param);
    //     header('Connection: close');

    //     die();
    // }
    /** Pour empécher attaque XSS et un peut plus de fonctionnalité **/

    protected function protected_values($values)
    {
        $values = trim($values);
        $values = stripslashes($values);
        $values = htmlspecialchars($values, ENT_QUOTES, 'UTF-8');
        return $values;
    }



    /** Contrer une faille CSRF **/

    protected function generation_token()
    {
        //génération du token
        if (!isset($_SESSION['token'])) {
            $_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(32));
            // timestamp pour savoir quand a été créer le token
            $_SESSION['token_time'] = time();
        }
        // else {
        //     unset($_SESSION['token']);
        //     $_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(32));
        // }
    }
}


/**** A mettre dans le fichier de l'action ****/

if (isset($_GET['id']) && isset($_GET['token']) && $_GET['token'] == $_SESSION['token']) {
    $timestamp = time() - (30);
    if ($_SESSION['token_time'] >= $timestamp) {
        // l'action le text...
    }
} else {
    // autre texte, message d'erreur ou action...
}
