<?php

namespace App\Models;

use Exception;
use App\Core\DbConnect;
use App\Entities\Comments;

class CommentsModel extends Dbconnect
{

    function findAll()
    {
        $this->request = "SELECT * FROM comments";
        $result = $this->_connect->query($this->request);
        $liste = $result->fetchAll();

        return $liste;
    }

    function findOne($id)
    {
        $request = $this->_connect->prepare("SELECT * FROM comments Where id_comments = ?");
        $request->execute(array($id));
        $liste = $request->fetch();

        return $liste;
    }


    function create(Comments $comments)
    {
        $request = $this->_connect->prepare("INSERT INTO `comments`(`titre_comments`, `corps_comments`, `reporting_comments`, `id_user`, `id_restaurant`) VALUES (?,?,?,?,?)");
        $request->execute(array($comments->getTitre_comments(), $comments->getCorps_comments(), $comments->getReporting_comments(), $comments->getId_user(), $comments->getId_restaurant()));
    }

    function delete($id)
    {
        $request = $this->_connect->prepare("DELETE FROM `comments` WHERE id_comments = ?");
        $request->execute(array($id));
    }

    function update(Comments $comments, $id)
    {
        $request = $this->_connect->prepare("UPDATE `comments` SET `titre_comments`=?,`corps_comments`=?,`reporting_comments`=?,`id_user`=?,`id_restaurant`=? WHERE id_comments = ?");
        $request->execute(array($comments->getTitre_comments(), $comments->getCorps_comments(), $comments->getReporting_comments(), $comments->getId_user(), $comments->getId_restaurant(), $id));
    }
}
