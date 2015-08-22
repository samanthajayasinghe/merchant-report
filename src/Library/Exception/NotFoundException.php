<?php
namespace Library\Exception;

use \Exception;

class NotFoundException extends Exception{

    protected $code = 404;

    public function __construct($message)
    {
        parent::__construct($message, $this->code);
    }

} 
