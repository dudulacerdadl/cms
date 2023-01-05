<?php

class Select extends Connection
{
    /**
     * @var mixed
     */
    private $query;

    /**
     * @param $table
     * @param array $params
     * @param $where
     * @param array $whereParams
     * @param array $whereValues
     * @return null
     */
    public function __construct(
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
            $queryString .= " WHERE $whereParam = $whereValue";
        }

        $this->setQuery(self::Conn()->prepare($queryString));
    }

    /**
     * @return mixed
     */
    public function execute()
    {
        return $this->getQuery()->execute();
    }

    /**
     * @return mixed
     */
    public function getQuery()
    {
        return $this->query;
    }

    /**
     * @param  mixed  $query
     * @return self
     */
    public function setQuery($query)
    {
        $this->query = $query;
        return $this;
    }
}
