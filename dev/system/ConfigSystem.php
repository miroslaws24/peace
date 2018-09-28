<?php
/**
 * Created by PhpStorm.
 * User: Account
 * Date: 26.09.2018
 * Time: 22:25
 */
define('DB_NAME','peace_db');
define('DB_LOGIN','root');
define('DB_PASS','');
define('DB_CHARSET','UTF-8');
define('DB_HOST','127.0.1');

class ConfigSystem
{
    public function connectToBase()
    {

        $dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=".DB_CHARSET."";
        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $pdo = new PDO($dsn, DB_LOGIN, DB_PASS, $opt);
    }
}