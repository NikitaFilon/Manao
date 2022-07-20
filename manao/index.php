<?php
session_start();
require __DIR__ . '/header.php';
?>

    <div class="container mt-4">
        <div class="row">
            <div class="col">
                    <h1>Добро пожаловать на наш сайт!</h1>
            </div>
        </div>
    </div>

<?php if (isset($_SESSION['logged_user'])) : ?>
    Hello, <?php echo $_SESSION['logged_user']; ?></br>

    <a href="logout.php">Выйти</a>
<?php else : ?>
    <a href="login.php">Авторизоваться</a><br>
    <a href="signup.php">Регистрация</a>
<?php endif; ?>