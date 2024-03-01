<?php

namespace App\Models;

use Exception;
use App\Core\DbConnect;
use App\Entities\Restaurant;
use PDO;

class RestaurantModel extends Dbconnect
{

    function findAll()
    {
        $this->request = "SELECT * FROM restaurant";
        $result = $this->_connect->query($this->request);
        $liste = $result->fetchAll();

        return $liste;
    }

    function findOne($id)
    { // fixed
        $request = $this->_connect->prepare("SELECT * FROM restaurant WHERE id_restaurant=:id_restaurant");
        $request->bindValue(':id_restaurant', $id, PDO::PARAM_STR);
        $request->execute();
        $list = $request->fetch();

        return $list;
    }


    function create(Restaurant $restaurant)
    {
        $request = $this->_connect->prepare("INSERT INTO restaurant(nom_restaurant, email_restaurant, password_restaurant, adresse_restaurant, cp_restaurant, ville_restaurant, description_restaurant, place_max_restaurant, prix_restaurant, menu_restaurant, type_restaurant, note_moyenne_restaurant, id_planning) VALUES (:nom_restaurant, :email_restaurant, :password_restaurant, :adresse_restaurant, :cp_restaurant, :ville_restaurant, :description_restaurant, :place_max_restaurant, :prix_restaurant, :menu_restaurant, :type_restaurant, :note_moyenne_restaurant, :id_planning)");
        $request->bindValue(':nom_restaurant', $restaurant->getNom_restaurant());
        $request->bindValue(':email_restaurant', $restaurant->getEmail_restaurant());
        $request->bindValue(':password_restaurant', $restaurant->getPassword_restaurant());
        $request->bindValue(':adresse_restaurant', $restaurant->getAdresse_restaurant());
        $request->bindValue(':cp_restaurant', $restaurant->getCp_restaurant());
        $request->bindValue(':ville_restaurant', $restaurant->getVille_restaurant());
        $request->bindValue(':description_restaurant', $restaurant->getDescription_restaurant());
        $request->bindValue(':place_max_restaurant', $restaurant->getPlace_max_restaurant());
        $request->bindValue(':prix_restaurant', $restaurant->getPrix_restaurant());
        $request->bindValue(':menu_restaurant', $restaurant->getMenu_restaurant());
        $request->bindValue(':type_restaurant', $restaurant->getType_restaurant());
        $request->bindValue(':note_moyenne_restaurant', $restaurant->getNote_moyenne_restaurant());
        $request->bindValue(':id_planning', $restaurant->getId_planning());

        $request->execute();
    }

    function delete($id)
    {
        $request = $this->_connect->prepare("DELETE FROM restaurant WHERE id_restaurant = :id_restaurant");
        $request->bindValue(':id_restaurant', $id);
        $request->execute();
    }

    function update(Restaurant $restaurant, $id)
    {
        $request = $this->_connect->prepare("UPDATE restaurant SET nom_restaurant = :nom_restaurant, email_restaurant = :email_restaurant,password_restaurant=:password_restaurant, adresse_restaurant=:adresse_restaurant, cp_restaurant=:cp_restaurant, ville_restaurant=:ville_restaurant, description_restaurant=:description_restaurant, place_max_restaurant=:place_max_restaurant, prix_restaurant=:prix_restaurant, menu_restaurant=:menu_restaurant, type_restaurant=:type_restaurant, note_moyenne_restaurant=:note_moyenne_restaurant 
        WHERE id_restaurant =:id_restaurant");
        $request->bindValue(':id_restaurant', $id);
        $request->bindValue(':nom_restaurant', $restaurant->getNom_restaurant());
        $request->bindValue(':email_restaurant', $restaurant->getEmail_restaurant());
        $request->bindValue(':password_restaurant', $restaurant->getPassword_restaurant());
        $request->bindValue(':adresse_restaurant', $restaurant->getAdresse_restaurant());
        $request->bindValue(':cp_restaurant', $restaurant->getCp_restaurant());
        $request->bindValue(':ville_restaurant', $restaurant->getVille_restaurant());
        $request->bindValue(':description_restaurant', $restaurant->getDescription_restaurant());
        $request->bindValue(':place_max_restaurant', $restaurant->getPlace_max_restaurant());
        $request->bindValue(':prix_restaurant', $restaurant->getPrix_restaurant());
        $request->bindValue(':menu_restaurant', $restaurant->getMenu_restaurant());
        $request->bindValue(':type_restaurant', $restaurant->getType_restaurant());
        $request->bindValue(':note_moyenne_restaurant', $restaurant->getNote_moyenne_restaurant());
        $request->execute();
    }
}
