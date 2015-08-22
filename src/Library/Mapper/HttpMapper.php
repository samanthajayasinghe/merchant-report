<?php
namespace Library\Mapper;

use GuzzleHttp\Client;

class HttpMapper extends BaseMapper{

    /**
     * @var Client
     */
    private $httpClient = null;

    /**
     * @param Client $httpClient
     */
    public function __construct(Client $httpClient)
    {
        $this->setHttpClient($httpClient);
    }

    /**
     * @param string $query
     * @param array $parameters
     * @return mixed
     */
    protected function query($query, array $parameters)
    {
        return $this->getHttpClient()->get($query, $parameters);
    }

    /**
     * @param array $parameters
     * @return string
     */
    protected function prepareQuery(array $parameters)
    {
        // TODO: Implement prepareQuery() method.
    }

    /**
     * @return Client
     */
    public function getHttpClient()
    {
        return $this->httpClient;
    }

    /**
     * @param Client $httpClient
     * @return $this
     */
    private function setHttpClient($httpClient)
    {
        $this->httpClient = $httpClient;
        return $this;
    }
} 
