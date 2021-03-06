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
$col["editable"] = false;
$col["export"] = false; // this column will not be exported
$col["link"] = "http://localhost/?id={id}"; // e.g. http://domain.com?id={id} given that, there is a column with $col["name"] = "id" exist
$col["linkoptions"] = "target='_blank'"; // extra params with <a> tag
$cols[] = $col;

$col = array();
$col["title"] = "Date";
$col["name"] = "invdate"; 
$col["width"] = "50";
$col["editable"] = true; // this column is editable
$col["editoptions"] = array("size"=>20); // with default display of textbox with size 20
$col["editrules"] = array("required"=>true); // and is required
$cols[] = $col;

$col = array();
$col["title"] = "Note";
$col["name"] = "note"; 
$col["width"] = "150";
$col["editable"] = true; // this column is editable
$cols[] = $col;

$grid["sortname"] = 'id'; // by default sort grid by this field
$grid["sortorder"] = "desc"; // ASC or DESC
$grid["caption"] = "Bulk Editing Rows"; // caption of grid
$grid["autowidth"] = true; // expand grid to screen width
$grid["multiselect"] = true; // allow you to multi-select through checkboxes
$g->set_options($grid);

$g->set_actions(array(	
						"add"=>false, // allow/disallow add
						"edit"=>true, // allow/disallow edit
						"delete"=>true, // allow/disallow delete
						"rowactions"=>true,
						"autofilter" => true, 
						"search" => "simple"
					) 
				);

// you can provide custom SQL query to display data
$g->select_command = "SELECT i.id, invdate, c.name, note FROM invheader i
						INNER JOIN clients c ON c.client_id = i.client_id";

// this db table will be used for add,edit,delete
$g->table = "invheader";

// pass the cooked columns to grid
$g->set_columns($cols);

// event handler to manage Bulk Operations
$e["on_update"] = array("update_data","",true);
$g->set_events($e);

function update_data($data)
{
	// If bulk operation is requested, (default otherwise)
	if ($data["params"]["bulk"] == "set-desc")
	{
		$selected_ids = $data["id"]; // e.g. the selected values from grid 5,7,14 (where "id" is field name of first col)
		$str = $data["params"]["data"];

		// here you can code your logic to do bulk processing
		mysql_query("UPDATE invheader SET note = '$str' WHERE id IN ($selected_ids)");

		die;
	}
	else if ($data["params"]["bulk"] == "send-email")
	{
		$selected_ids = $data["id"]; // e.g. the selected values from grid 5,7,14 (where "id" is field name of first col)
		// sending email logic

		mysql_query("UPDATE invheader SET note = 'Email Sent' WHERE id IN ($selected_ids)");
		die;
	}
}

// generate grid output, with unique grid name as 'list1'
$out = $g->render("list1");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>
	<link rel="stylesheet" type="text/css" media="screen" href="../../lib/js/themes/redmond/jquery-ui.custom.css"></link>	
	<link rel="stylesheet" type="text/css" media="screen" href="../../lib/js/jqgrid/css/ui.jqgrid.css"></link>	
	
	<script src="../../lib/js/jquery.min.js" type="text/javascript"></script>
	<script src="../../lib/js/jqgrid/js/i18n/grid.locale-en.js" type="text/javascript"></script>
	<script src="../../lib/js/jqgrid/js/jquery.jqGrid.min.js" type="text/javascript"></script>	
	<script src="../../lib/js/themes/jquery-ui.custom.min.js" type="text/javascript"></script>
</head>
<body>
	<div style="margin:10px">
	<br>
	<?php echo $out?>
	</div>

	<script>
	// add toolbar button for bulk operation
	jQuery(document).ready(function(){
		jQuery('#list1').jqGrid('navButtonAdd', '#list1_pager', 
		{
			'caption'      : 'Bulk Edit Notes', 
			'buttonicon'   : 'ui-icon-pencil', 
			'onClickButton': function()
			{
				var str = prompt("Please enter comment")
				if (str)
					fx_bulk_update("set-desc",str);
			},
			'position': 'last'
		});
		jQuery('#list1').jqGrid('navButtonAdd', '#list1_pager', 
		{
			'caption'      : 'Email', 
			'buttonicon'   : 'ui-icon-pencil', 
			'onClickButton': function()
			{
				fx_bulk_update("send-email");
			},
			'position': 'last'
		});
	});
	</script>
</body>
</html>