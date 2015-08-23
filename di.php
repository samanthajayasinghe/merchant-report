<?php
require 'config.php';

use \PDO;
use GuzzleHttp\Client;
use Pimple\Container;
use Report\Mapper\CurrencyMapper;
use Report\Mapper\TransactionMapper;


$container = new Container($config);

$container['pdo'] = function ($config) {
    $db = new PDO($config['db']['dsn']);
    $db->setAttribute(PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION);
    return $db;
};

$container['httpClient'] = function ($config) {
    return new Client();
};

$container['transactionMapper'] = function ($config) {
    return new TransactionMapper($config['pdo']);
};

$container['currencyMapper'] = function ($config) {
    return new CurrencyMapper(
        $config['httpClient'],
        $config['currencyAPI']['url'],
        ['app_id' => $config['currencyAPI']['appId']]
    );
};

