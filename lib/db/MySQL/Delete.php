<?php

class Delete extends Connection
{
    /**
     * @var mixed
     */
    private $query;

    /**
     * @param string $table
     * @param string $id
     */
    public function __construct(
        $table,
        $id
    ) {
        $this->setQuery(
            self::Conn()->prepare(
                "DELETE FROM `$table` "
                . "WHERE `id` = '" . $id . "';"
            )
        );
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
