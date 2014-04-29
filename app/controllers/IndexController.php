<?php

namespace App\Controllers;

class IndexController extends ControllerBase
{
    public function indexAction()
    {
        echo '<pre>' . PHP_EOL;
        echo '[' . __METHOD__ . ']' . PHP_EOL;
        echo '</pre>' . PHP_EOL;
    }
}
