<?php
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log in/Sign up form</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="error" style="display: none"> Не врно заполнено поле</div>
    <div class="wrapper">
        <div class="container">
            <div class="nav">
                <ul class="links">
                    <li class="signin-active">
                        <a class="btn">Войти</a>
                    </li>
                    <li class="signup-inactive">
                        <a class="btn">Регистрация</a>
                    </li>
                </ul>
            </div>
            <div class="forms">
                <form class="form-signin"  method="post" name="form">
                    <label for="login">Логин</label>
                    <input class="form-styling" type="text" name="login" placeholder=""/>
                    <label for="pwd">Пароль</label>
                    <input class="form-styling" type="text" name="pwd" placeholder=""/>
                    <div class="btn-animate">
                        <input type="submit" class="btn-signin" value="Войти">
                    </div>
                </form>
                <form class="form-signup"  method="post" name="form">
                    <label for="username">Логин</label>
                    <input class="form-styling" type="text" name="username" placeholder=""/>
                    <label for="email">Email</label>
                    <input class="form-styling" type="text" name="email" placeholder=""/>
                    <label for="pwd">Пароль</label>
                    <input class="form-styling" type="text" name="pwd" placeholder=""/>
                    <label for="confirmpwd">Подтверди пароль</label>
                    <input class="form-styling" type="text" name="confirmpwd" placeholder=""/>
                    <input type="checkbox" id="checkbox"/>
                    <label for="checkbox" >Я хочу нажать кнопочку</label>
                    <input type="checkbox" id="checkbox1"/>
                    <label for="checkbox1" >И эту</label>
                    <input type="checkbox" id="checkbox2"/>
                    <label for="checkbox2" >И вот эту тоже</label>
                    <label class="list" for="list">Хочу список</label>
                    <select name="list" tabindex="11" size="3">
                        <option value="Тык">Тык</option>
                        <option value="Тык-Тык">Тык-Тык</option>
                        <option value="Тык-Тык-Тык">Тык-Тык-Тык</option>
                    </select>
                    <input type="submit" class="btn-signup" value="Регистрация">
                </form>
            </div>
            <div class="footer">

            </div>
            <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
            <script src='//cdnjs.cloudflare.com/ajax/libs/angular.js/1.3.14/angular.min.js'></script>
            <script src="js/index.js"></script>
        </div>
    </div>
</body>
</html>
<script type="text/javascript">
    $(document).ready(function () {
        $('.form-signup').on('submit', function (e) {
            e.preventDefault();
            let form = $('form').serializeArray();
            console.log(form);
            $.ajax({
                url: "/norm_home2/reg.php",
                method: "POST",
                data: form,
                dataType: "json",
                success: function (result) {

                    $.each(form, function (key, value) {
                        $('[name="' + value.name + '"]').css('border', 'none');
                    });
                    $('.error').hide();
                    console.log(result);
                    if (result.status) {
                    //
                    //     $('.error').show();
                    //     $('.error').html(result.message);
                    //     $('.error').css('color', 'green');
                        $('.form-signup').hide();
                    } else {

                        $('.error').show();
                        $('.error').html('Неверно заполнено поле.');
                        $('.error').css('color', 'red');
                        $.each(result.errors, function (key, value) {
                            $('[name="' + value + '"]').css('border', '1px solid red');
                            console.log(value);
                        });

                    }
                }
            });
        });
        $('.form-signin').on('submit', function (e) {
            e.preventDefault();
            let form = $('.form-signin').serializeArray();
            console.log(form);
            $.ajax({
                url: "/norm_home2/auth.php",
                method: "POST",
                data: form,
                dataType: "json",
                success: function (result) {

                    $.each(form, function (key, value) {
                        $('[name="' + value.name + '"]').css('border', 'none');
                    });
                    $('.error').hide();
                    console.log(result);
                    if (result.status) {
                        //
                        //     $('.error').show();
                        //     $('.error').html(result.message);
                        //     $('.error').css('color', 'green');
                        $('.form-signup').hide();
                    } else {

                        $('.error').show();
                        $('.error').html('Неверно заполнено поле.');
                        $('.error').css('color', 'red');
                        $.each(result.errors, function (key, value) {
                            $('[name="' + value + '"]').css('border', '1px solid red');
                            console.log(value);
                        });

                    }
                }
            });
        });
    });
</script>