<?php 
/**
 * PHP Grid Component
 *
 * @author Abu Ghufran <gridphp@gmail.com> - http://www.phpgrid.org
 * @version 1.4.8
 * @license: see license.txt included in package
 */
 
$conn = mysql_connect("localhost", "root", "");
mysql_select_db("griddemo");

// include and create object
$base_path = strstr(realpath("."),"demos",true)."lib/";
include($base_path."inc/jqgrid_dist.php");

$g = new jqgrid();

$col = array();
$col["title"] = "Id"; // caption of column
$col["name"] = "id"; 
$col["width"] = "10";
$cols[] = $col;		
		
$col = array();
$col["title"] = "Client";
$col["name"] = "name";
$col["width"] = "100";
$col["search"] = true;
$col["editable"] = true;
$col["export"] = false; // this column will not be exported
$col["link"] = "http://localhost/?id={id}";
$col["linkoptions"] = "target='_blank'";
$cols[] = $col;

$col = array();
$col["title"] = "Date";
$col["name"] = "invdate"; 
$col["width"] = "50";
$col["editable"] = true; // this column is editable
$col["editoptions"] = array("size"=>20); // with default display of textbox with size 20
$col["editrules"] = array("required"=>true); // and is required
$col["search"] = false;
$cols[] = $col;

$grid["sortname"] = 'id'; // by default sort grid by this field
$grid["sortorder"] = "desc"; // ASC or DESC
$grid["caption"] = "Invoice Data"; // caption of grid
$grid["autowidth"] = true; // expand grid to screen width
$grid["multiselect"] = false; // allow you to multi-select through checkboxes
$grid["export"] = array("format"=>"pdf", "filename"=>"my-file", "heading"=>"Invoice Details", "orientation"=>"landscape");
$grid["export"]["range"] = "filtered"; // or "all"
$grid["toolbar"] = "top";

$g->set_options($grid);

$g->set_actions(array(	
						"add"=>false, // allow/disallow add
						"edit"=>true, // allow/disallow edit
						"delete"=>true, // allow/disallow delete
						"rowactions"=>true, // show/hide row wise edit/del/save option
						"export"=>true, // show/hide export to excel option
						"autofilter" => true, // show/hide autofilter for search
						"search" => "advance" // show single/multi field search condition (e.g. simple or advance)
					) 
				);

// you can provide custom SQL query to display data
$g->select_command = "SELECT * FROM (SELECT i.id, invdate , c.name FROM invheader i
						INNER JOIN clients c ON c.client_id = i.client_id) o";

// this db table will be used for add,edit,delete
$g->table = "invheader";

// pass the cooked columns to grid
$g->set_columns($cols);

// generate grid output, with unique grid name as 'list1'
$out = $g->render("list1");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>
	<link rel="stylesheet" type="text/css" media="screen" href="../../lib/js/themes/smoothness/jquery-ui.custom.css"></link>	
	<link rel="stylesheet" type="text/css" media="screen" href="../../lib/js/jqgrid/css/ui.jqgrid.css"></link>	
	
	<script src="../../lib/js/jquery.min.js" type="text/javascript"></script>
	<script src="../../lib/js/jqgrid/js/i18n/grid.locale-en.js" type="text/javascript"></script>
	<script src="../../lib/js/jqgrid/js/jquery.jqGrid.min.js" type="text/javascript"></script>	
	<script src="../../lib/js/themes/jquery-ui.custom.min.js" type="text/javascript"></script>
</head>
<body>
	<div style="margin:10px">
	<?php echo $out?>
	</div>

	<script type="text/javascript">
	/*
		CUSTOM TOOLBAR BUTTON
		---------------------
		caption: (string) the caption of the button, can be a empty string.
		buttonicon: (string) is the ui icon name from UI theme icon set. If this option is set to “none” only the text appear.
		onClickButton: (function) action to be performed when a button is clicked. Default null.
		position: (“first” or “last”) the position where the button will be added (i.e., before or after the standard buttons).
		title: (string) a tooltip for the button.
		cursor : string (default pointer) determines the cursor when we mouseover the element
		id : string (optional) - if set defines the id of the button (actually the id of TD element) for future manipulation
	*/
	jQuery(document).ready(function(){

		jQuery('#list1').jqGrid('navButtonAdd', '#list1_pager', 
		{
			'caption'      : '', 
			'buttonicon'   : 'ui-icon-plus', 
			'onClickButton': function()
			{
				alert('My Custom Callback:');
			},
			'position': 'first'
		});

		// in case if $opt["toolbar"] = "top" or "both", we need to use ID_toppager as 2nd argument
		jQuery('#list1').jqGrid('navButtonAdd', '#list1_toppager', 
		{
			'caption'      : '', 
			'buttonicon'   : 'ui-icon-plus', 
			'onClickButton': function()
			{
				alert('My Custom Callback:');
			},
			'position': 'first'
		});
	});

	</script>
</body>
</html>