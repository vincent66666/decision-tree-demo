<?php
date_default_timezone_set('Asia/Shanghai');

if (!defined("TOP_AUTOLOADER_PATH"))
{
	define("TOP_AUTOLOADER_PATH", dirname(__FILE__));
}

/**
* 注册autoLoader,此注册autoLoader只加载top文件
* 不要删除，除非你自己加载文件。
**/
require("Autoloader.php");