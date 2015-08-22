<?php

use Library\Mapper\HttpMapper;
use GuzzleHttp\Client;

class HttpMapperTest extends PHPUnit_Framework_TestCase
{
    private $apiExpectedResult = ['currency' => ['USD'=>1.6, 'EUR'=>1.7]];
    private $apiEndPoint = 'api.example.com/currency';

    /**
     * @var HttpMapper
     */
    private $httpMapper = null;

    protected function setup(){
        $this->httpMapper = new HttpMapper($this->getHttpClientStub());
    }

    public function testGetHttpClient()
    {

        $result = $this->httpMapper->getHttpClient();
        $this->assertInstanceOf('GuzzleHttp\Client', $result);
    }

    public function testLoad()
    {
        $result = $this->httpMapper->load($this->apiEndPoint,['id'=>1]);
        $this->assertEquals($this->apiExpectedResult,$result);
    }

    /**
     * @return Client
     */
    private function getHttpClientStub()
    {
        $map = [
            [$this->apiEndPoint, ['id'=>1], $this->apiExpectedResult]
        ];

        $client = $this->getMock('GuzzleHttp\Client', array('get'), array(), '', false);
        $client->expects($this->any())
            ->method('get')->will($this->returnValueMap($map));

        return $client;
    }

} 
