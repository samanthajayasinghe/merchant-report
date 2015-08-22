<?php

use Report\Mapper\TransactionMapper;

class TransactionMapperTest extends PHPUnit_Framework_TestCase{

    /**
     * @var TransactionMapper
     */
    private $transactionMapper = null;

    protected  function setup()
    {
        $db = new PDO('sqlite:data/test.db');
        $db->setAttribute(PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION);
        $this->transactionMapper = new TransactionMapper($db);
    }

    public function testLoadTransaction()
    {
        $result = $this->transactionMapper->loadTransaction(['id'=>1]);
        $this->assertCount(3,$result);
    }

    public function testLoadTransactionForNonExistingMerchant()
    {
        $result = $this->transactionMapper->loadTransaction(['id'=>4]);
        $this->assertCount(0,$result);
    }
} 
