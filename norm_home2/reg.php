<?php
$errors = [];
$status = true;
//    $line = "Имя: " . $_POST['username'] . "\n" . "Email: " . $_POST['email'] . "\n" . "Комментарий: " . $_POST['message'] . "\n" . "Выбранный вариант: " . $_POST['list'];

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'email';
    $status = false;
}

if (strlen($_POST['username'])<3) {
    $errors[] = 'username';
    $status = false;
}

if (empty($_POST['pwd'])) {
    $errors[] = 'pwd';
    $status = false;
}

if ($_POST['pwd'] != $_POST['confirmpwd']) {
    $errors[] = 'pwd';
    $errors[] = 'confirmpwd';
    $status = false;
}

if ($status) {
    require_once $_SERVER['DOCUMENT_ROOT'].'oop1/Users.php';

    $users = new Users();

    if (!$users->userExist($_POST['username']))
    {
        if ($users->insert($_POST['username'], $_POST['pwd'], $_POST['email'])) {
            $message = "Регистрация прошла успешно";
        } else {
            $status = false;
            $message = 'Не удалоь сохранить пользователя';
        }
    } else {
        $status = false;
        $message = 'Пользователь с данным именем уже существует';
    }
}

echo json_encode([
    "errors" => $errors,
    "status" => $status,
    "message" => $message,
]);



