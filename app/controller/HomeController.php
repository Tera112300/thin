<?php

namespace app\controller;

//require_once '../../Bootstrap.php';

use app\model\Home;
use app\link\Link;
use \PDO;

class HomeController extends Controller
{
    public function index()
    {
        global $Skinny;

        //ページネーション

        $Skinny->SkinnyDisplay("home.html");
    }
    public function pagination_demo()
    {
        global $Skinny;
        $out = array();
        //$paginate  = Home::query()->select('user')->plural('select count(*) from user')->paginate(2);

        //モデルに処理変更
        $paginate  = new Home();
        //ページネーション
        $out['disp_data'] = $paginate->pagination_demo()->disp_data;
        $out['pages'] = $paginate->pagination_demo()->pages;
        $out['now']  = $paginate->pagination_demo()->now;
        //ページネーション

        $Skinny->SkinnyDisplay("pagination_demo.html", $out);
    }

    public function form()
    {
        global $Skinny;

        //ページネーション

        $Skinny->SkinnyDisplay("form.html");
    }
}
