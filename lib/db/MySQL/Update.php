<?php

class Update extends Connection
{
    /**
     * @var mixed
     */
    private $query;

    /**
     * @param string $table
     * @param string $id
     * @param array  $params
     * @param array  $values
     */
    public function __construct(
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
