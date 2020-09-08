<?php

namespace app\model;

//require_once '../../Bootstrap.php';

use \PDO;

class Model
{
    public $db;
    public $sql_select;
    public $sql_plural;

    //ページネーション用プロパティ
    public $disp_data;
    public $pages;
    public $now;

    //SELECT文のときに使用する関数。
    public static function query()
    {
        return new static;
    }
    public function select($sql_name)
    {
        $this->db = new \app\core\Database();
        $this->sql_select = $this->db->getConnection()->query('SELECT * FROM ' . $sql_name);
        return $this;
    }
    //SELECT,INSERT,UPDATE,DELETE文の時に使用する関数。
    public function plural($sql_name, $item = array())
    {
        $this->db = new \app\core\Database();
        $this->sql_plural = $this->db->getConnection()->prepare($sql_name);
        $this->sql_plural->execute($item); //sql文のVALUES等の値が?の場合は$itemでもいい。
        return $this;
    }
    public function paginate($max_num = 1)
    {
        $max = $max_num;

        $data =  $this->sql_select->fetchAll(PDO::FETCH_ASSOC);

        $total =  $this->sql_plural->fetchColumn();
        $this->pages = ceil($total / $max); // 総件数÷1ページに表示する件数 を切り上げたものが総ページ数


        if (!isset($_GET['page_id'])) { // $_GET['page_id'] はURLに渡された現在のページ数
            $this->now = 1; // 設定されてない場合は1ページ目にする

        } else {
            $this->now = $_GET['page_id'];
            if (!preg_match("/^[0-9]+$/", htmlspecialchars($_GET['page_id']))) {
                $this->now = 1;
            }
        }



        $start_no = ($this->now - 1) * $max; // 配列の何番目から取得すればよいか

        // array_sliceは、配列の何番目($start_no)から何番目(MAX)まで切り取る関数
        //$this->disp_data = array_slice($data, $start_no, $max, true);
        $this->disp_data = array_slice($data, $start_no, $max, false);
        return $this;
    }

    public function escape($s)
    {
        return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
    }

    public function escape_each($target, $array_names)
    {
        $i = 0;
        foreach ($target as $es) {
            foreach ($array_names as $array_name) {
                $target[$i][$array_name] = Model::query()->escape($es[$array_name]);
            }
            $i++;
        }
        return $target;
    }

    public function Array_FetchHtml($names, $parameter)
    {
        global $Skinny;
        foreach ($names as $name) {
            $spa_data = $Skinny->SkinnyFetchHTML($name . ".tpl", $parameter);
            file_put_contents(__DIR__ . "/../../view/spa_template/" . $name . ".html", $spa_data);
        }
    }
}
