 <?php
 error_reporting(E_ALL);
 ini_set('display_errors', 1);
require './inc/config.inc.php';
require './inc/classes/phpgrid/inc/OW_jqgrid.php';
global $_CONFIG;
$output = "";
$is_logged_in = false;

        if(isset($_GET['logout'])) unset($_SESSION['login']);
        if (isset($_SESSION['login']) && $_SESSION['login'] > 0) {
            $is_logged_in = true;
            $output = getGrid();
        } else {
            $username = (isset($_POST['username']) && !empty($_POST['username'])) ? mysqli_real_escape_string($_CONFIG['db']['connection'], $_POST['username']) : null;
            $password = (isset($_POST['password']) && !empty($_POST['password'])) ? sha1($_POST['password']) : null;
            
            if (!($username == null && $password == null)) {
                $tryLoginQuery = mysqli_query($_CONFIG['db']['connection'], "SELECT * FROM users WHERE username = '" . $username . "' AND password = '" . $password . "' LIMIT 1");
                if ($tryLoginQuery) {
                    if (mysqli_num_rows($tryLoginQuery) > 0) {
                        $user              = mysqli_fetch_array($tryLoginQuery);
                        $_SESSION['login'] = $user['id'];
                        $is_logged_in      = true;
                        $output = getGrid();
                    } else {
                        $error = "login error";
                    }
                } else {
                    $error = "login error";
                }
            }
        }
    

    function getGrid(){ 
    global $_CONFIG;  
 $g = new jqgrid(array("type" => "mysql","database" => $_CONFIG['db']['db'],"server" => $_CONFIG['db']['host'],"user" => $_CONFIG['db']['username'],"password" => $_CONFIG['db']['password']));
    $opt["OWresizable"] = true;
    $opt["caption"] = "Honoo inviati (<a href = './backoffice.php?logout'>Logout</a>)";
    $opt["height"] = "400";
    $opt["fullwidth"] = true;
    $opt["rowNum"] = 30;
    $opt["sortname"] = 'id';
    $opt["sortorder"] = 'desc';
    $opt["form"]["position"] = "center";
    $opt["add_options"] = array("recreateForm" => true, "closeAfterEdit"=>true, 'width'=>'600');
    $opt["edit_options"] = array("recreateForm" => true, "closeAfterEdit"=>true, 'width'=>'600');
    $opt["view_options"] = array("recreateForm" => true, "closeAfterEdit"=>true, 'width'=>'600');
    $opt["export"] = array("range"=>"filtered", "filename"=>'Honoo', "heading"=>"Honoo", "orientation"=>"landscape", "paper"=>"a4");
    $g->set_options($opt);



    

$g->set_actions(array(
                            "add" => false,             // Abilita/Disabilita la creazione di nuovi record.
                            "edit" => true,            // Abilita/Disabilita edit operation on grid.
                            "delete" => true,          // Abilita/Disabilita delete operation on grid.
                            "view" => false,            // Abilita/Disabilita view operation on grid.
                            "clone" => false,           // Abilita/Disabilita clone operation on grid.
                            "inlineadd" => false,       // Abilita/Disabilita button to perform insertion inline.
                            "rowactions" => false,      // Abilita/Disabilita inline edit/del/save option.
                            "export"=>false,            // Abilita/Disabilita export to excel option.
                            "export_pdf"=>false,        // Abilita/Disabilita export to pdf option.
                            "autofilter" => true,      // Abilita/Disabilita autofilter toolbar for search on top.
                            "showhidecolumns" => false, // Abilita/Disabilita button to hide certain columns from client side.
                            "search" => "advance"       // Abilita/Disabilita Search property can have 3 values, simple, advance or false to hide.                          
                        )
                    );
                    
            $g->table = "posts";
            $g->select_command = "SELECT * FROM posts";
            
           
    
        $cols = array();
        $col = array();
        $col["title"] = "ID";
        $col["name"] = "id";
        $col["hidden"] = !false;
        $col["viewable"] = true;
        $col["export"] = false;
        $cols[] = $col;
    

        $col = array();
        $col["title"] = "Descrizione";
        $col["name"] = "description";
        $col["width"] = "60";
        $col["align"] = "center";
        $col["sortable"] = true;
        $col["resizable"] = false;
        $col["editable"] = true;
        $col["show"] = array("list"=>true, "add"=>false, "edit"=>true, "view"=>true);
        $cols[] = $col;

        $col = array();
        $col["title"] = "Foto";
        $col["name"] = "image";
        $col["width"] = "60";
        $col["align"] = "center";
        $col["sortable"] = true;
        $col["resizable"] = false;
        $col["condition"] = array("1","<a href = '".HONOO_URL."uploads/{image}' target = '_blank'>Visualizza</a>",0);
        $col["editable"] = true;
        $col["show"] = array("list"=>true, "add"=>false, "edit"=>false, "view"=>true);
        $cols[] = $col;

         $col = array();
        $col["title"] = "IP";
        $col["name"] = "ip_address";
        $col["width"] = "60";
        $col["align"] = "center";
        $col["sortable"] = true;
        $col["resizable"] = false;
        $col["editable"] = true;
        $col["show"] = array("list"=>true, "add"=>false, "edit"=>true, "view"=>true);
        $cols[] = $col;

          $col = array();
        $col["title"] = "Attivo";
        $col["name"] = "active";
        $col["width"] = "60";
        $col["align"] = "center";
        $col["sortable"] = true;
        $col["resizable"] = false;
        $col["editable"] = true;
        $col["show"] = array("list"=>true, "add"=>false, "edit"=>true, "view"=>true);
        $cols[] = $col;
      
        $col = array();
        $col["title"] = "Lingua";
        $col["name"] = "language";
        $col["width"] = "60";
        $col["align"] = "center";
        $col["sortable"] = true;
        $col["resizable"] = false;
        $col["editable"] = true;
        $col["show"] = array("list"=>true, "add"=>false, "edit"=>true, "view"=>true);
        $cols[] = $col;

        $col = array();
        $col["title"] = "Data Inserimento";
        $col["name"] = "date_creation";
        $col["width"] = "60";
        $col["align"] = "center";
        $col["sortable"] = true;
        $col["resizable"] = false;
        $col["editable"] = true;
        $col["show"] = array("list"=>true, "add"=>false, "edit"=>true, "view"=>true);
        $cols[] = $col;
        
        $g->set_columns($cols);

        $out = $g->render("backoffice");
        return $out;
}
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta http-equiv="Content-Type" content="text/html;charset=utf-8" ></meta>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>Honoo :: Backoffice</title>
      <!-- Bootstrap core CSS -->
      <link href="./vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <!-- Custom fonts for this template -->
      <link href="./vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
      <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
      <!-- Custom styles for this template -->
      <link href="./css/honoo.css" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="./inc/classes/phpgrid/js/jqgrid/css/ui.jqgrid.css" />
