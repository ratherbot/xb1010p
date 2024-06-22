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

    $_SESSION['success'] = '';
    return true;
}

function check_auth(): bool
{
    return isset($_SESSION['user']);
}

function generation_posts_index ($mysqli) {
    // SQL запрос для получения всех статей на сайте
    $sql = "SELECT * FROM `articles`";
    // Отправляем SQL запрос
    $res = $mysqli -> query($sql);
    // Проверка что есть статьи
    if ($res -> num_rows > 0) {
        // Выводим статьи
        while ($resArticle = $res -> fetch_assoc()) {
            ?>
            <li class = "img-1">
                <a class = "fav" href = "favourite.html">
                    <img src="img/favourite-postcard-icon-2.svg">
                </a>
                <a class = "normal-card-text ref" href = "#">Нил Армстронг Американский астронавт НАСА</a>
            </li>
            <?php
        }
    } else {
        // Если нет статей то выводим надпись
        echo "Нет статей";
    }
}

function generation_posts_topic ($mysqli, $id_topic) {
    // Строим SQL запрос
    $sql = "SELECT * FROM `articles` WHERE `id_topic` = $id_topic";
    // Отправляем SQL запрос
    $res = $mysqli -> query($sql);
    // Проверяем есть ли статьи
    if ($res -> num_rows > 0) {
        // Через цикл выводим статьи
        while ($resArticle = $res -> fetch_assoc()) {
            ?>
            <li class = "img-1">
                <a class = "fav" href = "favourite.html">
                    <img src="img/favourite-postcard-icon-2.svg">
                </a>
                <a class = "normal-card-text ref" href = "#">Нил Армстронг Американский астронавт НАСА</a>
            </li>
            <?php
        }
    } else {
        // Если нет статей, то выводим надпись
        echo "В этом раздели статей нету";
    }
}

function generation_post ($mysqli, $id_article) {
    // Строим SQL запрос
    $sql = "SELECT * FROM `articles` WHERE `id` = '$id_article'";
    // Отправляем SQL запрос
    $res = $mysqli -> query($sql);
    // Проверяем есть ли статья
    if ($res -> num_rows === 1) {
        // Получаем и выводим статью
        $resPost = $res -> fetch_assoc()?>
        <div class = "big-image">
            <img src = "img/post-image.png">
        </div>
        <div class = "big-yellow-cover">
            <h2 class = "post-header">Уроки школьной политинформации: Как это было?</h2>
            <p class = "post-text">Многие из нас, вероятно, помнят те уроки в школе, когда нас учили основам политической информации. Это было нечто большее, чем просто изучение политических систем и партий. Эти уроки ставили своей целью воспитание граждан, способных разбираться в политических процессах, анализировать информацию и принимать обоснованные решения.
                На этих уроках мы учились различать факты от мнений, понимать механизмы избирательной системы, изучали идеологии политических партий и осваивали навыки критического мышления. Мы изучали историю политических движений, анализировали актуальные политические события и дискутировали на различные темы.
                <br>
                <br>Эти уроки помогали нам понимать, как работает наша страна, и как наше участие может повлиять на ее развитие. Мы учились уважать мнения других людей, даже если они отличались от наших собственных, и стремились к конструктивному диалогу.
                Однако, как это было в реальности? Каждый опыт учебного заведения может отличаться, и некоторые школьники могли встретиться с уроками политинформации, которые были не столь эффективными или вдохновляющими.
                Некоторые могли чувствовать, что политика — это слишком сложная тема, чтобы ее изучать в школе, или что они не видят прямой пользы от таких уроков.
                <br>
                <br>Важно признать, что уроки политинформации в школе могут быть ключевым инструментом для формирования активных граждан и будущих лидеров.</p>
            <a class = "author-ref-icon" href = "profile.php">
                <img src = "img/big-gray-circle.svg">
                <p>
                    HistoryFire
                </p>
            </a>
        </div>
        <?php
    }
}