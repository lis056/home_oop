<?php
$errors = [];
$status = true;

if (strlen($_POST['login'])<3) {
    $errors[] = 'login';
    $status = false;
}

if (empty($_POST['pwd'])) {
    $errors[] = 'pwd';
    $status = false;
}

if ($status) {
    require_once $_SERVER['DOCUMENT_ROOT'] . 'oop1/Users.php';

    $users = new Users();

    if ($users->userExist($_POST['login'])){
        if ($users->pwdCorrect($_POST['login'], $_POST['pwd']))
        {
            $message = "Авторизация прошла успешно";
        } else {
            $status = false;
            $message = 'Не верный логин или пароль';
        }
    } else {
        $status = false;
        $message = 'Данного пользователя не существует';
    }
}

echo json_encode([
    "errors" => $errors,
    "status" => $status,
    "message" => $message,
]);
