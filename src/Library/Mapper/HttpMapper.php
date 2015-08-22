<?php
namespace Library\Mapper;

use GuzzleHttp\Client;

class HttpMapper extends BaseMapper
{

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
        $response = $this->getHttpClient()->get($query, ['query'=>$parameters]);
        return $response->getBody()->getContents();
    }

    /**
     * @param array $result
     * @return array
     */
    protected function formatResult($result)
    {
        return json_decode($result, true);
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
