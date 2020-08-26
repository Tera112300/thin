<?php

//namespace database;

require_once '../Bootstrap.php';

//use DateTime;

class Migration
{
    public static $db;
    public static function create($name)
    {
        $timestamp = new DateTime();
        $filename = $timestamp->format('YmdHis') . '_' . $name . ".php";
        $filepath = __DIR__ . "/migrations/" . $filename;
        $uc_first_name = ucfirst($name);
        $class_name = '$class_name';
        $content = <<<EOF
        <?php
        //migrationから読み込んだ場合はエラーになるのでrequireしない
        if (file_exists('../../Bootstrap.php')) {
            require_once '../../Bootstrap.php';
        }
        use database\Schema;
        class $uc_first_name
        {
          public static function up()
          {
              //サンプル、テーブル作成↓
              // Schema::create_table('test', array('id INT(11) AUTO_INCREMENT PRIMARY KEY', 'name VARCHAR(20)'));
          }
          public function down()
          {
              // サンプル、テーブル削除
              //Schema::drop_table('test');
          }
        }
        return '$uc_first_name';
        EOF;
        file_put_contents($filepath, $content);
        //echoは後でエラー判定の処理を書く
        echo 'createに成功しました。';
    }
    public static function migrateUp()
    {
        $migrations_dir = __DIR__ . "/migrations/";
        $migrations_files = scandir($migrations_dir);
        //print_r($tests);
        if (is_readable($migrations_dir)) {
            //echo '読み込み可能です。';
            foreach ($migrations_files as $migrations_file) {
                //phpファイルのみ出力
                if (!preg_match('/^(\.|\.\.)$/', $migrations_file) && preg_match('/\.(php)$/i', $migrations_file)) {
                    $migrate_retrun = require_once $migrations_dir . $migrations_file;
                    $migrate_instance = new $migrate_retrun();
                    if (method_exists($migrate_instance, 'up')) {
                        $migrate_instance->up();
                    }
                }
            }
            echo 'migrateUpに成功しました。';
        } else {
            echo '読み込み権限が有りません。';
        }
    }
    public static function migrateDown()
    {
        $migrations_dir = __DIR__ . "/migrations/";
        $migrations_files = scandir($migrations_dir);
        //print_r($tests);
        if (is_readable($migrations_dir)) {
            //echo '読み込み可能です。';
            foreach ($migrations_files as $migrations_file) {
                //phpファイルのみ出力
                if (!preg_match('/^(\.|\.\.)$/', $migrations_file) && preg_match('/\.(php)$/i', $migrations_file)) {
                    $migrate_retrun = require_once $migrations_dir . $migrations_file;
                    $migrate_instance = new $migrate_retrun();
                    if (method_exists($migrate_instance, 'down')) {
                        $migrate_instance->down();
                    }
                }
            }
            echo 'migrateDownに成功しました。';
        } else {
            echo '読み込み権限が有りません。';
        }
    }
}
