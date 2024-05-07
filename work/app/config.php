<?php

session_start();

/*
mysqlの場合 mysql:
host指定=mysqlがセットされたマシンの名前 host=db;
dbname指定=扱っていくデータベース名　myapp
charset指定=文字コード指定utf8mb4
*/

define('DSN', 'mysql:host=db;dbname=myapp;charset=utf8mb4');
define('DB_USER', 'myappuser');
define('DB_PASS', 'myapppass');
define('SITE_URL', 'http://' . $_SERVER['HTTP_HOST']);


spl_autoload_register(function ($class) {
    $prefix = 'MyApp\\';

    if (strpos($class, $prefix) === 0) {
        $fileName = sprintf(__DIR__ . '/%s.php' , substr($class, strlen($prefix)));

        if(file_exists($fileName)) {
            require($fileName);
        } else {
            echo 'File not found: ' . $fileName;
            exit;
        }
    }
});