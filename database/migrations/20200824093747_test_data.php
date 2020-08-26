<?php
//migrationから読み込んだ場合はエラーになるのでrequireしない
if (file_exists('../../Bootstrap.php')) {
    require_once '../../Bootstrap.php';
}

use database\Schema;

class Test_data
{
    public static function up()
    {

        //サンプル、テーブル作成↓
        Schema::create_table('test', array('id INT(11) AUTO_INCREMENT PRIMARY KEY', 'name VARCHAR(20)'));
    }
    public function down()
    {
        // サンプル、テーブル削除
        Schema::drop_column('test', 'name');
    }
}
return 'Test_data';
