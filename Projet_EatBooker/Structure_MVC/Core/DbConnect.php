<?php

namespace App\Core;

use PDO;
use Exception;

class Dbconnect
{
    protected $_connect;
    protected $request;

    const SERVER = "localhost";
    const USER = "";
    const PASSWORD = "";
    const BASE = "";

    public function __construct()
    {

        try {
            $this->_connect = new PDO("mysql:host=" . self::SERVER . ";dbname=" . self::BASE, self::USER, self::PASSWORD);
            $this->_connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->_connect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            $this->_connect->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES utf8");
        } catch (Exception $e) {
            die("Erreur : " . $e->getMessage());
        }
    }
}
