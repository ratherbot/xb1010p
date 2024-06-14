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
    <section class = "registration-block">
        <?php get_alerts(); ?> <!--Вызов надписей с сервера с ошибками форм или успешной авторизацией/регистрацией -->
        <a class = "close-button" href = "#">
            <img class = "diff" src = "/img/diff.svg">
        </a>
        <h1 class = "reg-header">Войдите или зарегистрируйтесь</h1>
        <a class = "black-button" href = "#">
            <div class = "reg-google">
                <img class = "google-icon" src = "/img/google_symbol.svg" alt = "Иконка гугл">
                <p class = "white-font">Вход с аккаунтом Google</p>
            </div>
        </a>
        <p class = "black-font text-between-blocks">Или</p>
        <form method="post">
            <div class = "black-button translucent slide-bottom">
                <input class = "email-form" id="email" name="email" type="email" placeholder="Электронная почта">
            </div>
            <div class = "black-button translucent slide-bottom">
                <input class = "email-form" id="log_password" name="log_password" type="password" placeholder="Пароль">
            </div>
            <button class="black-button white-font" type ="submit">Продолжить</button>
        </form>
        <a class = "black-font" href = "#">Нужна помощь со входом?</a>
    </section>
</body>
<script src = "../script.js"></script>
</html>