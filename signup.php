<?php

session_start();
require __DIR__ . '/header.php';
?>
    <div class="container mt-4">
        <div class="row">
            <div class="col">
                <h2>Форма регистрации</h2>
                <form action="register.php" method="post" id="idForm" style="display:none">
                    <input type="text" class="form-control" minlength="6" name="login" id="login"
                           required placeholder="Введите логин" pattern="^\S*$"><br>
                    <input type="email" class="form-control" minlength="6" name="email" id="email" required
                           placeholder="Введите Email"
                           pattern="^\S*[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$"><br>
                    <input type="text" class="form-control" pattern="^\S*[a-zA-Z]+" minlength="2" maxlength="2"
                           name="name"
                           id="name" required
                           placeholder="Введите имя"><br>
                    <input type="password" class="form-control" minlength="6" name="password" id="password" required
                           placeholder="Введите пароль" pattern="^\S*[a-zA-Z0-9]+$" onkeyup='check();'><br>
                    <input type="password" class="form-control" minlength="6" name="confirm_password"
                           id="confirm_password" required
                           placeholder="Повторите пароль" pattern="^\S*[a-zA-Z0-9]+$" onkeyup='check();'> <span
                            id='message'></span>
                    <button class="btn btn-success" name="do_signup" type="submit" onclick="pass()">Зарегистрировать
                    </button>
                </form>
                <br>
                <p>Если вы зарегистрированы, тогда нажмите <a href="login.php">здесь</a>.</p>
                <p>Вернуться на <a href="index.php">главную</a>.</p>
            </div>
        </div>
    </div>
    <script src="jsRegister.js"></script>

<?php require __DIR__ . '/footer.php'; ?>