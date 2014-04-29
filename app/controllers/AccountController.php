<?php

namespace App\Controllers;

class AccountController extends ControllerBase
{
    public function initialize()
    {
        parent::initialize();

        $this->view->username = '';
        $this->view->email = '';
        $this->view->password = '';
    }

    public function loginAction()
    {
        switch (true) {
            // Method is GET
            case $this->request->isGet():
                break;

            // Method is POST
            case $this->request->isPost():
                // Verify against CSRF
                if (!$this->security->checkToken()) {
                    $this->errors[] = new \Phalcon\Mvc\Model\Message(
                        'CSRF attempt',
                        'Credentials',
                        'Credentials',
                        0
                    );
                    break;
                }

                $username = $this->request->getPost('username');
                $password = $this->request->getPost('password');

                // Make sure input is not empty
                if (strlen($username) == 0 || strlen($password) == 0) {
                    $this->errors[] = new \Phalcon\Mvc\Model\Message(
                        'Fields cannot be empty',
                        'Credentials',
                        'Credentials',
                        0
                    );
                    break;
                }

                // Search for a registered used
                if ($user = \App\Models\Users::findFirstByUsername($username)) {
                } elseif ($user = \App\Models\Users::findFirstByEmail($username)) {
                } else {
                    $this->errors[] = new \Phalcon\Mvc\Model\Message(
                        'User does not exist',
                        'Credentials',
                        'Credentials',
                        0
                    );
                    break;
                };

                // Verify password
                if (!$this->security->checkHash($password, $user->getPassword(), 60)) {
                    $this->errors[] = new \Phalcon\Mvc\Model\Message(
                        'Wrong password',
                        'Credentials',
                        'Credentials',
                        0
                    );
                    break;
                }
                $this->response->redirect('account/congratulations');

                break;
        }
    }

    public function signupAction()
    {
        switch (true) {
            // Method is GET
            case $this->request->isGet():
                break;

            // Method is POST
            case $this->request->isPost():
                // Retrive POST fields
                $username  = $this->view->username = $this->request->getPost('username');
                $email     = $this->view->email    = $this->request->getPost('email');
                $password  = $this->request->getPost('password');
                $cpassword = $this->request->getPost('cpassword');

                // Create new user and validate data
                $user = new \App\Models\Users();
                $user->setUsername($username);
                $user->setEmail($email);
                $user->setPassword($password);

                // Verify if password confirm matches password
                if ($password != $cpassword) {
                    $this->errors[] = new \Phalcon\Mvc\Model\Message(
                        'Confirm password does not match',
                        'Credentials',
                        'Credentials',
                        0
                    );
                }

                // Merge eventual errors
                if ($user->validationHasFailed()) {
                    $this->errors = array_merge($user->getMessages(), $this->errors);
                    break;
                }

                // Store hashed password
                $password = $this->security->hash($password);
                $user->setPassword($password, true);

                // Everything looks good. Let's save this user
                if (!$user->save()) {
                    // Something went horribly wrong
                    echo 'Internal error'; // Should i throw an exception?
                    break;
                }

                // All went ok
                $this->response->redirect('account/congratulations');

                break;
        }
    }

    public function congratulationsAction()
    {
        echo 'Congratulations!';
    }
}
