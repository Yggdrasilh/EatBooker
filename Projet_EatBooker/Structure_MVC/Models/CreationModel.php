<?php

namespace App\Models;

use Exception;
use App\Core\DbConnect;
use App\Entities\Creation;

class CreationModel extends Dbconnect
{

    function findAll()
    {
        $this->request = "SELECT * FROM Creation";
        $result = $this->_connect->query($this->request);
        $liste = $result->fetchAll();

        return $liste;
    }


    function create(Creation $creation)
    {
        $request = $this->_connect->prepare("INSERT INTO `creation`( `title`, `description`, `created_at`, `picture`) VALUES (?,?,?,?)");
        $request->execute(array($creation->getTitle(), $creation->getDescription(), $creation->getCreated_at(), $creation->getPicture()));
    }

    function supp($id)
    {
        $request = $this->_connect->prepare("DELETE FROM `creation` WHERE id_creation = ?");
        $request->execute(array($id));
    }

    function edit(Creation $creation, $id)
    {
        $request = $this->_connect->prepare("UPDATE `creation` SET `title`=?,`description`=?,`created_at`=?,`picture`=? WHERE id_creation = ?");
        $request->execute(array($creation->getTitle(), $creation->getDescription(), $creation->getCreated_at(), $creation->getPicture(), $id));
    }
}
