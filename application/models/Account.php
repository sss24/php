<?php

namespace application\models;

use application\core\Model;

class Account extends Model{
    public $table = 'jobs';
    public $pk = 'position';


    public function findJobs()
    {
        $sql = "SELECT * FROM jobs";
        return $this->pdo->query($sql);
    }
}