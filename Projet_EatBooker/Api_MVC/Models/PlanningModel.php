<?php

namespace App\Models;

use Exception;
use App\Core\DbConnect;
use App\Entities\Planning;

class PlanningModel extends Dbconnect
{

    function findAll()
    {
        $this->request = "SELECT * FROM Planning";
        $result = $this->_connect->query($this->request);
        $liste = $result->fetchAll();

        return $liste;
    }

    function findOne(Planning $planning)
    {
        $this->request = "SELECT * FROM Planning WHERE id_planning=:id_planning";
        $result = $this->_connect->query($this->request);
        $result->bindValue(':id_planning', $planning->getId_planning());
        $resultat = $result->execute();

        if ($resultat) {
            // Récupérez les données de la base de données
            $list = $result->fetch();
            // var_dump($list);
            // die;
            return $list;
        } else {
            // Gérer les erreurs en cas d'échec de l'exécution de la requête
            return null;
        }
    }


    function create(Planning $planning)
    {
        $request = $this->_connect->prepare("INSERT INTO planning(lundi_am, lundi_pm, mardi_am, mardi_pm, mercredi_am, mercredi_pm, jeudi_am, jeudi_pm, vendredi_am, vendredi_pm, samedi_am, samedi_pm, dimanche_am, dimanche_pm, id_restaurant) VALUES (:lundi_am, :lundi_pm, :mardi_am, :mardi_pm, :mercredi_am, :mercredi_pm, :jeudi_am, :jeudi_pm, :vendredi_am, :vendredi_pm, :samedi_am, :samedi_pm, :dimanche_am, :dimanche_pm, :id_restaurant)");
        $request->bindValue(':lundi_am', $planning->getLundi_am());
        $request->bindValue(':lundi_pm', $planning->getLundi_pm());
        $request->bindValue(':mardi_am', $planning->getMardi_am());
        $request->bindValue(':mardi_pm', $planning->getMardi_pm());
        $request->bindValue(':mercredi_am', $planning->getMercredi_am());
        $request->bindValue(':mercredi_pm', $planning->getMercredi_pm());
        $request->bindValue(':jeudi_am', $planning->getJeudi_am());
        $request->bindValue(':jeudi_pm', $planning->getJeudi_pm());
        $request->bindValue(':vendredi_am', $planning->getVendredi_am());
        $request->bindValue(':vendredi_pm', $planning->getVendredi_pm());
        $request->bindValue(':samedi_am', $planning->getSamedi_am());
        $request->bindValue(':samedi_pm', $planning->getSamedi_pm());
        $request->bindValue(':dimanche_am', $planning->getDimanche_am());
        $request->bindValue(':dimanche_pm', $planning->getDimanche_pm());
        $request->bindValue(':id_restaurant', $planning->getId_restaurant());
        $request->execute();
    }

    function delete(Planning $planning)
    {
        $request = $this->_connect->prepare("DELETE FROM planning WHERE id_planning = :id_planning");
        $request->bindValue(':id_planning', $planning->getId_planning());
        $request->execute();
    }

    function update(Planning $planning)
    {
        $request = $this->_connect->prepare("UPDATE planning SET lundi_am = :lundi_am, lundi_pm = :lundi_pm, mardi_am=:mardi_am, mardi_pm=:mardi_pm, mercredi_am=:mercredi_am, mercredi_pm=:mercredi_pm, jeudi_am=:jeudi_am, jeudi_pm=:jeudi_pm, vendredi_am=:vendredi_am, vendredi_pm=:vendredi_pm, samedi_am=:samedi_am, samedi_pm=:samedi_pm, dimanche_am=:dimanche_am, dimanche_pm=:dimanche_pm, id_restaurant=:id_restaurant 
        WHERE id_planning =:id_planning");
        $request->bindValue(':lundi_am', $planning->getLundi_am());
        $request->bindValue(':lundi_pm', $planning->getLundi_pm());
        $request->bindValue(':mardi_am', $planning->getMardi_am());
        $request->bindValue(':mardi_pm', $planning->getMardi_pm());
        $request->bindValue(':mercredi_am', $planning->getMercredi_am());
        $request->bindValue(':mercredi_pm', $planning->getMercredi_pm());
        $request->bindValue(':jeudi_am', $planning->getJeudi_am());
        $request->bindValue(':jeudi_pm', $planning->getJeudi_pm());
        $request->bindValue(':vendredi_am', $planning->getVendredi_am());
        $request->bindValue(':vendredi_pm', $planning->getVendredi_pm());
        $request->bindValue(':samedi_am', $planning->getSamedi_am());
        $request->bindValue(':samedi_pm', $planning->getSamedi_pm());
        $request->bindValue(':dimanche_am', $planning->getDimanche_am());
        $request->bindValue(':dimanche_pm', $planning->getDimanche_pm());
        $request->bindValue(':id_restaurant', $planning->getId_restaurant());
        $request->execute();
    }
}
