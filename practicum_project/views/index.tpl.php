<?php
if (isset($_GET['do']) && $_GET['do'] == 'exit') {
    unset($_SESSION['user']);
    redirect('login.php');
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <title>Историческое веб-портфолио</title>
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
<header class = "header">
    <nav class="navigation">
        <ul class = "navigation-topics">
            <li>
                <a class = "site-icon-ref" href = "index.php">
                    <img class = "site-icon" src = "/img/site-icon.png">
                </a>
            </li>
            <li>
                <a class = "site-name" href = "index.php">
                    HISTORYFIRE
                </a>
            </li>
            <li>
                <a class = "search refs" href = "search.html">
                    <img class = "search-icon" src = "/img/search-icon.svg">
                    <p>Найти автора</p>
                </a>
            </li>
                <?php if (check_auth()): ?>
                    <li>
                        <a class = "login refs" href="?do=exit"><?= $_SESSION['user']['name']?></a>
                    </li>
                <?php else: ?>
                    <li>
                        <a class = "login refs" href = "login.php">
                            Войти
                        </a>
                    </li>
                <?php endif; ?>
                <li>
                    <a class = "hamburger-button refs" href = "#">
                        <img src="/img/hamburger-button.svg">
                    </a>
                </li>
            </ul>
        </nav>
    </header>
    <main class = "main">
        <!--
        <section class = "registration-block hidden">
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
            <form action="/login.php" id="loginform" method="post" name="loginform">
                <div class = "black-button translucent">
                    <input class = "email-form" id="log_email" name="log_email" type="email" placeholder="Электронная почта">
                    <input class = "email-form" id="log_password" name="log_password" type="password" placeholder="Пароль">
                </div>
                <input class="black-button white-font" id="login" name= "login" type="submit" value="Продолжить">
            </form>
            <a class = "black-font" href = "#">Нужна помощь со входом?</a>
        </section>
        -->
        <section class = "guest-section">
            <div class = "opportunities">
                <h1 class = "g-header">Погрузитесь в мир истории</h1>
                <p class = "g-text">Откройте для себя захватывающие исторические работы нашего сообщества</p>
                <!---<ul class = "opportunities-list">
                    <li>
Читай статьи по вкусу
</li>
                    <li>
Добавляй в избранное
</li>
                    <li>
Общайся с другими пользователями
</li>
                    <li>
Заводи свой блог
</li>
                </ul>
----->
            </div>
            <?php if (!check_auth()): ?>
            <a class = "join-button" href = "register.php">
    Зарегистрироваться
            </a>
            <?php endif; ?>
        </section>
        <section class = "instructing-section">
            <ul class = "instructing-cards">
                <li class = "instructing-card">
                    <h2>Шаг 1</h2>
                    <h3>Зарегистрируйте аккаунт</h3>
                    <p>Присоединитесь к миру истории и станьте автором исторических статей</p>
                </li>
                <li class = "instructing-card">
                    <h2>Шаг 2</h2>
                    <h3>Выложите свой первый пост</h3>
                    <p>Читатели могут оценивать ваши посты по шкале от -5 до 5 , а также оставлять комментарии</p>
                </li>
                <li class = "instructing-card">
                    <h2>Шаг 3</h2>
                    <h3>Отслеживайте рейтинги</h3>
                    <p>В зависимости от самой оценки и их количества рейтинг вашего профиля будет меняться по шкале от -5 до 5, что влияет на приоритет поиска и на место в списке на главной странице</p>
                </li>
            </ul>
            <img class="new-cardholder" src = "/img/cardholder.png">
            <img class="stored-story" src = "/img/story.png">
        </section>

        <section class = "popular">
            <h2 class = "popular-header">Популярное</h2>
            <ul class = "cards-popular">
                <li>
                    <div class = "circle"></div>
                    <p class = "author">First_author</p>
                    <p class = "subscribers">500 подписчиков</p>
                    <a class = "open-blog refs" href = "#">
    Перейти в блог
</a>
                </li>
                <li>
                    <div class="circle big-circle"></div>
                    <p class = "author big-author">Second_author</p>
                    <p class = "subscribers big-subscribers">1000 подписчиков</p>
                    <a class = "open-blog refs open-big-blog" href ="#">
    Перейти в блог
</a>
                </li>
                <li>
                    <div class = "circle"></div>
                    <p class = "author">Third_author</p>
                    <p class = "subscribers">1500 подписчиков</p>
                    <a class = "open-blog refs" href = "#">
    Перейти в блог
</a>
                </li>
            </ul>
        </section>
        <div class = "sections hidden">
            <div class = "sections-header">
                <img src = "/img/site-icon.png">
                <h2 class = "site-name">HISTORYFIRE</h2>
            </div>
            <ul class = "sections-list">
                <li>
                    <a class = "sections-list-close-button section refs" href = "#">
                        <img src = "/img/house-icon.svg">
                        <p>Главная</p>
                    </a>
                </li>
                <li>
                    <a class = "section underline refs" href = "#">
                        <img src="/img/star-icon.svg">
                        <p>Рейтинг</p>
                    </a>
                </li>
                <li class="section">
                    <p>Вы</p>
                    <img src = "/img/right-slide-icon.svg">
                </li>
                <li>
                    <a class = "section refs" href = "#">
                        <img src = "/img/user-icon.svg">
                        <p>Профиль</p>
                    </a>
                </li>
                <li>
                    <a class="section underline refs" href = "#">
                        <img src = "/img/favourite-icon.svg">
                        <p>Избранное</p>
                    </a>
                </li>
            </ul>
        </div>
        <!--
        <div class = "registration-form hidden">
            <h2 class = "registration-form-header">Регистрация</h2>
            <form action="register.php" id = "regform" method="post" name="regform">
                <input class = "registration-form-field" id="full_name" name="full_name" type="text" placeholder="Имя">
                <input class = "registration-form-field" id="email" name="email" type="email" placeholder="Электронная почта">
                <input class = "registration-form-field" id="password" name="password" type="password" placeholder="Придумайте пароль">
                <input class = "registration-form-field" id="repeat-password" name="repeat-password" type="password" placeholder="Повторите пароль">
                <input class = "registration-form-button refs" id="reg" name= "reg" type="submit" value = "Зарегистрироваться">
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
        -->
    </main>
    <footer class = "footer">
        <ul class = "footer-topics">
            <li>
                <a class="footer-topics-item" href = "#">
    Наш блог
</a>
            </li>
            <li>
                <a class="footer-topics-item" href = "#">
    Поддержка
                </a>
            </li>
        </ul>
    </footer>

</body>
<script src = "../index.js"></script>
</html>