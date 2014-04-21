<?php

namespace App\Controllers\Admin;

class IndexController extends ControllerBase
{
    public function indexAction()
    {
        echo '<pre>';
        echo 'indexCTRL';
        echo '</pre>';

        echo '[' . __METHOD__ . ']';
    }
}
