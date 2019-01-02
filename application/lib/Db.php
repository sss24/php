<?php

namespace application\lib;

use PDO;

class Db
{

    public $pdo;
    protected static $instance;

    public function __construct()
    {
        if (file_exists('application/config/db.php')) {
            $db = require 'application/config/db.php';
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ];
            $this->pdo = new PDO($db['dns'], $db['user'], $db['password'], $options);
        }
    }

    public static function instance()
    {
        if (self::$instance === null) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function execute($sql)
    {
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute();
    }

    public function query($sql, $params = [])
    {
        $stmt = $this->pdo->prepare($sql, $params);
        $result = $stmt->execute($params);
        if ($result !== false) {
             return $stmt->fetchAll();
        }
        return [];
    }
}