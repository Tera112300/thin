<?php

namespace app\core;

//require_once '../Bootstrap.php';

use PDO;
use PDOException;

class Database
{
    protected $connections;

    protected $schema = array(
        'default' => array(
            'host' => 'mysql:host=localhost',
            'dbname' => 'dbname=test',
            'charset' => 'charset=utf8',
            'user' => 'root',
            'password' => ''
        ),
        'dev' => array(
            'default' => array(
                'host' => 'mysql:host=localhost',
                'dbname' => 'dbname=test',
                'charset' => 'charset=utf8',
                'user' => 'root',
                'password' => ''
            )
        ),
    );
    protected $db_info = array();

    public function __construct($schemaName = "default")
    {

        //何もしなければdefault dev開発者用
        $this->db_info = $this->schema[$schemaName];
        try {
            $conn = new PDO($this->db_info['host'] . ';' . $this->db_info['dbname'] . ';' . $this->db_info['charset'], $this->db_info['user'], $this->db_info['password']);
            //$conn = new PDO("mysql:host=mysql1.php.starfree.ne.jp; dbname=beattera_db; charset=utf8", 'beattera_test', 'tt19961123');
            //$conn = new PDO("mysql:host=localhost; dbname=test; charset=utf8", "root", "");
            if ($conn == null) {
                echo '接続に失敗しました。<br>';
            }
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //コネクション
            $this->connections = $conn;
        } catch (PDOException $e) {
            echo 'Error:' . $e->getMessage();
        }
    }
    //接続ゲット
    public function getConnection()
    {
        return $this->connections;
    }

    //sqlエスケープ
    private function escape($string)
    {
        return $this->db_info->quote($string);
    }

    public function __destruct()
    {
        //閉じる
        $this->connections = null;
    }
}
