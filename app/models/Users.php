<?php

namespace App\Models;

use Phalcon\Mvc\Model\Validator\Email as EmailValidator;

class Users extends \Phalcon\Mvc\Model
{
    protected $id;
    protected $username;
    public $email;
    public $password_type;
    public $password;
    public $password_salt;

    public function getId()
    {
        return $this->id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;

        // Validation
        $field = 'username';

        $this->validate(new \Phalcon\Mvc\Model\Validator\PresenceOf(array(
            'field' => $field,
            'message' => 'username cannot be empty'
        )));

        if (!$this->continueValidation($field)) return;
        $this->validate(new \Phalcon\Mvc\Model\Validator\StringLength(array(
            'field' => $field,
            'min'   => 3,
            'max'   => 30,
            'messageMaximum' => 'We don\'t like really long names',
            'messageMinimum' => 'We want more than just your initials'
        )));

        if (!$this->continueValidation($field)) return;
        $this->validate(new \Phalcon\Mvc\Model\Validator\Regex(array(
            'field' => $field,
            'pattern' => '/^[A-Za-z][A-Za-z0-9]*(?:[A-Za-z0-9]+)*$/',
            'message' => 'Username can only contain alphanumeric characters and underscore'
        )));

        if (!$this->continueValidation($field)) return;
        $this->validate(new \Phalcon\Mvc\Model\Validator\Uniqueness(array(
            'field' => $field,
            'message' => $this->username . ' already exists!'
        )));
    }

    private function continueValidation($field)
    {
        $messages = $this->getMessages();
        if ( $messages == null ) return true;
        foreach ($messages as $message){
            if ($message->getField() == $field) return false;
        }

        return true;
    }
}

/*
SQL:

CREATE TABLE `users` (
    `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(70) NOT NULL,
    `email` VARCHAR(70) NOT NULL,
    `password_type` INT(10) UNSIGNED NOT NULL DEFAULT '1',
    `password` VARCHAR(70) NOT NULL,
    `password_salt` VARCHAR(70) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE INDEX `username` (`email`)
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB;


 */