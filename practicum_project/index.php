<?php

//Старт сессии
session_start();

//Подключение файлов
require_once __DIR__ . '/incs/config.php';
require_once ROOT . '/incs/db.php';
require_once ROOT . '/incs/func.php';



$title = 'Историческое веб-портфолио';

require_once VIEWS . '/index.tpl.php';