<?php
require_once 'conect.php';

require __DIR__ . '/header.php';
?>

<form id="auth" class="form-horizontal">

    <div class="form-group">
        <label class="col-sm-3 control-label">Login</label>
        <div class="col-sm-6">
            <input type="text" minlength="6" pattern="^\S*$" id="txt_login" class="form-control"
                   placeholder="enter login" required/>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label">Password</label>
        <div class="col-sm-6">
            <input type="password" pattern="^\S*[a-zA-Z0-9]+$" minlength="6" id="txt_password" class="form-control"
                   placeholder="enter password" required/>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6 m-t-15">
            <button type="submit" id="btn_auth" class="btn btn-success">Авторизация</button>
        </div>
    </div>

    <br>
    <p>Если вы еще не зарегистрированы, тогда нажмите <a href="signup.php">здесь</a>.</p>
    <p>Вернуться на <a href="index.php">главную</a>.</p>

    <div class="form-group">
        <div id="message" class="col-sm-offset-3 col-sm-6 m-t-15"></div>
    </div>
</form>