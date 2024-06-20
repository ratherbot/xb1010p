<?php
//Функции сайта

function load(array $fillable, $post = true): array
{
    $load_data = $post ? $_POST : $_GET;
    $data = [];
    foreach ($fillable as $value) {
        if (isset($load_data[$value])) {
            $data[$value] = trim($load_data[$value]);
        } else {
            $data[$value] = '';
        }
    }
    return $data;
}

function check_required_fields(array $data): true|array
{
    $errors = [];
    foreach ($data as $k => $v) {
        if (empty($v)) {
            $errors[] = "Не заполнено поле {$k}";
        }
    }
    if (!$errors) {
        return true;
    }
    return $errors;
}

function h(string $s): string
{
    return htmlspecialchars($s, ENT_QUOTES);
}

function old(string $name, $post = true): string
{
    $load_data = $post ? $_POST : $_GET;
    return isset($load_data[$name]) ? h($load_data[$name]) : '';
}

function redirect(string $url)
{
    header("Location: {$url}");
    die;
}

function get_errors(array $errors): string
{
    $html = '<ul class="list-unstyled">';
    foreach ($errors as $error) {
        $html .= "<li>{$error}</li>";
    }
    $html .= '<ul>';
    return $html;
}

function get_alerts(): void
{
    if (!empty($_SESSION['errors'])) {
        require VIEWS . '/incs/alert_danger.tpl.php';
        unset($_SESSION['errors']);
    }
    if (!empty($_SESSION['success'])) {
        require VIEWS . '/incs/alert_success.tpl.php';
        unset($_SESSION['success']);
    }
}

function register(array $data): bool
{
    global $db;
    $stmt = $db->prepare("SELECT COUNT(*) FROM users WHERE email = ?");
    $stmt->execute([$data['email']]);
    if ($stmt->fetchColumn()) {
        $_SESSION['errors'] = 'Этот email уже зарегистрирован';
        return false;
    }
    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
    $stmt = $db->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
    $stmt->execute($data);
    $_SESSION['success'] = 'Вы успешно зарегистрированы';
    return true;
}

function login(array $data): bool
{
    global $db;
    $stmt = $db->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$data['email']]);
    if ($row = $stmt->fetch()) {
        if (!password_verify($data['password'], $row['password'])) {
            $_SESSION['errors'] = 'Не верный email или пароль';
            return false;
        }
    } else {
        $_SESSION['errors'] = 'Не верный email или пароль';
        return false;
    }

    foreach ($row as $key => $value) {
        if ($key != 'password') {
            $_SESSION['user'][$key] = $value;
        }
    }

    $_SESSION['success'] = 'Вы успешно зашли';
    return true;
}

function check_auth(): bool
{
    return isset($_SESSION['user']);
}