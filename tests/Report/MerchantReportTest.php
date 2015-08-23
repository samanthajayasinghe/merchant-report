<?php

use \Report\MerchantReport;

class MerchantReportTest extends PHPUnit_Framework_TestCase{

    /**
     * @var MerchantReport
     */
    private $merchantReport = null;

    protected function setup()
    {
        $this->merchantReport = new MerchantReport();
    }

    public function testGetTransactions()
    {
        $result = $this->merchantReport->getTransactions([':id'=>1]);
        var_dump($result);
    }
} 
