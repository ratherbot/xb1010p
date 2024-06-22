<?php

//Старт сессии
session_start();

//Подключение файлов
require_once __DIR__ . '/incs/config.php';
require_once ROOT . '/incs/db.php';
require_once ROOT . '/incs/func.php';

?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <title>Профиль</title>
    <link rel = "stylesheet" href = "css/profile-style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
</head>

<body>
<header class = "header">
    <nav>
        <ul class = "navigation-profile">
            <li class = "logo">
                <a class="site-icon" href = "index.php">
                    <img src = "img/site-icon.png">
                </a>
            </li>
            <li>
                <a class = "logo-name" href = "index.php">
                    HISTORYFIRE
                </a>
            </li>
            <li>
                <a class = "small-logo" href = "#">
                    <img src = "img/small-logo.png">
                </a>
            </li>
        </ul>
    </nav>
</header>
<main>
    <section class = "profile">
        <ul class = "tab-list">
            <li>
                <a href = "old/index.html">
                    <img src = "img/house-icon.svg">
                    <p>
                        Главная
                    </p>
                </a>
            </li>
            <li>
                <a class = "border-bottom" href = "rating.php">
                    <img src = "img/star-icon.svg">
                    <p>
                        Рейтинг
                    </p>
                </a>
            </li>
            <li class = "list-item-slide">
                <p>Вы</p>
                <img src = "img/right-slide-icon.svg">
            </li>
            <li>
                <a href = "#">
                    <img src = "img/user-icon.svg">
                    <p>
                        Профиль
                    </p>
                </a>
            </li>
            <li>
                <a class = "border-bottom" href = "favourite.php">
                    <img src = "img/favourite-icon.svg">
                    <p>
                        Избранное
                    </p>
                </a>
            </li>
        </ul>
        <div class = "profile-preview">
            <img class = "big-site-icon" src = "img/big-site-icon.png">
            <div class = "prof-descript">
                <?php if (check_auth()): ?>
                <h1><?= $_SESSION['user']['name']?></h1>
                <?php else: ?>
                <h1>Войдите</h1>
                <?php endif; ?>
                <p class = "description"><p>
                <div class = "sub-button">
                    <a class = "subscribe-button ref" href = "#">
                        Подписаться
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class = "create-post">
        <div class="place">
            <div class="create-post-history">
                <img class="create-history-icon" src = "img/site-icon.png">
                <button class="create-button" href = "#">
                    Напишите свою историю
                </button>
            </div>
            <div class="input-description hidden">
                <input class = "input-heading" id="heading" name="full_name" type="text" placeholder="Заголовок">
                <textarea rows="4" cols="50" class="input-text" placeholder="Введите текст здесь..."></textarea>
                <select class="choose-category" name= "variant">
                    <option selected="selected">Первобытное сообщество</option>
                    <option>Древний мир</option>
                    <option>Средние века</option>
                    <option>Новое время</option>
                </select>
                <input class = "input-file" id = "myfile" name = "myfile" type = "file">
                <button class = "create-post-button">Опубликовать</button>
                <button class = "create-close-button">Закрыть раздел</button>
            </div>
        </div>
    </section>
    <section class = "blog-section">
        <div class = "post">
            <div class = "post-popularity">
                <img src="img/profile-post.png">
            </div>
            <div>
                <h2 class="post-header">Уроки школьной политинформации: Как это было?</h2>
                <p class="post-text">Уроки политинформации, проводимые в определенные дни перед началом уроков,
                    как раз и относились к разряду "отчетных" мероприятий, не неся в себе никакой ценности для учащихся.
                    Наверное, во всех советских школах эти уроки проходили примерно одинаково: в какой-то один учебный день на занятия нужно было являться на 15-30 минут раньше обычного,
                    потому что это время отводилось на политинформацию.</p>
                <a class = "read-next ref" href = "post.php">
                    <p>Читать далее</p>
                    <img src = "img/arrow_forward.svg">
                </a>
            </div>
        </div>
    </section>
</main>
</body>
<script src = "profile.js"></script>
</html>