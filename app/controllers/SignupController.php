<?php

namespace App\Controllers;

class SignupController extends ControllerBase
{
    public function indexAction()
    {
        $this->view->errors = array();

        // If method is POST
        if ( $this->request->isPost() ) {
            try {
                $user = new \App\Models\Users();

                $user->setUsername($this->request->getPost("username"));
                $user->email    = $this->request->getPost("email");
                $user->password = $this->request->getPost("password");

                $user->password_type = 1;
                $user->password_salt = 'ps';


                $messages = $user->getMessages();
                if ($messages != null)
                foreach ($messages as $message){
                    echo $message->getMessage() . PHP_EOL;
                }
                else{
                    $user->save();
                }


            } catch ( \InvalidArgumentException $e) {
                echo $e->getMessage();

            } catch ( \PDOException $e) {
                if ( $e->errorInfo[1] == 1062 ) echo 'Email already exists';
            }

        }


    }
}