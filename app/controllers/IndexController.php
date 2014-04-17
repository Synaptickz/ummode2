<?php

namespace App\Controllers;

class IndexController extends ControllerBase
{
    public function indexAction()
    {
        //$user = \App\Models\Users::findFirst();
        echo '<pre>' . PHP_EOL;
        //echo var_dump($user) . PHP_EOL;
        echo '[' . __METHOD__ . ']' . PHP_EOL;
        echo '</pre>' . PHP_EOL;
    }
}
