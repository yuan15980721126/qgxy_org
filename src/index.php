<?php
/** * * index(入口文件) * * @package
 * Yourphp * @author
 * liuxun QQ:147613338 <web@yourphp.cn> * @copyright
 * Copyright (c) 2008-2011  (http://www.yourphp.cn)
 * @license         http://www.yourphp.cn/license.txt * @version
 * YourPHP企业网站管理系统 v2.1 2012-10-08 yourphp.cn $ */
header("Content-type: text/html;charset=utf-8");
ini_set('memory_limit', '128M');
ini_set("zend.ze1_compatibility_mode", "off");
error_reporting(E_ERROR | E_WARNING | E_PARSE);
define('Yourphp', true);
define('UPLOAD_PATH', './Uploads/');
define('VERSION', 'v2.2 Released');
define('UPDATETIME', '20121225');
define('APP_NAME', 'Yourphp');
define('APP_PATH', './Apps/');
define('APP_LANG', true);
define('APP_DEBUG', 1);
define('THINK_PATH', './Core/');
header('Access-Control-Allow-Origin: *');
require(THINK_PATH . 'Core.php'); ?>