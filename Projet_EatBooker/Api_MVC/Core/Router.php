<?php

namespace App\Core;


class Router
{

    public function routes()
    {
        session_start();
        $controller = (isset($_GET['controller']) ? ucfirst(array_shift($_GET)) : 'home');
        $controller = '\\App\\Controllers\\' . $controller . 'Controller';

        $action = (isset($_GET['action']) ? array_shift($_GET) : 'index');
        $controller = new $controller();


        if (method_exists($controller, $action)) {
            // Si $_GET contient des index, on exécute la méthode en passant comme argument les paramètres de $_GET ou alors
            // on exécute la méthode sans argument.
            // on vérifie également que l'accès de la page est bien autoriser à cette utilisateur

            // if ($_SESSION['acces'] ?? false) {

            //     $controller->$action();
            // } elseif ($controller . $action == 'UserControllerinscription') {

            //     $controller->$action();
            // } else {
            //     $controller = 'User' . 'Controller';
            //     $action = 'index';

            //     $controller = new $controller();
            //     $controller->$action();
            // }

            /**************** Ne laisser que sa si l'on veut utiliser les GET dans une API ****************/
            $controller->$action();
        } else {
            // On envoie le code réponse 404
            http_response_code(404);
            echo "La page recherchée n'existe pas";
        }
    }
}
