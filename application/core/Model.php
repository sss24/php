<?php

namespace application\core;

use application\lib\Db;

abstract class Model
{
    protected $pdo;
    protected $table;
    protected $pk = 'id';

    public function __construct()
    {
        $this->pdo = Db::instance();
    }

    public function query($sql)
    {
        return $this->pdo->execute($sql);
    }

    public function findAll()
    {
        $sql = "SELECT * FROM {$this->table}";
        return $this->pdo->query($sql);
    }

    public function findOne($id, $field = '')
    {
        $field = $field ?: $this->pk;
        $sql = "SELECT * FROM {$this->table} WHERE $field = ? LIMIT 1";
        return $this->pdo->query($sql, [$id]);
    }
}