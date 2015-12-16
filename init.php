<?php
define('APPLICATION_PATH', realpath(__DIR__));
define('CONFIG_FILE_NAME', APPLICATION_PATH . '/configuration.data.php');
define('BASE_URI', "{$_SERVER['REQUEST_SCHEME']}://{$_SERVER['HTTP_HOST']}". explode('?', $_SERVER['REQUEST_URI'])[0]);
?>
