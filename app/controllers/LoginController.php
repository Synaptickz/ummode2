<?php

namespace App\Controllers;

class LoginController extends ControllerBase
{
    public function indexAction()
    {
        $this->view->username = '';
        $this->view->e_username = false;
        $this->view->email = '';
        $this->view->e_username = '';
        $this->view->password = '';

        $errors = array();

        // If request method is POST
        if ($this->request->isPost()) {

            $text = 'Invalid credentials';
            $field = "irelevant";
            $type = "InvalidCredentials";
            $code = 103;

            // if ($user = \App\Models\Users::findFirstByUsername( $this->request->getPost('username') )) {
            //     if ($user->getPassword() == $this->request->getPost('password') ) {
            //         echo 'Success';
            //     } else {
            //         $errors[] = new \Phalcon\Mvc\Model\Message($text, $field, $type, $code);
            //     }
            // } else {
            //     $errors[] = new \Phalcon\Mvc\Model\Message($text, $field, $type, $code);
            // }


            if (($user = \App\Models\Users::findFirstByUsername( $this->request->getPost('username') )) ||
                ($user = \App\Models\Users::findFirstByEmail( $this->request->getPost('username') ))
                ) {
                    echo 'Success';
                } else {
                    echo 'FAILURE';
                };



        }

        // If request method is GET
        if ($this->request->isGet()) {

        }


        $this->view->errors = $errors;
    }
}
