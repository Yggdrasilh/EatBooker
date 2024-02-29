<?php

namespace App\Entities;

class Reservation
{

    private $id_reservation;
    private $date_reservation;
    private $heure_reservation;
    private $nb_couvert_reservation;
    private $satut_reservation;
    private $id_restaurant;
    private $id_user;

    /**
     * Get the value of id_reservation
     */
    public function getId_reservation()
    {
        return $this->id_reservation;
    }

    /**
     * Set the value of id_reservation
     *
     * @return  self
     */
    public function setId_reservation($id_reservation)
    {
        $this->id_reservation = $id_reservation;

        return $this;
    }

    /**
     * Get the value of date_reservation
     */
    public function getDate_reservation()
    {
        return $this->date_reservation;
    }

    /**
     * Set the value of date_reservation
     *
     * @return  self
     */
    public function setDate_reservation($date_reservation)
    {
        $this->date_reservation = $date_reservation;

        return $this;
    }

    /**
     * Get the value of heure_reservation
     */
    public function getHeure_reservation()
    {
        return $this->heure_reservation;
    }

    /**
     * Set the value of heure_reservation
     *
     * @return  self
     */
    public function setHeure_reservation($heure_reservation)
    {
        $this->heure_reservation = $heure_reservation;

        return $this;
    }

    /**
     * Get the value of nb_couvert_reservation
     */
    public function getNb_couvert_reservation()
    {
        return $this->nb_couvert_reservation;
    }

    /**
     * Set the value of nb_couvert_reservation
     *
     * @return  self
     */
    public function setNb_couvert_reservation($nb_couvert_reservation)
    {
        $this->nb_couvert_reservation = $nb_couvert_reservation;

        return $this;
    }

    /**
     * Get the value of satut_reservation
     */
    public function getSatut_reservation()
    {
        return $this->satut_reservation;
    }

    /**
     * Set the value of satut_reservation
     *
     * @return  self
     */
    public function setSatut_reservation($satut_reservation)
    {
        $this->satut_reservation = $satut_reservation;

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
}
