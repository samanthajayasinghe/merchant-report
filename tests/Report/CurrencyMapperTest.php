<?php

use Report\Mapper\CurrencyMapper;
use GuzzleHttp\Client;

class CurrencyMapperTest extends PHPUnit_Framework_TestCase
{

    /**
     * @var CurrencyMapper
     */
    private $currencyMapper = null;

    private $apiUrl = 'https://openexchangerates.org/api/latest.json';

    private $apiParam = ['app_id' => '6c3aa6502c374978996b0642547f879b'];

    private $apiExpectedResult = ['rates' => ['USD' => 1.01, 'GBP' => 1.23]];

    protected function setup()
    {
        $this->currencyMapper = new CurrencyMapper(
            $this->getHttpClientStub(),
            $this->apiUrl,
            $this->apiParam
        );
    }

    public function testLoadCurrency()
    {
        $result = $this->currencyMapper->loadCurrency();
        $this->assertEquals($this->apiExpectedResult['rates'], $result);
    }

    /**
     * @return Client
     */
    private function getHttpClientStub()
    {
        $stream = $this->getMock('GuzzleHttp\Psr7\Stream', ['getContents'], [], '', false);
        $stream->expects($this->any())
            ->method('getContents')->willReturn(json_encode($this->apiExpectedResult));

        $response = $this->getMock('GuzzleHttp\Psr7\Response', ['getBody'], [], '', false);
        $response->expects($this->any())
            ->method('getBody')->willReturn($stream);

        $client = $this->getMock('GuzzleHttp\Client', ['get'], [], '', false);
        $client->expects($this->any())
            ->method('get')->willReturn($response);

        return $client;
    }
} 
