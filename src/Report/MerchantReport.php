<?php

namespace Report;

use Report\Mapper\CurrencyMapper;
use Report\Mapper\TransactionMapper;
use Library\Exception\NotFoundException;
use Pimple\Container;

class MerchantReport
{

    /**
     * @var Container
     */
    private $container = null;

    /**
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->setContainer($container);
    }

    /**
     * @param array $filters
     * @return array
     * @throws NotFoundException
     */
    public function getTransactions(array $filters)
    {
        $result = [];
        $rates = $this->getCurrencyMapper()->loadCurrency();
        $transactions = $this->getTransactionMapper()->loadTransaction($filters);

        if (count($transactions) == 0) {
            throw new NotFoundException("No Records found");
        }
        foreach ($transactions as $transaction) {
            $gbpAmount = $transaction['amount'] * $rates[$transaction['symbol']];
            $result[] = [
                $transaction['id'],
                $transaction['name'],
                $transaction['date'],
                $gbpAmount
            ];
        }
        return $result;
    }


    /**
     * @return CurrencyMapper
     */
    private function getCurrencyMapper()
    {
        return $this->getContainer()['currencyMapper'];
    }

    /**
     * @return TransactionMapper
     */
    private function getTransactionMapper()
    {
        return $this->getContainer()['transactionMapper'];
    }

    /**
     * @return Container
     */
    public function getContainer()
    {
        return $this->container;
    }

    /**
     * @param Container $container
     * @return $this;
     */
    private function setContainer($container)
    {
        $this->container = $container;
        return $this;
    }
} 
