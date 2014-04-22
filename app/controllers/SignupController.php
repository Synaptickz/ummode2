<?php

namespace App\Controllers;

class SignupController extends ControllerBase
{
    public function indexAction()
    {
        $this->view->username = ''; $this->view->e_username = false;
        $this->view->email = '';
        $this->view->password = '';

        $this->view->errors = array();

        // If request method is POST
        if ($this->request->isPost()) {
            $user = new \App\Models\Users();
            $user->setUsername($this->request->getPost("username"));
            $user->setEmail($this->request->getPost("email"));
            $user->setPassword($this->request->getPost("password"));

            $user->password_type = 1;
            $user->password_salt = 'test';

            if ($user->validationHasFailed()) {
                $this->view->errors = $user->getMessages();
            } else {
                ($user->save())? printf('USER SAVED!') : printf('Internal Error');
            }

            // Keep the values displayed
            $this->view->username = $user->getUsername();
            $this->view->email = $user->getEmail();

            return;
        }

        // If request method is GET
        if ($this->request->isGet()) {

        }
    }
}
