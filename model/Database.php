<?php

namespace OpenClassrooms\Projet4\Model; // La classe sera dans ce namespace

use \PDO;

abstract class Database
{

    const DB_HOST = 'localhost';
    const DB_NAME = 'test';
    const DB_USER = 'root';
    const DB_PASS = '';

    private static $db;

    public static function dbConnect() {
        if (self::$db === null){
            $db = new PDO('mysql:host=' . self::DB_HOST . ';dbname=' . self::DB_NAME . ';charset=utf8', self::DB_USER, self::DB_PASS);

            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            self::$db = $db;          
        }

        return self::$db;
    }
}