<?php
require 'vendor/autoload.php';
require 'di.php';

use Report\MerchantReport;

try {

    if ($argc <= 1 || $argv[1] <= 0) {
        throw new Exception("Invalid Merchant Id");
    }
    $merchantReport = new MerchantReport($container);
    $result = $merchantReport->getTransactions([':id' => $argv[1]]);

    foreach ($result as $row) {
        print(implode(', ', $row) . PHP_EOL);
    }
} catch (Exception $e) {
    print($e->getMessage() . PHP_EOL);
}

