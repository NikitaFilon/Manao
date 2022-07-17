<!DOCTYPE html>
<html lang="ru">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <meta content="text/html; charset=utf-8">
    <?php
    if (isset($_SESSION['logged_user'])) : ?>
        <?php
        $name = $_SESSION['logged_user'];
        echo "$name"
        ?>
    <?php else : ?>
        <h5>Авторизуйтесь</h5>
    <?php endif; ?>
</head>
<body>
