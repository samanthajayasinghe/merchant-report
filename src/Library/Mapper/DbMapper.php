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
        $query = $this->getDbHandler()->prepare($query);
        $query->execute($parameters);
        return $query->fetchAll();
    }

    /**
     * @param array $result
     * @return array
     */
    protected function formatResult($result){
        return $result;
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
