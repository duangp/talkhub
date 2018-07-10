<?php
header("content-type:text/html,charset=utf-8");
//开启调试模式 走convention文件，false走runtime文件

define('APP_DEBUG', TRUE);
include '../ThinkPHP/ThinkPHP.php';