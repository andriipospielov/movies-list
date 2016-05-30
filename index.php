<?php

/*autoloader*/
require_once(__DIR__ . '/vendor/autoload.php');
/* Инициализация и запуск FrontController */
$front = FrontController::getInstance();
$front->route();
/* Вывод данных */
echo $front->getBody();