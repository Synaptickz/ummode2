<?php

namespace App\Controllers;

class SignupController extends ControllerBase
{
    /*
    public function initialize() {
        parent::initialize();
    }
    */

    public function indexAction()
    {
        $this->view->errors = array();
        $this->view->username = 'Batman';
        // If method is POST
        if ($this->request->isPost()) {
            $user = new \App\Models\Users();
            $user->setUsername($this->request->getPost("username"));
            $user->setEmail($this->request->getPost("email"));
            $user->setPassword($this->request->getPost("password"));

            $user->password_type = 1;
            $user->password_salt = 'test';

            if ($user->validationHasFailed()) {
                $messages = $user->getMessages();
                foreach ($messages as $message) {
                    echo $message->getMessage() . PHP_EOL;
                }
            } else {
                ($user->save())? printf('USER SAVED!') : printf('Internal Error');
            }

            return;
        }
    }
}
