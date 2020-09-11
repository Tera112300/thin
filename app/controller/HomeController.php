<?php

namespace app\controller;

//require_once '../../Bootstrap.php';

use app\model\Home;
use app\link\Link;
use lib\mylib\Mail;
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

    public function form_mail()
    {
        $test = new Mail();
        $option = $test->option("test@gmail.com", "TEST事務局");
        $mail_body = $test->create_mail('TEST事務局', 'admin@gmail.com', 'テストです。', 'mail.tpl', $option);
        date_default_timezone_set('Asia/Tokyo');

        $out = array();
        $out = $mail_body;
        $out['list_customer'][] = array('title' => 'お名前：', 'customer' => 'tera');
        $out['list_customer'][] = array('title' => 'メールアドレス:', 'customer' => 'test@gmail.com');
        $out['list_customer'][] = array('title' => '電話番号:', 'customer' => '000-0000-000');

        $out['list_data'][] = array('title' => 'ご用件:', 'data' => 'その他');
        $out['list_data'][] = array('title' => 'お問い合わせ内容:', 'data' => '内容');
        $out['list_data'][] = array('title' => '受付日時:', 'data' => date('Y年m月d日'));

        $out['name'] = 'tera';
        $out['date01'] = time();

        $out['title'] = $test->mail_array['subject'];

        $maildata =  $test->Skinny_mail->SkinnyFetchHTML($test->mail_array['body'], $out);

        $test->send($maildata);
    }
}
