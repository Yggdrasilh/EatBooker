<?php

namespace App\Models;

use Exception;
use App\Core\DbConnect;
use App\Entities\User;

class UserModel extends Dbconnect
{

    function findAll()
    {
        $this->request = "SELECT * FROM user";
        $result = $this->_connect->query($this->request);
        $liste = $result->fetchAll();

        return $liste;
    }

    function findOne($id)
    {
        $request = $this->_connect->prepare("SELECT * FROM user Where id_user = ?");
        $request->execute(array($id));
        $liste = $request->fetch();

        return $liste;
    }


    function create(User $user)
    {
        $request = $this->_connect->prepare("INSERT INTO `user`(`nom_user`, `prenom_user`, `email_user`, `password_user`) VALUES (?,?,?,?)");
        $request->execute(array($user->getNom_user(), $user->getPrenom_user(), $user->getEmail_user(), $user->getPassword_user()));
    }

    function delete($id)
    {
        $request = $this->_connect->prepare("DELETE FROM `user` WHERE id_user = ?");
        $request->execute(array($id));
    }

    function update(User $user, $id)
    {
        $request = $this->_connect->prepare("UPDATE `user` SET `nom_user`=?,`prenom_user`=?,`email_user`=?,`password_user`=? WHERE id_user = ?");
        $request->execute(array($user->getNom_user(), $user->getPrenom_user(), $user->getEmail_user(), $user->getPassword_user(), $id));
    }
}
