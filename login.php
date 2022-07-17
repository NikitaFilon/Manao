<?php
session_start();
require __DIR__ . '/header.php';
?>

    <div class="container mt-4">
        <div class="row">
            <div class="col">
                <h2>Форма авторизации</h2>
                <form action="auth.php" method="post" id="idForm" style="display:none">
                    <input type="text" class="form-control" name="login" id="login" placeholder="Введите логин"
                           required><br>
                    <input type="password" class="form-control" name="password" id="pass" placeholder="Введите пароль"
                           required><br>
                    <button class="btn btn-success" name="do_login" type="submit">Авторизоваться</button>
                </form>
                <br>
                <p>Если вы еще не зарегистрированы, тогда нажмите <a href="signup.php">здесь</a>.</p>
                <p>Вернуться на <a href="index.php">главную</a>.</p>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        document.getElementById("idForm").style.display = "block";
    </script>


<?php require __DIR__ . '/footer.php'; ?>