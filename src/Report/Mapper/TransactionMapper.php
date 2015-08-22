<?php
namespace Report\Mapper;

use Library\Mapper\DbMapper;

class TransactionMapper extends DbMapper {

    /**
     * @param array $filters
     * @return mixed
     */
    public function loadTransaction(array $filters)
    {
        $sql = "SELECT m.id, m.name,t.amount,t.date,c.symbol
                FROM merchant_transaction t, currency c, merchant m
                WHERE t.currency_id=c.id AND t.merchant_id=m.id AND t.merchant_id=:id";
        return $this->load($sql, $filters);
    }
} 
