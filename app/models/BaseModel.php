<?php

namespace App\Models;

/**
 * @property Phalcon\Logger\Multiple $logger
 * @property Phalcon\Translate\AdapterInterface $translate
 */
class BaseModel extends \Phalcon\Mvc\Model
{
    protected $translate;
    protected $logger;

    public function initialize ()
    {
        $this->translate = $this->getDI()->getShared('translate');
        $this->logger    = $this->getDI()->getShared('logger');
    }
}
