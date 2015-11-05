<?php
define('APPLICATION_PATH', realpath(__DIR__));
define('BASE_URI', "{$_SERVER['REQUEST_SCHEME']}://{$_SERVER['HTTP_HOST']}". explode('?', $_SERVER['REQUEST_URI'])[0]);
?>
