<?php

require_once ROOT . '/lib/Env.php';
require_once ROOT . '/lib/db/MySQL/Delete.php';
require_once ROOT . '/lib/db/MySQL/Insert.php';
require_once ROOT . '/lib/db/MySQL/Select.php';
require_once ROOT . '/lib/db/MySQL/Update.php';

class Connection
{
    public static function Conn()
    {
        $env = new \Env();
        $env = $env->getVariables();

        try {
            return new PDO(
                "mysql:host=" . $env['HOST'] . ";dbname=" . $env['DBNAME'],
                $env['USERNAME'],
                $env['PASSWORD']
            );
        } catch (PDOException $pe) {
            die("Não foi possível se conectar ao banco de dados " . $env['DBNAME'] . " :" . $pe->getMessage());
        }
    }

    public static function ConnSqlite()
    {
        $env = new Env();
        $env = $env->getVariables();

        try {
            return new PDO('sqlite:' . ROOT . '/Resource/db/Banco.db');
        } catch (PDOException $pe) {
            die("Não foi possível se conectar ao banco de dados " . $env['DBNAME'] . " :" . $pe->getMessage());
        }
    }

    /**
     * @param $name
     * @param array   $params
     */
    public static function operation(
        $name,
        array $params
    ) {
        switch (strtolower($name)) {
            case 'delete':
                return new \Delete(
                    $params['table'],
                    $params['id'],
                );
            case 'insert':
                return new \Insert(
                    $params['table'],
                    $params['params'],
                    $params['values'],
                );
            case 'select':
                return new \Select(
                    $params['table'],
                    $params['params'],
                    $params['where'],
                    $params['whereParams'],
                    $params['whereValues']
                );
            case 'update':
                return new \Update(
                    $params['table'],
                    $params['id'],
                    $params['params'],
                    $params['values']
                );
            default:
                throw new Exception("Operation invalid");
        }
    }
}
