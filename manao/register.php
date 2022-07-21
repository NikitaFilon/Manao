<?php

require_once 'entity\User.php';
require_once 'controlles\Json.php';
require_once 'Validate.php';
$db = new Json();
$validate = new Validate();
if (isset($_POST['name']) && isset($_POST['login']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirmPassword'])) {

    $user = new User($_POST['name'], $_POST['login'], $_POST['password'], $_POST['email']);
    $errors = $validate->validateUser($user);

    if (empty($errors)) {

        $userData = array(
            'name' => $user->getName(),
            'email' => $user->getEmail(),
            'login' => $user->getLogin(),
            'salt' => $user->getSalt(),
            'password' => $password = md5($user->getSalt() . $user->getPassword())
        );

        $insert = $db->insert($userData);
/*        echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button>
                Register Successfully
         </div>';
        echo '<div style="color: green; ">Вы успешно зарегистрированы! Можно <a href="login.php">авторизоваться</a>.</div><hr>';*/
        echo json_encode(array("message" => "Register Successfully "));

    } else {
/*        echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert">&times;</button>
                ' . array_shift($errors) . '
           </div>';*/
        echo json_encode(array("error" => $errors));

    }
}