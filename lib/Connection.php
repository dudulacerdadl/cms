<?php

require_once ROOT . '/lib/Env.php';

class Connection
{
    public static function Conn()
    {
        $env = new \Env();
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

    public static function ConnSqlite()
    {
        $env = new Env();
        $env = $env->getVariables();

        try {
            return new PDO('sqlite:'.ROOT.'/Resource/db/Banco.db');
        } catch (PDOException $pe) {
            die("Não foi possível se conectar ao banco de dados ".$env['DBNAME']." :" . $pe->getMessage());
        }
    }
}
