<?php

namespace App\Entities;

class Comments
{

    private $id_comments;
    private $titre_comments;
    private $corps_comments;
    private $reporting_comments;
    private $id_user;
    private $id_restaurant;

    /**
     * Get the value of id_comments
     */
    public function getId_comments()
    {
        return $this->id_comments;
    }

    /**
     * Set the value of id_comments
     *
     * @return  self
     */
    public function setId_comments($id_comments)
    {
        $this->id_comments = $id_comments;

        return $this;
    }

    /**
     * Get the value of titre_comments
     */
    public function getTitre_comments()
    {
        return $this->titre_comments;
    }

    /**
     * Set the value of titre_comments
     *
     * @return  self
     */
    public function setTitre_comments($titre_comments)
    {
        $this->titre_comments = $titre_comments;

        return $this;
    }

    /**
     * Get the value of corps_comments
     */
    public function getCorps_comments()
    {
        return $this->corps_comments;
    }

    /**
     * Set the value of corps_comments
     *
     * @return  self
     */
    public function setCorps_comments($corps_comments)
    {
        $this->corps_comments = $corps_comments;

        return $this;
    }

    /**
     * Get the value of reporting_comments
     */
    public function getReporting_comments()
    {
        return $this->reporting_comments;
    }

    /**
     * Set the value of reporting_comments
     *
     * @return  self
     */
    public function setReporting_comments($reporting_comments)
    {
        $this->reporting_comments = $reporting_comments;

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
