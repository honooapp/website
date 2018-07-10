<?php
require './inc/config.inc.php';
global $_CONFIG;

$controller = (isset($_GET['controller']) && !empty($_GET['controller'])) ? $_GET['controller'] : null;

switch($controller){
	default:
		require HONOO_ROOT.'inc/classes/controller/home.controller.php';
		$handle = new HomeController($_GET);
	break;

	case 'upload':
		require HONOO_ROOT.'inc/classes/controller/upload.controller.php';
		$handle = new UploadController($_GET);
	break;


	case 'moon':
		require HONOO_ROOT.'inc/classes/controller/moon.controller.php';
		$handle = new MoonController($_GET);
	break;

	case 'backoffice':
		require HONOO_ROOT.'/inc/classes/phpgrid/inc/OW_jqgrid.php';
		require HONOO_ROOT.'inc/classes/controller/backoffice.controller.php';
		$handle = new BackofficeController($_GET);
	break;

	case 'ajax':
		require HONOO_ROOT.'inc/classes/controller/ajax.controller.php';
		$handle = new AjaxController($_GET);
	break;
}

echo $handle->getOutput();
