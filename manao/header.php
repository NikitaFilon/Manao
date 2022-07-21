<!DOCTYPE html>
<html lang="ru">
<head>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/script.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <meta content="text/html; charset=utf-8">
</head>
<?php
if (isset($_SESSION['logged_user'])) : ?>
    <?php
    $name = $_SESSION['logged_user'];
    echo "$name"
    ?>
<?php else : ?>
    <h5>Авторизуйтесь</h5>
<?php endif; ?>
<body>
