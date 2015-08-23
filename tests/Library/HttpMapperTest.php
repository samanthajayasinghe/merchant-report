<?php

use Library\Mapper\HttpMapper;
use GuzzleHttp\Client;

class HttpMapperTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var HttpMapper
     */
    private $httpMapper = null;

    protected function setup()
    {
        $this->httpMapper = new HttpMapper($this->getHttpClientStub());
    }

    public function testGetHttpClient()
    {

        $result = $this->httpMapper->getHttpClient();
        $this->assertInstanceOf('GuzzleHttp\Client', $result);
    }

    /**
     * @return Client
     */
    private function getHttpClientStub()
    {
        return $this->getMock('GuzzleHttp\Client', array('get'), array(), '', false);
    }

} 
