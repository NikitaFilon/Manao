<?php

require_once 'entity\User.php';
require_once 'entity\Json.php';
$db = new Json();
if (isset($_POST['name']) && isset($_POST['login']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirmPassword'])) {

    $user = new User($_POST['name'], $_POST['login'], $_POST['password'], $_POST['email']);
    $errors = array();

    if (trim($user->getLogin()) == '') {
        $errors[] = "Введите логин!";
    }

    if (!preg_match("/^[a-zA-Z0-9]+$/", $user->getPassword())) {
        $errors[] = "Пароль должен содержать только буквы и  цифры";
    }


    if (trim($user->getEmail()) == '') {
        $errors[] = "Введите Email";
    }

    if (trim($user->getName()) == '') {
        $errors[] = "Введите Имя";
    }

    if ($user->getPassword() == '') {
        $errors[] = "Введите пароль";
    }

    if ($user->getPassword() != $_POST['confirmPassword']) {
        $errors[] = "Повторный пароль введен не верно!";
    }

    if (strlen($user->getLogin()) < 5) {
        $errors[] = "Недопустимая длина логина";
    }

    if (strlen($user->getName()) == 1) {
        $errors[] = "Недопустимая длина имени";
    }

    if (!preg_match("/^[a-zA-Z]+$/", $user->getName())) {
        $errors[] = 'Неверно веденно имя(только буквы!)';
    }

    if (strlen($user->getPassword()) < 5) {
        $errors[] = "Недопустимая длина пароля (от 6 символов)";
    }

    if (!preg_match("/[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,3}/i", $user->getEmail())) {
        $errors[] = 'Неверно введен е-mail';
    }


    if ($db->checkLogin($user->getName())) {
        $errors[] = "Пользователь с таким логином существует!";
    }

    if ($db->checkEmail($user)) {
        $errors[] = "Пользователь с таким Email существует!";
    }

    if (empty($errors)) {

        $userData = array(
            'name' => $user->getName(),
            'email' => $user->getEmail(),
            'login' => $user->getLogin(),
            'salt' => $user->getSalt(),
            'password' => $password = md5($user->getSalt() . $user->getPassword())
        );

        $insert = $db->insert($userData);
        echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button> 
                Register Successfully  
         </div>';
        echo '<div style="color: green; ">Вы успешно зарегистрированы! Можно <a href="login.php">авторизоваться</a>.</div><hr>';

    } else {
        echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button> 
                ' . array_shift($errors) . '  
           </div>';

    }
}