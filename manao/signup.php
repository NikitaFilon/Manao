<?php
session_start();
require __DIR__ . '/header.php'; ?>
<body>
<form id="registraion_form" class="form-horizontal">

    <div class="form-group">
        <label class="col-sm-3 control-label">Name</label>
        <div class="col-sm-6">
            <input type="text" id="txt_name" pattern="^\S*[a-zA-Z]+" minlength="2" maxlength="2" class="form-control"
                   required placeholder="enter name"/>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label">Login</label>
        <div class="col-sm-6">
            <input type="text" minlength="6" pattern="^\S*$" required id="txt_login" class="form-control"
                   placeholder="enter login"/>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label">Email</label>
        <div class="col-sm-6">
            <input required pattern="^\S*[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$" type="email" id="txt_email"
                   class="form-control" placeholder="enter email"/>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label">Password</label>
        <div class="col-sm-6">
            <input minlength="6" onkeyup='check();' required pattern="^\S*[a-zA-Z0-9]+$" type="password"
                   id="txt_password" class="form-control" placeholder="enter password"/>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label">Confirm Password</label>
        <div class="col-sm-6">
            <input minlength="6" onkeyup='check();' required pattern="^\S*[a-zA-Z0-9]+$" type="password"
                   id="txt_confirmPassword" class="form-control" placeholder="enter confirm password"/>
        </div>
        <span
                id='messages'></span>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6 m-t-15">
            <button type="submit" id="btn_register" class="btn btn-success">Register</button>
        </div>
    </div>

    <p>Если вы зарегистрированы, тогда нажмите <a href="login.php">здесь</a>.</p>
    <p>Вернуться на <a href="index.php">главную</a>.</p>

    <div class="form-group">
        <div id="message" class="col-sm-offset-3 col-sm-6 m-t-15"></div>
    </div>

</form>
</body>
