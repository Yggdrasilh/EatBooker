<?php

use App\Autoloader;
use App\Core\Router;

//On importe les namespaces de l'autoloader et du router.
//On inclut l'autoloader.
include '../Autoloader.php';
Autoloader::register();

// include '../Core/Routeur.php';
// include '../Controllers/Controller.php';
// include '../Controllers/HomeController.php';
// include '../Controllers/CreationController.php';
// include '../Controllers/UserController.php';

$route = new Router();

$route->routes();
