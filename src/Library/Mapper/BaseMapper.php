<?php
namespace Library\Mapper;

abstract class BaseMapper
{
    /**
     * @param string $query
     * @param array $parameters
     * @return mixed
     */
    public function execute($query, array $parameters){
        return $this->query(
            $this->prepareQuery($parameters),
            $parameters
        );
    }

    /**
     * @param string $query
     * @param array $parameters
     * @return mixed
     */
    abstract protected function query($query, array $parameters);

    /**
     * @param array $parameters
     * @return string
     */
    abstract protected function prepareQuery(array $parameters);

} 
