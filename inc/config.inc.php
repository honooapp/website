<?php
ini_set("display_errors",1);

session_start();
define("HONOO_URL",'http://www.honoo.it'.'/');
define("HONOO_ROOT",$_SERVER['DOCUMENT_ROOT'].'/');
define("HONOO_IMAGE_PATH",HONOO_ROOT . 'uploads/');

$_CONFIG = array();


/*************START CONFIGURATION*****************/
$_CONFIG['system']['langs'] = array("it","en","es","ch");
$_CONFIG['system']['default_lang'] = "it";
$_CONFIG['system']['max_num_posts'] = 5;
$_CONFIG['system']['allowedMimes'] = array("image/jpeg","image/pjpeg","image/jpeg","image/pjpeg");
$_CONFIG['vendor']['google']['secret'] = "6LdO1U0UAAAAAKOml2Fw8CQbdT0-GSkDk6Q-qzh3";
$_CONFIG['db']['host'] = "127.0.0.1";
$_CONFIG['db']['username'] = "root";
$_CONFIG['db']['password'] = "honoo123";
$_CONFIG['db']['db'] = "honoodb";
/***************END CONFIGURATION*****************/


$_CONFIG['db']['connection'] = mysqli_connect($_CONFIG['db']['host'],$_CONFIG['db']['username'],$_CONFIG['db']['password'],$_CONFIG['db']['db']);

if(!$_CONFIG['db']['connection']){
	die("Database connection error");
}

$mysqlSetNames = mysqli_query($_CONFIG['db']['connection'],"SET NAMES utf8");

require HONOO_ROOT.'/inc/classes/smarty-master/libs/Smarty.class.php';
require HONOO_ROOT.'/inc/classes/controller/controller.php';
require HONOO_ROOT.'/inc/classes/misc/tools.class.php';
require HONOO_ROOT.'/inc/classes/misc/error.class.php';
require HONOO_ROOT.'/inc/classes/misc/upload.class.php';
