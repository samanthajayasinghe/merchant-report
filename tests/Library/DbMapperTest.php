<?php

use Library\Mapper\DbMapper;

class DbMapperTest extends PHPUnit_Framework_TestCase
{

    private $dbMapper = null;

    protected  function setup()
    {
        $db = new PDO('sqlite:data/test.db');
        $db->setAttribute(PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION);
        $this->dbMapper = new DbMapper($db);
    }

    public function testDbHandler()
    {
        $result = $this->dbMapper->getDbHandler();
        $this->assertInstanceOf('PDO',$result);
    }

    public function testExecute()
    {
        $result = $this->dbMapper->load('SELECT * FROM merchant',[]);
        $this->assertCount(3,$result);
    }

    public function testExecuteWithParameters()
    {
        $result = $this->dbMapper->load('SELECT * FROM merchant WHERE id>:id',[1]);
        $this->assertCount(2,$result);
    }

} 
