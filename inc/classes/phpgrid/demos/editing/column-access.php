<?php
/**
 * PHP Grid Component
 *
 * @author Abu Ghufran <gridphp@gmail.com> - http://www.phpgrid.org
 * @version 1.4.8
 * @license: see license.txt included in package
 */

// set up DB
$conn = mysql_connect("localhost", "root", "");
mysql_select_db("griddemo");

// set your db encoding -- for ascent chars (if required)
mysql_query("SET NAMES 'utf8'");

// include and create object
$base_path = "../../lib/";
include($base_path."inc/jqgrid_dist.php");
$g = new jqgrid();

// set few params
$grid["caption"] = "Sample Grid";
$grid["multiselect"] = true;
$grid["height"] = "250";
$grid["width"] = "1200";
$grid["autowidth"] = true;
$grid["scroll"] = true;
$grid["rowList"] = array();
$grid["rowNum"] = 15;
$grid["form"]["position"] = "center";
$g->set_options($grid);

// set database table for CRUD operations
$g->table = "clients";
// $g->select_command = "clients";


$col = array();
$col["title"] = "Id"; // caption of column
$col["name"] = "client_id"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["editable"] = true;
$cols[] = $col;

$col = array();
$col["title"] = "Name"; // caption of column
$col["name"] = "name"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["editable"] = true;
$cols[] = $col;

$col = array();
$col["title"] = "Gender"; // caption of column
$col["name"] = "gender"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["editable"] = true;
$col["edittype"] = "select";
$col["editoptions"] = array("value" => "male:Male;female:Female");
$col["editrules"] = array("required"=>true, "readonly"=>true, "readonly-when"=>array("==","male"));
$col["show"] = array("list"=>true, "add"=>true, "edit"=>true, "view"=>true);
$cols[] = $col;

$col = array();
$col["title"] = "Company"; // caption of column
$col["name"] = "company"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["editable"] = true;
// $col["formatter"] = "wysiwyg";
$col["editoptions"] = array("defaultValue" => "Default Company");
$cols[] = $col;

$g->set_columns($cols);

$g->set_actions(array(	
						"add"=>true, // allow/disallow add
						"edit"=>true, // allow/disallow edit
						"delete"=>true, // allow/disallow delete
						"view"=>true, // allow/disallow view
						"rowactions"=>true, // show/hide row wise edit/del/save option
						"export"=>true, // show/hide export to excel option
						"autofilter" => true, // show/hide autofilter for search
						"search" => "advance" // show single/multi field search condition (e.g. simple or advance)
					) 
				);

// render grid
$out = $g->render("list1");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>
	<link rel="stylesheet" type="text/css" media="screen" href="../../lib/js/themes/redmond/jquery-ui.custom.css"></link>	
	<link rel="stylesheet" type="text/css" media="screen" href="../../lib/js/jqgrid/css/ui.jqgrid.css"></link>	
	<script src="../../lib/js/ckeditor/ckeditor.js" type="text/javascript"></script>
	<script src="../../lib/js/jquery.min.js" type="text/javascript"></script>
	<script src="../../lib/js/jqgrid/js/i18n/grid.locale-en.js" type="text/javascript"></script>
	<script src="../../lib/js/jqgrid/js/jquery.jqGrid.min.js" type="text/javascript"></script>	
	<script src="../../lib/js/themes/jquery-ui.custom.min.js" type="text/javascript"></script>
</head>
<body>
	<div style="margin:10px">
	<?php echo $out?>
	</div>	
</body>
</html>