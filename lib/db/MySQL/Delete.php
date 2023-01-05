<?php

class Delete extends Connection
{
    /**
     * @param $table
     * @param $id
     * @return mixed
     */
    public function execute(
        $table,
        $id
    ) {
        $query = self::Conn()->prepare(
            "DELETE FROM `$table` "
            . "WHERE `id` = '" . $id . "';"
        );
        $query->execute();

        return $query;
    }
}
