<?php

namespace database;

//require_once '../Bootstrap.php';

use Exception;

class Schema
{
    public static $db;
    public static function create_table($table_name, $items)
    {
        self::$db = new \app\core\Database();
        $pdo = self::$db->getConnection();
        // テーブルが存在していなければ作成する。
        $item = implode(",", $items);
        $sql = 'CREATE TABLE IF NOT EXISTS ' . $table_name . '(' . $item . ');';
        $stmt = $pdo->prepare($sql);
        try {
            if ($stmt->execute() != true) {
                throw new Exception($stmt->execute());
            } else {
                //echo 'テーブルの作成に成功しました。';
            }
        } catch (Exception $e) {
            echo $e->getMessage() . '<br>';
            exit();
        }
    }

    public static function add_column($table_name, $column_names)
    {
        self::$db = new \app\core\Database();
        $pdo = self::$db->getConnection();

        $column_name = implode(",", $column_names);

        $sql = 'ALTER TABLE ' . $table_name . ' ADD COLUMN IF NOT EXISTS ' . '(' . $column_name . ');';
        $stmt = $pdo->prepare($sql);
        try {
            if ($stmt->execute() != true) {
                throw new Exception($stmt->execute());
            } else {
                //echo 'テーブルのカラムの追加に成功しました。';
            }
        } catch (Exception $e) {
            echo $e->getMessage() . '<br>';
            exit();
        }
    }


    public static function drop_table($table_name)
    {
        self::$db = new \app\core\Database();
        $pdo = self::$db->getConnection();
        $sql = 'DROP TABLE IF EXISTS ' . $table_name;
        $stmt = $pdo->prepare($sql);
        try {
            if ($stmt->execute() != true) {
                throw new Exception($stmt->execute());
            } else {
                //echo 'テーブルの削除に成功しました。';
            }
        } catch (Exception $e) {
            echo $e->getMessage() . '<br>';
            exit();
        }
    }
    public static function drop_column($table_name, $column_names)
    {
        self::$db = new \app\core\Database();
        $pdo = self::$db->getConnection();
        $column_name = implode(",", $column_names);

        $sql = 'ALTER TABLE ' . $table_name . ' DROP COLUMN IF EXISTS ' . '(' . $column_name . ');';

        $stmt = $pdo->prepare($sql);
        try {
            if ($stmt->execute() != true) {
                throw new Exception($stmt->execute());
            } else {
                //echo 'テーブルのカラムの削除に成功しました。';
            }
        } catch (Exception $e) {
            echo $e->getMessage() . '<br>';
            exit();
        }
    }
}
