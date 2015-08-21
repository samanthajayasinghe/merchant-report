<?php
namespace Library\Mapper;

use \PDO;

class DbMapper extends BaseMapper
{
    /**
     * @param PDO $dbHandler
     */
    public function __construct(PDO $dbHandler)
    {
        $this->setDbHandler($dbHandler);
    }
    /**
     * @var PDO
     */
    private $dbHandler = null;

    /**
     * @param string $query
     * @param array $parameters
     * @return mixed
     */
    protected function query($query, array $parameters)
    {
        $statement = $this->getDbHandler()->prepare($query, $parameters);
        return $this->getDbHandler()->query($statement);
    }

    /**
     * @param array $parameters
     * @return string
     */
    protected function prepareQuery(array $parameters)
    {
        return $parameters;
    }

    /**
     * @return PDO
     */
    public function getDbHandler()
    {
        return $this->dbHandler;
    }

    /**
     * @param PDO $dbHandler
     * @return $this
     */
    private function setDbHandler(PDO $dbHandler)
    {
        $this->dbHandler = $dbHandler;
        return $this;
    }

} 
