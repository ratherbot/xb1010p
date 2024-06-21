<?php

//Старт сессии
session_start();

//Подключение файлов
require_once __DIR__ . '/incs/config.php';
require_once ROOT . '/incs/db.php';
require_once ROOT . '/incs/func.php';

$title = 'Регистрация';

// Проверка на авторизацию
if (check_auth()) {
    redirect('index.php');
}

// Регистрация
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = load(['name', 'email', 'password']);
    $repass = load(['repassword']);
    if (true === ($validate = check_required_fields($data)))
    {
        if($data['password'] === $repass['repassword']){
            if (register($data))
            {
                redirect('login.php');
            }
        }
        else
            $_SESSION['errors'] = "Пароли не совпадают";
    } else {
        $_SESSION['errors'] = get_errors($validate);
    }
}

require_once VIEWS . '/register.tpl.php';