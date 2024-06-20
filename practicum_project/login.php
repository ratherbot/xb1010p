<?php

//Старт сессии
session_start();

//Подключение файлов
require_once __DIR__ . '/incs/config.php';
require_once ROOT . '/incs/db.php';
require_once ROOT . '/incs/func.php';

$title = 'Авторизация';

// Проверка на авторизацию
if (check_auth()) {
    redirect('index.php');
}

// Авторизация
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = load(['email', 'password']);
    if (true === ($validate = check_required_fields($data))) {
        if (login($data)) {
            redirect('index.php');
        }
    } else {
        $_SESSION['errors'] = get_errors($validate);
    }
}

require_once VIEWS . '/login.tpl.php';