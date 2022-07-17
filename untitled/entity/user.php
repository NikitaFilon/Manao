<?php

class user
{
    private $name;
    private $email;
    private $password;
    private $login;

    public function __construct($name, $email, $login, $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->login = $login;
        $this->password = $password;
    }

    public function __toString()
    {
        return $this->name . $this->email . $this->password . $this->login;
    }

}