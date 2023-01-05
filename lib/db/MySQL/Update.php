<?php

class Update extends Connection
{
    /**
     * @param $table
     * @param $id
     * @param array $params
     * @param array $values
     * @return mixed
     */
    public function execute(
        $table,
        $id,
        array $params,
        array $values
    ) {
        $queryString = "UPDATE `$table` SET ";

        foreach ($params as $key => $param) {
            $queryString .= "`$param` = '" . $values[$key] . "',";
        }

        $queryString = rtrim($queryString, ',') . "WHERE `id` = '$id';";

        $query = self::Conn()->prepare($queryString);
        $query->execute();

        return $query;
    }
}
