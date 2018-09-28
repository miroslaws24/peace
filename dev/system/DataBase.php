<?php
/**
 * Created by PhpStorm.
 * User: Account
 * Date: 26.09.2018
 * Time: 22:24
 */
require_once 'ConfigSystem.php';
class DataBase
{
    public function addInBase($sql)
    {
        $configSystem = new configSystem();
        $configSystem->connectToBase();


        return $pdo->query($sql);
    }

    public function selectFromBase($sql)
    {
        $configSystem = new configSystem();
        $configSystem->connectToBase();

        $pdo = new configSystem($dsn, $login, $password, $opt);
        return $pdo->query($sql);
    }

    public function updateBase($sql)
    {
        $configSystem = new configSystem();
        $configSystem->connectToBase();

        $pdo = new configSystem($dsn, $login, $password, $opt);
        return $pdo->query($sql);
    }
}