<?php

namespace App\Models;

class BaseModel extends \Phalcon\Mvc\Model
{
    protected $translate;
    public function initialize ()
    {
        $this->translate = $this->getDI()->getShared('translate');
    }
}
