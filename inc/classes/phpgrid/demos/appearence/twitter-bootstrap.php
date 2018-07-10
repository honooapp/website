<?php
/**
 * PHP Grid Component
 *
 * @author Abu Ghufran <gridphp@gmail.com> - http://www.phpgrid.org
 * @version 1.4.8
 * @license: see license.txt included in package
 */

$conn = mysql_connect("localhost", "root", "");
// $conn = mysql_connect("localhost", "phpgrid_webuser", "P5p 6r!D w38");
mysql_select_db("griddemo");

// include and create object
$base_path = strstr(realpath("."),"demos",true)."lib/";
include($base_path."inc/jqgrid_dist.php");

$g = new jqgrid();

// set table for CRUD operations
$g->table = "clients";
	
$grid["caption"] = "Bootstrap UI Testing";
$grid["form"]["position"] = "center";
$grid["autowidth"] = true;
$g->set_options($grid);

$col = array();
$col["title"] = "Id"; // caption of column
$col["name"] = "client_id"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["editable"] = true;
$col["width"] = "30";
$cols[] = $col;

$col = array();
$col["title"] = "Name"; // caption of column
$col["name"] = "name"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["editable"] = true;
$col["required"] = true;
$cols[] = $col;

$col = array();
$col["title"] = "Gender"; // caption of column
$col["name"] = "gender"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["editable"] = true;
$cols[] = $col;

$col = array();
$col["title"] = "Company"; // caption of column
$col["name"] = "company"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["editable"] = true;
$col["editoptions"] = array("defaultValue" => "Default Company");
$cols[] = $col;

$col = array();
$col["title"] = "Action"; // caption of column
$col["name"] = "act"; // grid column name, must be exactly same as returned column-name from sql (tablefield or field-alias)
$col["width"] = "50";
$cols[] = $col;

$g->set_columns($cols);

// render grid
$out = $g->render("list1");

$themes = array("black-tie","blitzer","cupertino","dark-hive","dot-luv","eggplant","excite-bike","flick","hot-sneaks","humanity","le-frog","mint-choc","overcast","pepper-grinder","redmond","smoothness","south-street","start","sunny","swanky-purse","trontastic","ui-darkness","ui-lightness","vader");
$i = rand(0,8);

// if set from page
if (is_numeric($_GET["themeid"]))
	$i = $_GET["themeid"];
else
	$i = 14;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>PHP Grid Control Demos | www.phpgrid.org</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<link rel="stylesheet" type="text/css" media="screen" href="../../lib/js/themes/<?php echo $themes[$i] ?>/jquery-ui.custom.css">
	<link rel="stylesheet" type="text/css" media="screen" href="../../lib/js/jqgrid/css/ui.jqgrid.css">
	<link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" media="screen" href="../../lib/js/jqgrid/css/ui.bootstrap.jqgrid.css">	
	<script src="../../lib/js/jquery.min.js" type="text/javascript"></script>
	<script src="../../lib/js/jqgrid/js/i18n/grid.locale-en.js" type="text/javascript"></script>
	<script src="../../lib/js/jqgrid/js/jquery.jqGrid.min.js" type="text/javascript"></script>	
	<script src="../../lib/js/themes/jquery-ui.custom.min.js" type="text/javascript"></script>

  </head>

  <body>
      <div class="row-fluid">
        <div class="span12">
			<div style="margin:10px">
				<form method="get">
				Choose Theme: <select name="themeid" onchange="form.submit()">
					<?php foreach($themes as $k=>$t) { ?>
						<option value=<?php echo $k?> <?php echo ($i==$k)?"selected":""?>><?php echo ucwords($t)?></option>
					<?php } ?>
				</select> - 
				You can also have your customized theme (<a href="http://jqueryui.com/themeroller">jqueryui.com/themeroller</a>).
				</form>
				<?php echo $out?>
			</div>					
        </div><!--/span-->
      </div><!--/row-->

  </body>
</html>
