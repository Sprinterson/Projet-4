<?php

namespace OpenClassrooms\Projet4\Model; // La classe sera dans ce namespace

use \PDO;

abstract class Database
{

    const DB_HOST = 'db766157077.hosting-data.io';
    const DB_PORT = '3306';
    const DB_NAME = 'db766157077';
    const DB_USER = 'dbo766157077';
    const DB_PASS = 'Tigre3019$';

    private static $db;

    public static function dbConnect() {
        if (self::$db === null){
            $db = new PDO('mysql:host=' . self::DB_HOST . ';port=' . self::DB_PORT . ';dbname=' . self::DB_NAME . ';charset=utf8', self::DB_USER, self::DB_PASS);

            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            self::$db = $db;          
        }

        return self::$db;
    }
}