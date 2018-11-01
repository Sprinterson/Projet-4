<?php

namespace OpenClassrooms\Projet4\Model; // La classe sera dans ce namespace

class Manager
{
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
        return $db;
    }
}