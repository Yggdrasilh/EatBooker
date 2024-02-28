<?php

namespace App\Core;

class Form
{
    //Attribut contenant le code du formulaire
    private $formElements;



    //Le getter pour lire le contenu de l'attribut $formElements
    public function getFormElements()
    {
        return $this->formElements;
    }

    //Méthode permettant d'ajouter un ou des attributs
    private function addAttributes(array $attributes): string
    {

        $att = "";
        // Chaque attribut est parcouru
        foreach ($attributes as $attribute => $value) {
            // on stocke chaque attribut et sa valeur dans la variable $att. exemple: id = "title"
            $att .= " $attribute=\"$value\"";
        }
        return $att;
    }

    //Méthode permettant de générer la balise ouvrante HTML du formulaire
    public function startForm(string $action = '#', string $method = "POST", array $attributes = []): self
    {
        //on commence la création du formulaire avec l'ouverture de la balise <form> et ses attributs "action","method"
        $this->formElements = "<form action='$action' method='$method'";
        // et ses attributs éventuels
        $this->formElements .= isset($attributes) ? $this->addAttributes($attributes) . ">" : ">";
        return $this;
    }

    //Méthode permettant d'ajouter un label
    public function addLabel(string $for, string $text, array $attributes = []): self
    {
        //on ajoute la balise label et l'attribut "for"
        $this->formElements .= "<label for='$for'";
        $this->formElements .= isset($attributes) ? $this->addAttributes($attributes) . ">" : ">";
        $this->formElements .= "$text</label>";
        return $this;
    }

    //Méthode permettant d'ajouter un champ
    public function addInput(string $type, string $name, array $attributes = []): self
    {
        //on ajoute la balise input et les attributs "type", "name"
        $this->formElements .= "<input type='$type' name='$name'";
        $this->formElements .= isset($attributes) ? $this->addAttributes($attributes) . ">" : ">";
        return $this;
    }

    //Méthode permettant d'ajouter un champ textarea
    public function addTextarea(string $name, string $text = '', array $attributes = []): self
    {
        //on ajoute la balise textarea et l'attribut "name"
        $this->formElements .= "<textarea name='$name'";
        $this->formElements .= isset($attributes) ? $this->addAttributes($attributes) . ">" : ">";
        $this->formElements .= "$text</textarea>";
        return $this;
    }

    //Méthode permettant d'ajouter un champ select
    public function addSelect(string $name, array $options, array $attributes = []): self
    {
        //on ajoute la balise select et l'attribut "name"
        $this->formElements .= "<select name='$name'";
        $this->formElements .= isset($attributes) ? $this->addAttributes($attributes) . ">" : ">";
        //on ajoute la ou les balises options avec sa valeur et son texte
        foreach ($options as $key => $value) {
            $this->formElements .= "<option value='$key'>$value</option>";
        }
        $this->formElements .= "</select>";
        return $this;
    }

    //Méthode permettant de fermer le formulaire
    public function endForm(): self
    {
        $this->formElements .= "</form>";
        return $this;
    }

    //Méthode permettant de tester les champs. Les paramètres représentent les valeurs en POST et le nom des champs
    public static function validatePost(array $post, array $fields): bool
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

    //Méthode permettant de tester les champs. Les paramètres représentent les valeurs en FILES et le nom des champs
    public static function validateFiles(array $files, array $fields): bool
    {

        // Chaque champ est parcouru
        foreach ($fields as $field) {
            // on teste si les champs sont déclarés et sans erreur
            if (isset($files[$field]) && $files[$field]['error'] == 0) {
                return true;
            }
        }
        return false;
    }
}
