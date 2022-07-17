<?php
session_start();
$data = $_POST;
require_once 'entity\json.php';
$db = new Json();

if (isset($data['do_login'])) {
    $errors = array();
    $user = $db->getSingle($data['login']);

    if ($user) {
        if ($user = $db->checkPassword(($data['login']), $data['password'])) {
            $_SESSION['logged_user'] = $user['name'];

            header('Location: index.php');

        } else {

            $errors[] = 'Пароль неверно введен!';

        }

    } else {
        $errors[] = 'Пользователь с таким логином не найден!';
    }

    if (!empty($errors)) {

        echo '<div style="color: red; ">' . array_shift($errors) . '</div><hr>';

    }

}