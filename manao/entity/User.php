<?php

class User
{
    private $name;
    private $login;
    private $password;
    private $email;
    private $salt;
    private $id;


    public function __construct($name, $login, $password, $email, $id = null)
    {
        $this->name = $name;
        $this->login = $login;
        $this->email = $email;
        $this->password = $password;
        $this->salt = generateSalt();

    }


    public function getName()
    {
        return $this->name;
    }


    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function getSalt()
    {
        return $this->salt;
    }

    public function getPassword()
    {
        return $this->password;
    }


}

function generateSalt()
{
    $salt = '';
    $saltLength = 8;

    for ($i = 0; $i < $saltLength; $i++) {
        $salt .= chr(mt_rand(33, 126));
    }

    return $salt;
}

