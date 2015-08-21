<?php

use Library\Mapper\DbMapper;

class DbMapperTest extends PHPUnit_Framework_TestCase
{

    private $dbMapper = null;

    protected  function setup()
    {
        $this->dbMapper = new DbMapper(new PDO('sqlite:data/tests.db'));
    }

    public function testAbc()
    {
        $this->assertTrue(true);
    }
} 
