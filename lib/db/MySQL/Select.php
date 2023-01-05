<?php

class Select extends Connection
{
    /**
     * @param $table
     * @param array $params
     * @param $where
     * @param null $whereParam
     * @param null $whereValue
     * @return mixed
     */
    public function execute(
        $table,
        array $params,
        $where = null,
        $whereParam = null,
        $whereValue = null,
    ) {
        $queryString = "SELECT ";

        if ($params[0] == '*') {
            $queryString .= "* FROM $table";
        } else {
            foreach ($params as $param) {
                $queryString .= "`$param`,";
            }

            $queryString = rtrim($queryString, ",") . " FROM $table";
        }

        if ($where && $whereParam && $whereValue) {
            $queryString .= " WHERE `$whereParam` = '$whereValue'";
        }

        $query = self::Conn()->prepare($queryString);
        $query->execute();

        return $query;
    }
}
