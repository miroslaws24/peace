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
        $pdo = $configSystem->connectToBase();

        return $pdo->quer($sql);
    }
}