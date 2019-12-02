<?php

class DataBase
{

    private static $db = null;
    private $mysqli;

    public static function getDB()
    {
        if (self::$db == null) self::$db = new DataBase();
        return self::$db;
    }

    private function __construct()
    {
        $this->mysqli = new mysqli("localhost", "formValidation", "password");
        $this->mysqli->query('CREATE DATABASE IF NOT EXISTS users');
        $this->mysqli->select_db('users');
        $this->mysqli->query('CREATE TABLE IF NOT EXISTS users (
                                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                                firstname VARCHAR(30) NOT NULL,
                                lastname VARCHAR(30) NOT NULL,
                                patronymic VARCHAR(30) NOT NULL,
                                address VARCHAR(50),
                                birthday VARCHAR (50),
                                reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                                ) ENGINE=InnoDB DEFAULT CHARACTER SET=utf8');
        $this->mysqli->query("SET lc_time_names = 'ru_RU'");
        $this->mysqli->query("SET NAMES 'utf8'");
    }

    public function query($query)
    {
        $success = $this->mysqli->query($query);
        if ($success) {

            return $this->mysqli->insert_id;

        } else {

            return false;

        }

    }

    public function __destruct()
    {
        if ($this->mysqli) $this->mysqli->close();
    }
}
