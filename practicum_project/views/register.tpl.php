<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <title><?= $title ?? 'TITLE' ?></title>
        <link rel="stylesheet" href="/css/main_style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet" href="/css/reg_style.css">
        <link href="https://fonts.googleapis.com/css2?family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Trade+Winds&display=swap" rel="stylesheet">
    </head>
    <body class = "auto opac">
        <?php get_alerts(); ?>
        <div class = "registration-form">
            <h2 class = "registration-form-header">Регистрация</h2>
            <form method="post">
                <input class = "registration-form-field" id="name" name="name" type="text" placeholder="Имя" value = "<?= old('name') ?>">
                <input class = "registration-form-field" id="email" name="email" type="email" placeholder="Электронная почта" value = "<?= old('email') ?>">
                <input class = "registration-form-field" id="password" name="password" type="password" placeholder="Придумайте пароль">
                <input class = "registration-form-field" id="repassword" name="repassword" type="password" placeholder="Повторите пароль">
                <button class = "registration-form-button refs" type = "submit">Зарегистрироваться</button>
                <div class = "agreement">
                    <input type = "checkbox">
                    <p class = "agreement-text">Я согласен/а на обработку персональных данных</p>
                </div>
                <a class = "already-have-acc refs" href = "#">
                    <p>Уже есть аккаунт</p>
                    <img src = "/img/arrow_forward-gray.svg">
                </a>
            </form>
        </div>
    </body>
    <script src = "../script.js"></script>
</html>