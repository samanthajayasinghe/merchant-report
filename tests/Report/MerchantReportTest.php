<?php

use \Report\MerchantReport;
use Pimple\Container;

class MerchantReportTest extends PHPUnit_Framework_TestCase
{


    private $expectedTransaction = [
        ['id' => 1, 'name' => 'm1', 'date' => '2010-01-15 00:00:00', 'amount' => 50, 'symbol' => 'USD'],
        ['id' => 1, 'name' => 'm1', 'date' => '2010-01-16 00:00:00', 'amount' => 59, 'symbol' => 'EUR']
    ];

    private $expectedReport = [
        [1, 'm1', '2010-01-15 00:00:00', 50.5],
        [1, 'm1', '2010-01-16 00:00:00', 60.18]
    ];

    public function testGetTransactions()
    {
        $container = $this->getTestContainer($this->expectedTransaction);
        $merchantReport = new MerchantReport($container);
        $result = $merchantReport->getTransactions([':id' => 1]);
        $this->assertEquals($this->expectedReport, $result);
    }

    /**
     * @expectedException Library\Exception\NotFoundException
     */
    public function testGetTransactionsForNonExistingMerchant()
    {
        $container = $this->getTestContainer([]);
        $merchantReport = new MerchantReport($container);
        $merchantReport->getTransactions([':id' => 7]);
    }

    private function getCurrencyMapperMock()
    {
        $currencyMapper = $this->getMock('Report\Mapper\CurrencyMapper', ['loadCurrency'], [], '', false);
        $currencyMapper->expects($this->any())
            ->method('loadCurrency')->willReturn(['USD' => 1.01, 'EUR' => 1.02]);

        return $currencyMapper;
    }

    private function getTransactionMapperMock($expectedTransactionResult)
    {
        $transactionMapper = $this->getMock('Report\Mapper\TransactionMapper', ['loadTransaction'], [], '', false);
        $transactionMapper->expects($this->any())
            ->method('loadTransaction')->willReturn($expectedTransactionResult);

        return $transactionMapper;
    }

    private function getTestContainer($expectedTransactionResult)
    {
        $container = new Container();

        $container['transactionMapper'] = $this->getTransactionMapperMock($expectedTransactionResult);
        $container['currencyMapper'] = $this->getCurrencyMapperMock();

        return $container;
    }
} 
