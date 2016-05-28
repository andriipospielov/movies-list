<?php

class DB
{
    static private $_instance = null;
    public $pdo;

    public static function getInstance()
    {
        if (!(self::$_instance))
            self::$_instance = new self();
        return self::$_instance;
    }

    private function __construct()
    {

        $dsn = 'mysql:host=localhost;dbname=MOVIES';
        $user = 'root';
        $password = '';
        try {

            $opt = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            );
//            $pdo = new PDO($dsn, $user, $password);
            $pdo = new PDO($dsn, $user, $password, $opt);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
            die();
        }
        $this->pdo = $pdo;


    }


}