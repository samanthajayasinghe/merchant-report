<?php

namespace Report\Mapper;

use GuzzleHttp\Client;
use Library\Exception\NotFoundException;
use Library\Mapper\HttpMapper;

class CurrencyMapper extends HttpMapper
{

    /**
     * @var string
     */
    protected $url = '';

    /**
     * @var array
     */
    protected $parameters = [];

    /**
     * @param Client $httpClient
     * @param $url
     * @param $parameters
     */
    public function __construct(Client $httpClient, $url, $parameters)
    {
        parent::__construct($httpClient);
        $this->setUrl($url)
            ->setParameters($parameters);
    }

    /**
     * @return array
     */
    public function loadCurrency()
    {
        return $this->load($this->getUrl(), $this->getParameters());
    }

    /**
     * @param array $result
     * @return array
     * @throws NotFoundException
     */
    protected function formatResult($result)
    {
        $result = parent::formatResult($result);
        if(!isset($result['rates'])){
            throw new NotFoundException('Rates Not Found');
        }
        return $result['rates'];
    }


    /**
     * @return array
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * @param array $parameters
     * @return $this;
     */
    private function setParameters($parameters)
    {
        $this->parameters = $parameters;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return $this;
     */
    private function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }
} 
