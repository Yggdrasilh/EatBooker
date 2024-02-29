<?php

namespace App\Entities;

class Planning
{
    private $id_planning;
    private $lundi_am;
    private $lundi_pm;
    private $mardi_am;
    private $mardi_pm;
    private $mercredi_am;
    private $mercredi_pm;
    private $jeudi_am;
    private $jeudi_pm;
    private $vendredi_am;
    private $vendredi_pm;
    private $samedi_am;
    private $samedi_pm;
    private $dimanche_am;
    private $dimanche_pm;
    private $id_restaurant;

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

    /**
     * Get the value of lundi_am
     */
    public function getLundi_am()
    {
        return $this->lundi_am;
    }

    /**
     * Set the value of lundi_am
     *
     * @return  self
     */
    public function setLundi_am($lundi_am)
    {
        $this->lundi_am = $lundi_am;

        return $this;
    }

    /**
     * Get the value of lundi_pm
     */
    public function getLundi_pm()
    {
        return $this->lundi_pm;
    }

    /**
     * Set the value of lundi_pm
     *
     * @return  self
     */
    public function setLundi_pm($lundi_pm)
    {
        $this->lundi_pm = $lundi_pm;

        return $this;
    }

    /**
     * Get the value of mardi_am
     */
    public function getMardi_am()
    {
        return $this->mardi_am;
    }

    /**
     * Set the value of mardi_am
     *
     * @return  self
     */
    public function setMardi_am($mardi_am)
    {
        $this->mardi_am = $mardi_am;

        return $this;
    }

    /**
     * Get the value of mardi_pm
     */
    public function getMardi_pm()
    {
        return $this->mardi_pm;
    }

    /**
     * Set the value of mardi_pm
     *
     * @return  self
     */
    public function setMardi_pm($mardi_pm)
    {
        $this->mardi_pm = $mardi_pm;

        return $this;
    }

    /**
     * Get the value of mercredi_am
     */
    public function getMercredi_am()
    {
        return $this->mercredi_am;
    }

    /**
     * Set the value of mercredi_am
     *
     * @return  self
     */
    public function setMercredi_am($mercredi_am)
    {
        $this->mercredi_am = $mercredi_am;

        return $this;
    }

    /**
     * Get the value of mercredi_pm
     */
    public function getMercredi_pm()
    {
        return $this->mercredi_pm;
    }

    /**
     * Set the value of mercredi_pm
     *
     * @return  self
     */
    public function setMercredi_pm($mercredi_pm)
    {
        $this->mercredi_pm = $mercredi_pm;

        return $this;
    }

    /**
     * Get the value of jeudi_am
     */
    public function getJeudi_am()
    {
        return $this->jeudi_am;
    }

    /**
     * Set the value of jeudi_am
     *
     * @return  self
     */
    public function setJeudi_am($jeudi_am)
    {
        $this->jeudi_am = $jeudi_am;

        return $this;
    }

    /**
     * Get the value of jeudi_pm
     */
    public function getJeudi_pm()
    {
        return $this->jeudi_pm;
    }

    /**
     * Set the value of jeudi_pm
     *
     * @return  self
     */
    public function setJeudi_pm($jeudi_pm)
    {
        $this->jeudi_pm = $jeudi_pm;

        return $this;
    }

    /**
     * Get the value of vendredi_am
     */
    public function getVendredi_am()
    {
        return $this->vendredi_am;
    }

    /**
     * Set the value of vendredi_am
     *
     * @return  self
     */
    public function setVendredi_am($vendredi_am)
    {
        $this->vendredi_am = $vendredi_am;

        return $this;
    }

    /**
     * Get the value of vendredi_pm
     */
    public function getVendredi_pm()
    {
        return $this->vendredi_pm;
    }

    /**
     * Set the value of vendredi_pm
     *
     * @return  self
     */
    public function setVendredi_pm($vendredi_pm)
    {
        $this->vendredi_pm = $vendredi_pm;

        return $this;
    }

    /**
     * Get the value of samedi_am
     */
    public function getSamedi_am()
    {
        return $this->samedi_am;
    }

    /**
     * Set the value of samedi_am
     *
     * @return  self
     */
    public function setSamedi_am($samedi_am)
    {
        $this->samedi_am = $samedi_am;

        return $this;
    }

    /**
     * Get the value of samedi_pm
     */
    public function getSamedi_pm()
    {
        return $this->samedi_pm;
    }

    /**
     * Set the value of samedi_pm
     *
     * @return  self
     */
    public function setSamedi_pm($samedi_pm)
    {
        $this->samedi_pm = $samedi_pm;

        return $this;
    }

    /**
     * Get the value of dimanche_am
     */
    public function getDimanche_am()
    {
        return $this->dimanche_am;
    }

    /**
     * Set the value of dimanche_am
     *
     * @return  self
     */
    public function setDimanche_am($dimanche_am)
    {
        $this->dimanche_am = $dimanche_am;

        return $this;
    }

    /**
     * Get the value of dimanche_pm
     */
    public function getDimanche_pm()
    {
        return $this->dimanche_pm;
    }

    /**
     * Set the value of dimanche_pm
     *
     * @return  self
     */
    public function setDimanche_pm($dimanche_pm)
    {
        $this->dimanche_pm = $dimanche_pm;

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
