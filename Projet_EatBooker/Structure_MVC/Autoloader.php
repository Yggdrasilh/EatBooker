<?php

namespace App;

class Autoloader
{

    static function register()
    {
        spl_autoload_register([
            __CLASS__,
            "autoload"
        ]);
    }

    static function autoload($class)
    {
        $class = str_replace(__NAMESPACE__ . '\\', '', $class);
        $class = str_replace('\\', '/', $class);
        $fichier = __DIR__ . '/' . $class . '.php';
        if (file_exists($fichier)) {
            include $fichier;
        }
    }
}
