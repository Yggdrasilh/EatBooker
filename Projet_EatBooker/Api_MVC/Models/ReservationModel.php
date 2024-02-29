<?php

namespace App\Models;

use Exception;
use App\Core\DbConnect;
use App\Entities\Reservation;

class ReservationModel extends Dbconnect
{

    function findAll()
    {
        $this->request = "SELECT * FROM reservation";
        $result = $this->_connect->query($this->request);
        $liste = $result->fetchAll();

        return $liste;
    }

    function findOne($id)
    {
        $request = $this->_connect->prepare("SELECT * FROM reservation Where id_reservation = ?");
        $request->execute(array($id));
        $liste = $request->fetch();

        return $liste;
    }


    function create(Reservation $reservation)
    {
        $request = $this->_connect->prepare("INSERT INTO `reservation`(`date_reservation`, `heure_reservation`, `nb_couvert_reservation`, `statut_reservation`, `id_restaurant`, `id_user`) VALUES (?,?,?,?,?,?)");
        $request->execute(array($reservation->getDate_reservation(), $reservation->getHeure_reservation(), $reservation->getNb_couvert_reservation(), $reservation->getSatut_reservation(), $reservation->getId_restaurant(), $reservation->getId_user()));
    }

    function delete($id)
    {
        $request = $this->_connect->prepare("DELETE FROM `reservation` WHERE id_reservation = ?");
        $request->execute(array($id));
    }

    function update(Reservation $reservation, $id)
    {
        $request = $this->_connect->prepare("UPDATE `reservation` SET `date_reservation`=?,`heure_reservation`=?,`nb_couvert_reservation`=?,`statut_reservation`=?, `id_restaurant`=?,`id_user`=? WHERE id_reservation = ?");
        $request->execute(array($reservation->getDate_reservation(), $reservation->getHeure_reservation(), $reservation->getNb_couvert_reservation(), $reservation->getSatut_reservation(), $reservation->getId_restaurant(), $reservation->getId_user(), $id));
    }
}
