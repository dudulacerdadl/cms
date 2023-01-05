<?php

class Insert extends Connection
{
    /**
     * @param $table
     * @param array $params
     * @param array $values
     * @return mixed
     */
    public function execute(
        $table,
        array $params,
        array $values
    ) {
        $queryString = "INSERT INTO `$table` (";

        foreach ($params as $param) {
            $queryString .= "`$param`,";
        }

        $queryString = rtrim($queryString, ",") . ") VALUES (";

        foreach ($values as $value) {
            $queryString .= "'$value',";
        }

        $queryString = rtrim($queryString, ',') . ");";

        $query = self::Conn()->prepare($queryString);
        $query->execute();

        return $query;
    }
}
