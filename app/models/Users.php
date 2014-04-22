<?php

namespace App\Models;

use Phalcon\Mvc\Model\Validator\Email as EmailValidator;

class Users extends BaseModel
{
    protected $id;
    protected $username;
    protected $email;
    public $password_type;
    protected $password;
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
            'message' => $this->translate->query('V_USERNAME_REQUIRED')
        )));

        if ($this->getMessages($field)) {
            return;
        };
        $this->validate(new \Phalcon\Mvc\Model\Validator\StringLength(array(
            'field' => $field,
            'min'   => 3,
            'max'   => 30,
            'messageMinimum' => $this->translate->query('V_USERNAME_MIN_LENGTH'),
            'messageMaximum' => $this->translate->query('V_USERNAME_MAX_LENGTH')
        )));

        if ($this->getMessages($field)) {
            return;
        };
        $this->validate(new \Phalcon\Mvc\Model\Validator\Regex(array(
            'field' => $field,
            'pattern' => '/^[A-Za-z][A-Za-z0-9]*(?:[A-Za-z0-9]+)*$/',
            'message' => $this->translate->query('V_USERNAME_ALPHANUMERIC')
        )));

        if ($this->getMessages($field)) {
            return;
        }
        $this->validate(new \Phalcon\Mvc\Model\Validator\Uniqueness(array(
            'field' => $field,
            'message' => $this->translate->query('V_USERNAME_UNIQUENESS')
        )));
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;

        // Validation
        $field = 'email';
        $this->validate(new \Phalcon\Mvc\Model\Validator\PresenceOf(array(
            'field' => $field,
            'message' => $this->translate->query('V_EMAIL_REQUIRED')
        )));

        if ($this->getMessages($field)) {
            return;
        }
        $this->validate(new \Phalcon\Mvc\Model\Validator\Email(array(
            'field' => $field,
            //'message' => $field . ' must be an email address'
        )));

        if ($this->getMessages($field)) {
            return;
        }
        $this->validate(new \Phalcon\Mvc\Model\Validator\Uniqueness(array(
            'field' => $field,
            //'message' => $field . ' must be an email address'
        )));
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;

        // Validation
        $field = 'password';
        $this->validate(new \Phalcon\Mvc\Model\Validator\PresenceOf(array(
            'field' => $field,
            //'message' => $field . ' cannot be empty'
        )));

        if ($this->getMessages($field)) {
            return;
        }
        $this->validate(new \Phalcon\Mvc\Model\Validator\StringLength(array(
            'field' => $field,
            'min'   => 6,
            'max'   => 60,
            //'messageMaximum' => 'We don\'t like really long names',
            //'messageMinimum' => 'We want more than just your initials'
        )));
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
