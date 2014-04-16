<?php

namespace App\Controllers\Admin;

class IndexController extends ControllerBase
{
    public function indexAction()
    {
        $i=0;
        echo '<pre>';
        echo 'indexCTRL';
        echo '</pre>';

        echo '[' . __METHOD__ . ']';
    }
}
