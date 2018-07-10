<?php

namespace Admin\Extend;


class Auth
{
    public static function createTable()
    {
        $sql = "
 CREATE TABLE IF NOT EXISTS auth_table (
  `id` smallint(6) unsigned NOT NULL,   
  `parent_id` smallint(6) unsigned NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `model` varchar(50) DEFAULT NULL,
  `comtroller` varchar(50) DEFAULT NULL,
  `action` varchar(50) DEFAULT NULL,
  `route` varchar(50) DEFAULT NULL
)DEFAULT CHARSET=utf8;


";
        $mysql = mysqli_connect('127.0.0.1', 'root', 'root', 'blog', '3306') or die('连接失败');
        $mysql->query($sql);
        $mysql->close();
    }

    /**
     * 初始化
     */
    public static function set()
    {
        $data = require "authData.php";
        self::processData($data);
    }

    /**
     * @param $data
     * @param int $parent
     */
    private static function processData(&$data, $parent = 0)
    {
        foreach ($data as $key1 => $value1) {
            $name = $value1['name'];
            $model =  $value1['model'];
            $action =  $value1['action'];
            $controller = $value1['controller'];
            $route = $value1['route'];
            if ($name && $model && $action && $controller && $route) {
                $sql = "INSERT auth_table (`parent_id`, `name`, `model`, `action`, `controller`, `route`) VALUES ($parent, '$name', '$model', '$action', '$controller', '$route')";
            } else if ($name && $model && $action && $controller) {
                $sql = "INSERT auth_table (`parent_id`, `name`, `model`, `action`, `controller`) VALUES ($parent, '$name', '$model', '$action', '$controller')";
            } else if ($name && $model && $action) {
                $sql = "INSERT auth_table (`parent_id`, `name`, `model`, `action`) VALUES ($parent, '$name', '$model', '$action')";
            } else if ($name && $model) {
                $sql = "INSERT auth_table (`parent_id`, `name`, `model`) VALUES ($parent, '$name', '$model')";
            } else if ($name) {
                $sql = "INSERT auth_table (`parent_id`, `name`) VALUES ($parent, '$name')";
            }
            $mysql = mysqli_connect('127.0.0.1', 'root', 'root', 'blog', '3306') or die('连接失败');
            $mysql->query($sql);
            $sql = "select `id` from auth_table ORDER BY `id` limit 1";
            $id = $mysql->query($sql);
            $id = mysqli_fetch_object($id);
            $mysql->close();
            foreach ($value1 as $key => $value) {
                if ($key == 'child') {
                    self::processData($value['child'], $id->id);
                }
            }
        }
    }

    public static function get($uid)
    {

    }

    public static function checkAuth($uid, $Model, $Controller, $Action)
    {

    }
}