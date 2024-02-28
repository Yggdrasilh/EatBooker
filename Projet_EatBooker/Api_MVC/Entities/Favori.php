<?php

namespace App\Entities;

class Favori
{

    private $id_favori;
    private $id_user;
    private $id_restaurant;

    /**
     * Get the value of id_favori
     */
    public function getId_favori()
    {
        return $this->id_favori;
    }

    /**
     * Set the value of id_favori
     *
     * @return  self
     */
    public function setId_favori($id_favori)
    {
        $this->id_favori = $id_favori;

        return $this;
    }

    /**
     * Get the value of id_user
     */
    public function getId_user()
    {
        return $this->id_user;
    }

    /**
     * Set the value of id_user
     *
     * @return  self
     */
    public function setId_user($id_user)
    {
        $this->id_user = $id_user;

        return $this;
    }

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
}
