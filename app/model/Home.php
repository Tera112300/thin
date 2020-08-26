<?php

namespace app\model;



use \PDO;

class Home extends Model
{
    public function pagination_demo()
    {
        $paginate = parent::query()->select('user')->plural('select count(*) from user')->paginate(2);
        return $paginate;
    }
}
