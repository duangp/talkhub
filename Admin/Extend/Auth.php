<?php
namespace Admin\Extend;


class Auth
{
    public static function createTable()
    {
        $tableName = 'auth_table';
        $sql = <<<eof
 CREATE TABLE IF NOT EXISTS $tableName (
  `id` smallint(6) unsigned NOT NULL,   
  `parent_id` smallint(6) unsigned NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `model` varchar(50) DEFAULT NULL,
  `comtroller` varchar(50) DEFAULT NULL,
  `action` varchar(50) DEFAULT NULL,
  `route` varchar(50) DEFAULT NULL,
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
eof;
    $mysql = mysqli_connect('127.0.0.1', 'root', 'root', 'blog', '3306') or die('连接失败');
    $mysql->query($sql);
    $mysql->close();
    }

    public static function set()
    {
        $data = require "authData.php";

        
    }

    public static function get($uid)
    {

    }

    public static function checkAuth($uid, $Model, $Controller, $Action)
    {

    }
}