<?php

namespace lib\mylib;

//require_once '../../Bootstrap.php';

use app\model\Model;
use \PDO;

class TagCloud
{
    public $datas;

    public function __construct($name)
    {
        $this->datas = Model::query()->select($name)->sql_select->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getTag()
    {
        $arrayTag = "";
        foreach ($this->datas as $data) {
            //最後尾が,でなければつける
            if (mb_substr($data['name_tag'], -1) == ',') {
                $arrayTag .= $data['name_tag'];
            } else {
                $arrayTag .= $data['name_tag'] . ',';
            }
        }
        //,区切りで配列にしてarray_filterで空配列削除
        $arrayTag = explode(",", $arrayTag);
        $arrayTag = array_filter($arrayTag, "strlen");
        return $arrayTag;
    }
    public function getCount()
    {
        return array_count_values($this->getTag());
    }
    public function getTagClass()
    {
        $max = count($this->getTag());
        $class_names = ['tag_xs', 'tag_sm', 'tag_md', 'tag_lg'];
        $class_array = array();
        //タグの総数で%を求めてクラスをつける
        foreach ($this->getCount() as $key => $value) {
            $Calculation = floor($value / $max * 100);
            if ($Calculation <= 25) {
                $class_array[] = $class_names[0];
            } else if ($Calculation <= 50) {
                $class_array[] = $class_names[1];
            } else if ($Calculation <= 75) {
                $class_array[] = $class_names[2];
            } else if ($Calculation <= 100) {
                $class_array[] = $class_names[3];
            }
        }
        return $class_array;
    }
}
