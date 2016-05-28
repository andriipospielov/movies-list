<?php


/* Имена файлов: views */
/*define('USER_DEFAULT_FILE', 'user_default.php');
define('USER_ROLE_FILE', 'user_role.php');
define('USER_LIST_FILE', 'user_list.php');
define('USER_ADD_FILE', 'user_add.php');*/

require_once(__DIR__ . '/vendor/autoload.php');



/* Инициализация и запуск FrontController */
$front = FrontController::getInstance();
$front->route();

/* Вывод данных */
echo $front->getBody();