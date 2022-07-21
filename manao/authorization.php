<?php


require_once 'controlles\Json.php';
require_once 'conect.php';
$db = new Json();

if (isset($_POST['login']) && isset($_POST['password'])) {
    $errors = array();
    $user = $db->getSingle($_POST['login']);

    if ($user) {
        if ($user = $db->checkPassword(($_POST['login']), $_POST['password'])) {
            $_SESSION['logged_user'] = $user['name'];

            ?>
            <script> location.replace("index.php"); </script>
            <?php
        } else {

            $errors[] = 'Пароль неверно введен!';

        }

    } else {
        $errors[] = 'Пользователь с таким логином не найден!';
    }

    if (!empty($errors)) {

        echo json_encode(array("error" => $errors));

    }

}