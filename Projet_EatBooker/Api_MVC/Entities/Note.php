<?php

namespace App\Entities;

class Note
{

    private $id_note;
    private $note_note;
    private $id_user;
    private $id_restaurant;


    /**
     * Get the value of id_note
     */
    public function getId_note()
    {
        return $this->id_note;
    }

    /**
     * Set the value of id_note
     *
     * @return  self
     */
    public function setId_note($id_note)
    {
        $this->id_note = $id_note;

        return $this;
    }

    /**
     * Get the value of note_note
     */
    public function getNote_note()
    {
        return $this->note_note;
    }

    /**
     * Set the value of note_note
     *
     * @return  self
     */
    public function setNote_note($note_note)
    {
        $this->note_note = $note_note;

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
