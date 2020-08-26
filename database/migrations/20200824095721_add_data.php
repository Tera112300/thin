<?php
//migrationから読み込んだ場合はエラーになるのでrequireしない
if (file_exists('../../Bootstrap.php')) {
    require_once '../../Bootstrap.php';
}

use database\Schema;

class Add_data
{
    public static function up()
    {
        //サンプル、テーブル作成↓
        Schema::add_column('test', array('fs_test varchar(10)', 'ez_test varchar(10)'));
    }
    public function down()
    {
        // サンプル、テーブル削除
        //Schema::drop_table('test');
    }
}
return 'Add_data';
