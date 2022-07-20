$(document).on('click', '#btn_register', function (e) {

    e.preventDefault();

    var name = $('#txt_name').val();
    var email = $('#txt_email').val();
    var password = $('#txt_password').val();
    var confirmPassword = $('#txt_confirmPassword').val();
    var login = $('#txt_login').val();


    $.ajax({
        url: 'register.php',
        type: 'post',
        data:
            {
                name: name,
                email: email,
                login: login,
                confirmPassword: confirmPassword,
                password: password
            },
        success: function (response) {
            $('#message').html(response);
        }
    });

    $('#registraion_form')[0].reset();

})
;

$(document).on('click', '#btn_auth', function (e) {

    e.preventDefault();

    var password = $('#txt_password').val();
    var login = $('#txt_login').val();


    $.ajax({
        url: 'authorization.php',
        type: 'post',
        data:
            {
                login: login,
                password: password
            },
        success: function (response) {
            $('#message').html(response);
        }
    });

    $('#registraion_form')[0].reset();

})
;

document.getElementById("idForm").style.display = "block";

var check = function () {
    if (document.getElementById('password').value == document.getElementById('confirm_password').value) {
        document.getElementById('messages').style.color = 'green';
        document.getElementById('messages').innerHTML = 'matching';
    } else {
        document.getElementById('messages').style.color = 'red';
        document.getElementById('messages').innerHTML = 'not matching';
    }
}