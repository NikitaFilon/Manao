<?php
session_start();
$data = $_POST;

require_once 'json.php';
require_once 'user.php';

$db = new Json();

if (isset($data['do_signup'])) {
    $errors = array();

    if (trim($data['login']) == '') {
        $errors[] = "Введите логин!";
    }

    if (!preg_match("/^[a-zA-Z0-9]+$/", $data['password'])) {
        $errors[] = "Пароль должен содержать только буквы и  цифры";
    }


    if (trim($data['email']) == '') {
        $errors[] = "Введите Email";
    }

    if (trim($data['name']) == '') {
        $errors[] = "Введите Имя";
    }

    if ($data['password'] == '') {
        $errors[] = "Введите пароль";
    }

    if ($data['confirm_password'] != $data['password']) {
        $errors[] = "Повторный пароль введен не верно!";
    }

    if (strlen($data['login']) < 5) {
        $errors[] = "Недопустимая длина логина";
    }

    if (strlen($data['name']) == 1) {
        $errors[] = "Недопустимая длина имени";
    }

    if (!preg_match("/^[a-zA-Z]+$/", $data['name'])) {
        $errors[] = 'Неверно веденно имя(только буквы!)';
    }

    if (strlen($data['password']) < 5) {
        $errors[] = "Недопустимая длина пароля (от 6 символов)";
    }

    if (!preg_match("/[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,3}/i", $data['email'])) {
        $errors[] = 'Неверно введен е-mail';
    }


    if ($db->checkLogin($data['login'])) {
        $errors[] = "Пользователь с таким логином существует!";
    }

    if ($db->checkEmail($data)) {
        $errors[] = "Пользователь с таким Email существует!";
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

    if (empty($errors)) {
        $salt = generateSalt();
        $userData = array(
            'name' => $data['name'],
            'email' => $data['email'],
            'login' => $data['login'],
            'salt' => $salt,
            'password' => $password = md5($salt . $data['password'])
        );

        $insert = $db->insert($userData);
        echo '<div style="color: green; ">Вы успешно зарегистрированы! Можно <a href="login.php">авторизоваться</a>.</div><hr>';

    } else {
        echo '<div style="color: red; ">' . array_shift($errors) . '</div><hr>';
    }


}