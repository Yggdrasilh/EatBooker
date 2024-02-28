<?php

namespace App\Models;

use Exception;
use App\Core\DbConnect;
use App\Entities\Favori;

class FavoriModel extends Dbconnect
{

    function findAll()
    {
        $this->request = "SELECT * FROM favori";
        $result = $this->_connect->query($this->request);
        $liste = $result->fetchAll();

        return $liste;
    }

    function findOne($id)
    {
        $request = $this->_connect->prepare("SELECT * FROM favori Where id_favori = ?");
        $request->execute(array($id));
        $liste = $request->fetch();

        return $liste;
    }


    function create(Favori $favori)
    {
        $request = $this->_connect->prepare("INSERT INTO `favori`(`id_user`, `id_restaurant`) VALUES (?,?)");
        $request->execute(array($favori->getId_user(), $favori->getId_restaurant()));
    }

    function delete($id)
    {
        $request = $this->_connect->prepare("DELETE FROM `favori` WHERE id_favori = ?");
        $request->execute(array($id));
    }

    function update(Favori $favori, $id)
    {
        $request = $this->_connect->prepare("UPDATE `favori` SET `id_user`=?,`id_restaurant`=? WHERE id_favori = ?");
        $request->execute(array($favori->getId_user(), $favori->getId_restaurant(), $id));
    }
}
