<?php

namespace Model;

use PDO;
use PDOException;

class Connection
{
    const HOST     = "mysql";
    const DBNAME   = "cms";
    const USERNAME = "root";
    const PASSWORD = "";

    public static function Conn()
    {
        try {
            return new PDO("mysql:host=".self::HOST.";dbname=".self::DBNAME, self::USERNAME, self::PASSWORD);
        } catch (PDOException $pe) {
            die("Não foi possível se conectar ao banco de dados ".self::DBNAME." :" . $pe->getMessage());
        }
    }
}
