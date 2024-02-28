<?php

namespace App\Core;

class Validator
{

    //propriété static pour stocker le nom du fichier généré afin de le récupèrer dans le controller
    static public string $newFileName;

    //Méthode permettant de tester tous les champs $_POST sans distinction. 
    static function validPostGlobal()
    {
        if (!empty($_POST)) {
            foreach ($_POST as $value) {
                if (empty($value) || !isset($post[$value])) {
                    return false;
                }
            }
            return true;
        }
    }


    //Méthode permettant de tester les champs. Les paramètres représentent les valeurs en POST et le nom des champs
    public static function validPostSelect(array $post, array $fields): bool
    {

        // Chaque champ est parcouru
        foreach ($fields as $field) {
            // on teste si les champs sont vides ou non présents
            if (empty($post[$field]) || !isset($post[$field])) {
                return false;
            }
        }
        return true;
    }

    // Méthode permettant de tester les champs. Les paramètres représentent les valeurs en FILES et le nom des champs
    public static function validFilesSelect(array $files, array $fields): bool
    {
        // Chaque champ est parcouru
        foreach ($fields as $field) {
            // on teste si les champs sont déclarés et sans erreur
            if (isset($files[$field]) && $files[$field]['error'] == 0) {
                // on vérifie la taille du fichier
                if ($files[$field]['size'] > 5242880) { // 5 Mo
                    return false;
                }
                // on vérifie le type MIME du fichier
                $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/jpg', 'image/svg', 'image/webp', 'image/pdf'];
                if (!in_array($files[$field]['type'], $allowedTypes)) {
                    return false;
                }
                // on vérifie l'extension du fichier
                $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'svg', 'webp', 'pdf'];
                $fileExtension = strtolower(pathinfo($files[$field]['name'], PATHINFO_EXTENSION));
                if (!in_array($fileExtension, $allowedExtensions)) {
                    return false;
                }
                // on génère un nouveau nom de fichier unique
                self::$newFileName = md5(uniqid()) . '.' . $fileExtension;
                // on déplace le fichier vers le dossier de destination
                if (!move_uploaded_file($files[$field]['tmp_name'], 'images/' . self::$newFileName)) {
                    return false;
                }
                return true;
            }
        }
        return false;
    }
}
