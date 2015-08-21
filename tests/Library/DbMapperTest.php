<?php

use Library\Mapper\DbMapper;

class DbMapperTest extends PHPUnit_Framework_TestCase
{

    private $dbMapper = null;

    protected  function setup()
    {
        $this->dbMapper = new DbMapper(new PDO('sqlite:data/tests.db'));
    }

    public function testDbHandler()
    {
        $result = $this->dbMapper->getDbHandler();
        $this->assertInstanceOf('PDO',$result);
    }

    public function testExecute()
    {
        $result = $this->dbMapper->load('SELECT * FROM merchant',[]);

    }
} 
