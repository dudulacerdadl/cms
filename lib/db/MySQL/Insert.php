<?php

class Insert extends Connection
{
    /**
     * @var mixed
     */
    private $query;

    /**
     * @param string $table
     * @param array  $params
     * @param array  $values
     */
    public function __construct(
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

        $this->setQuery($this->Conn()->prepare($queryString));
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
