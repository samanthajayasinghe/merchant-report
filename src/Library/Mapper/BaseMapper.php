<?php
namespace Library\Mapper;

abstract class BaseMapper
{
    /**
     * @param string $query
     * @param array $parameters
     * @return mixed
     */
    public function load($query, array $parameters){
        return $this->query(
            $query,
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
