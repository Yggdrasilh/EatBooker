<?php

namespace App\Models;

use Exception;
use App\Core\DbConnect;
use App\Entities\Note;

class NoteModel extends Dbconnect
{

    function findAll()
    {
        $this->request = "SELECT * FROM note";
        $result = $this->_connect->query($this->request);
        $liste = $result->fetchAll();

        return $liste;
    }

    function findOne($id)
    {
        $request = $this->_connect->prepare("SELECT * FROM note Where id_note = ?");
        $request->execute(array($id));
        $liste = $request->fetch();

        return $liste;
    }


    function create(Note $note)
    {
        $request = $this->_connect->prepare("INSERT INTO `note`(`note_note`, `id_user`, `id_restaurant`) VALUES (?,?,?)");
        $request->execute(array($note->getNote_note(), $note->getId_user(), $note->getId_restaurant()));
    }

    function delete($id)
    {
        $request = $this->_connect->prepare("DELETE FROM `note` WHERE id_note = ?");
        $request->execute(array($id));
    }

    function update(Note $note, $id)
    {
        $request = $this->_connect->prepare("UPDATE `note` SET `note_note`=?,`id_user`=?,`id_restaurant`=? WHERE id_note = ?");
        $request->execute(array($note->getNote_note(), $note->getId_user(), $note->getId_restaurant(), $id));
    }
}
