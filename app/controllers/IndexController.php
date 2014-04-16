<?php

namespace App\Controllers;

class IndexController extends ControllerBase
{
    public function indexAction()
    {
        $i=0;
        echo '<pre>';
        foreach ($this->di->getServices() as $service){
            echo ++$i.'. '.$service->getName()."\n";
            //$this->logger->log($i++.' '.$service->getName());
        }
        echo '</pre>';
        $this->logger->log('[' . __METHOD__ . ']');
        echo '[' . __METHOD__ . ']';
    }
}
