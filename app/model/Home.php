<?php

namespace app\model;



use \PDO;

class Home extends Model
{
    public function pagination_demo()
    {
        $paginate = parent::query()->select('user')->plural('select count(*) from user')->paginate(2);
        $paginate->disp_data = $this->escape_each($paginate->disp_data, array('id', 'name', 'description', 'create_at', 'update_at', 'status'));
        return $paginate;
    }
}