<link rel="stylesheet" type="text/css" href="./inc/classes/phpgrid/js/themes/overcast/jquery-ui.custom.css" />
<script type="text/javascript" src="./inc/classes/phpgrid/js/jquery.min.js"></script>
<script type="text/javascript" src="./inc/classes/phpgrid/js/jqgrid/js/i18n/grid.locale-it.js"></script>
<script type="text/javascript" src="./inc/classes/phpgrid/js/jqgrid/js/jquery.jqGrid.min.js"></script>  

   </head>
   <body id="page-top">
   
   <nav class="navbar  navbar-light" >
         <div class="container">
            <div class = "col-md-4 col-sm-4 col-xs-12">
               <ul id = "flag-container" class = "no-margin-top">
               </ul>
            </div>
            <div class = "col-md-4 col-sm-4 col-xs-4">
               <div class = "container">
                  <div class = "row">
                     <div class = "col-md-12" id = "logo-container">
                        <a href = "./it/home/"><img  src = "./images/png/logo.png" /></a>
                     </div>
                  </div>
               </div>
            </div>
            <div id = "nav-moon-container" class = "col-md-4 col-sm-4 col-xs-4">
               <div class = "container">
                  <div class = "row">
                     <div class = "col-md-12" id = "moon-container">
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </nav>


<section id = "moon-section">
<div class = "container">
<?php if ($is_logged_in == true) { ?>
<div id = "honoo-list" class = "col-md-10 offset-md-1 col-lg-10 offset-lg-1">
<?php echo $output; ?>
</div>
<?php }else{ ?>
<div id = "honoo-list" class = "col-md-4 offset-md-4 col-lg-4 offset-lg-4">

<?php if (count($errors) > 0){ ?>
                  <div id = "error-container">
                     <p>Impossible effettuare l'accesso<br>
                     <button id = "retry-btn" type = "button">Riprova</button></p>
                  </div>
<?php } ?>
<div class = "form-group">
<form method = "POST" action = "backoffice.php">
<input type = "text" name = "username" class = "form-control" placeholder = "Username" required><br>
<input type = "password" name = "password" class = "form-control" placeholder = "Password" required><br>
<input type = "submit" class = "form-control">
</form>
</div>
</div>

<?php } ?>
</div>
</section>

      <footer>
        <div class = "first"></div>
        <div class = "second">
        
        <div id = "bottle-placeholder"></div>
        </div>
        <div class = "third">Powered by Venceslao Cembalo</div>

      </footer>


   </body>
</html>

