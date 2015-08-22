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
        return $this->formatResult(
            $this->query($query, $parameters)
        );
    }

    /**
     * @param string $query
     * @param array $parameters
     * @return mixed
     */
    abstract protected function query($query, array $parameters);

    /**
     * @param array $result
     * @return mixed
     */
    abstract protected function formatResult($result);

} 
