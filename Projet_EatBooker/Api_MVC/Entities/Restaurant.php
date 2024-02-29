<?php

namespace App\Entities;

class Restaurant
{
    private $id_restaurant;
    private $nom_restaurant;
    private $email_restaurant;
    private $password_restaurant;
    private $adresse_restaurant;
    private $cp_restaurant;
    private $ville_restaurant;
    private $description_restaurant;
    private $place_max_restaurant;
    private $prix_restaurant;
    private $menu_restaurant;
    private $type_restaurant;
    private $note_moyenne_restaurant;
    private $id_planning;

    /**
     * Get the value of id_restaurant
     */
    public function getId_restaurant()
    {
        return $this->id_restaurant;
    }

    /**
     * Set the value of id_restaurant
     *
     * @return  self
     */
    public function setId_restaurant($id_restaurant)
    {
        $this->id_restaurant = $id_restaurant;

        return $this;
    }

    /**
     * Get the value of nom_restaurant
     */
    public function getNom_restaurant()
    {
        return $this->nom_restaurant;
    }

    /**
     * Set the value of nom_restaurant
     *
     * @return  self
     */
    public function setNom_restaurant($nom_restaurant)
    {
        $this->nom_restaurant = $nom_restaurant;

        return $this;
    }

    /**
     * Get the value of adresse_restaurant
     */
    public function getAdresse_restaurant()
    {
        return $this->adresse_restaurant;
    }

    /**
     * Set the value of adresse_restaurant
     *
     * @return  self
     */
    public function setAdresse_restaurant($adresse_restaurant)
    {
        $this->adresse_restaurant = $adresse_restaurant;

        return $this;
    }

    /**
     * Get the value of cp_restaurant
     */
    public function getCp_restaurant()
    {
        return $this->cp_restaurant;
    }

    /**
     * Set the value of cp_restaurant
     *
     * @return  self
     */
    public function setCp_restaurant($cp_restaurant)
    {
        $this->cp_restaurant = $cp_restaurant;

        return $this;
    }

    /**
     * Get the value of ville_restaurant
     */
    public function getVille_restaurant()
    {
        return $this->ville_restaurant;
    }

    /**
     * Set the value of ville_restaurant
     *
     * @return  self
     */
    public function setVille_restaurant($ville_restaurant)
    {
        $this->ville_restaurant = $ville_restaurant;

        return $this;
    }

    /**
     * Get the value of description_restaurant
     */
    public function getDescription_restaurant()
    {
        return $this->description_restaurant;
    }

    /**
     * Set the value of description_restaurant
     *
     * @return  self
     */
    public function setDescription_restaurant($description_restaurant)
    {
        $this->description_restaurant = $description_restaurant;

        return $this;
    }

    /**
     * Get the value of place_max_restaurant
     */
    public function getPlace_max_restaurant()
    {
        return $this->place_max_restaurant;
    }

    /**
     * Set the value of place_max_restaurant
     *
     * @return  self
     */
    public function setPlace_max_restaurant($place_max_restaurant)
    {
        $this->place_max_restaurant = $place_max_restaurant;

        return $this;
    }

    /**
     * Get the value of prix_restaurant
     */
    public function getPrix_restaurant()
    {
        return $this->prix_restaurant;
    }

    /**
     * Set the value of prix_restaurant
     *
     * @return  self
     */
    public function setPrix_restaurant($prix_restaurant)
    {
        $this->prix_restaurant = $prix_restaurant;

        return $this;
    }

    /**
     * Get the value of menu_restaurant
     */
    public function getMenu_restaurant()
    {
        return $this->menu_restaurant;
    }

    /**
     * Set the value of menu_restaurant
     *
     * @return  self
     */
    public function setMenu_restaurant($menu_restaurant)
    {
        $this->menu_restaurant = $menu_restaurant;

        return $this;
    }

    /**
     * Get the value of type_restaurant
     */
    public function getType_restaurant()
    {
        return $this->type_restaurant;
    }

    /**
     * Set the value of type_restaurant
     *
     * @return  self
     */
    public function setType_restaurant($type_restaurant)
    {
        $this->type_restaurant = $type_restaurant;

        return $this;
    }

    /**
     * Get the value of note_moyenne_restaurant
     */
    public function getNote_moyenne_restaurant()
    {
        return $this->note_moyenne_restaurant;
    }

    /**
     * Set the value of note_moyenne_restaurant
     *
     * @return  self
     */
    public function setNote_moyenne_restaurant($note_moyenne_restaurant)
    {
        $this->note_moyenne_restaurant = $note_moyenne_restaurant;

        return $this;
    }

    /**
     * Get the value of email_restaurant
     */
    public function getEmail_restaurant()
    {
        return $this->email_restaurant;
    }

    /**
     * Set the value of email_restaurant
     *
     * @return  self
     */
    public function setEmail_restaurant($email_restaurant)
    {
        $this->email_restaurant = $email_restaurant;

        return $this;
    }

    /**
     * Get the value of password_restaurant
     */
    public function getPassword_restaurant()
    {
        return $this->password_restaurant;
    }

    /**
     * Set the value of password_restaurant
     *
     * @return  self
     */
    public function setPassword_restaurant($password_restaurant)
    {
        $this->password_restaurant = $password_restaurant;

        return $this;
    }

    /**
     * Get the value of id_planning
     */
    public function getId_planning()
    {
        return $this->id_planning;
    }

    /**
     * Set the value of id_planning
     *
     * @return  self
     */
    public function setId_planning($id_planning)
    {
        $this->id_planning = $id_planning;

        return $this;
    }
}
