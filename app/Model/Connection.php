<?php

namespace Cms\Model;

use PDO;
use PDOException;

class Connection
{
    public static function Conn()
    {
        $env = new Env();
        $env = $env->getVariables();

        try {
            return new PDO(
                "mysql:host=".$env['HOST'].";dbname=".$env['DBNAME'],
                $env['USERNAME'],
                $env['PASSWORD']
            );
        } catch (PDOException $pe) {
            die("Não foi possível se conectar ao banco de dados ".$env['DBNAME']." :" . $pe->getMessage());
        }
    }
}
