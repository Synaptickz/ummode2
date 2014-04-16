<?php

namespace App\Controllers;

class ErrorController extends ControllerBase
{
    public function show404Action()
    {
        http_response_code(404);
        $this->view->pick('error404');
        $this->view->method = '[' . __METHOD__ . ']';
    }
}
