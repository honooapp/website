<?php
/* Smarty version 3.1.32-dev-35, created on 2018-04-08 10:21:04
  from '/var/www/html/inc/template/nav_v3.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-35',
  'unifunc' => 'content_5aca2550b711f2_74715205',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a5e4baff0caf59c61107616876d1b2f48662140b' => 
    array (
      0 => '/var/www/html/inc/template/nav_v3.tpl',
      1 => 1523197072,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5aca2550b711f2_74715205 (Smarty_Internal_Template $_smarty_tpl) {
?>
<nav class="navbar  navbar-light" >
         <div class="container">
            <div class = "col-md-12 col-sm-12 col-xs-12 moonandflag">
               <ul id = "flag-container" class = "pull-left no-margin-top">
                  <li><a href = "<?php echo $_smarty_tpl->tpl_vars['honoo_url_root']->value;?>
ch/<?php echo $_smarty_tpl->tpl_vars['current_url_query']->value;?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['honoo_url_root']->value;?>
images/svg/flags/003-china.svg" alt=""/></a></li>
                  <li><a href = "<?php echo $_smarty_tpl->tpl_vars['honoo_url_root']->value;?>
en/<?php echo $_smarty_tpl->tpl_vars['current_url_query']->value;?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['honoo_url_root']->value;?>
images/svg/flags/004-united-kingdom.svg" alt="" /></a></li>
                  <li><a href = "<?php echo $_smarty_tpl->tpl_vars['honoo_url_root']->value;?>
es/<?php echo $_smarty_tpl->tpl_vars['current_url_query']->value;?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['honoo_url_root']->value;?>
images/svg/flags/002-spain.svg" alt=""/></a></li>
                  <li><a href = "<?php echo $_smarty_tpl->tpl_vars['honoo_url_root']->value;?>
it/<?php echo $_smarty_tpl->tpl_vars['current_url_query']->value;?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['honoo_url_root']->value;?>
images/svg/flags/001-italy.svg" alt=""/></a></li>
               </ul>
                     <div class = "pull-right" id = "moon-container">
                         <a href = "<?php echo $_smarty_tpl->tpl_vars['honoo_url_root']->value;
echo $_smarty_tpl->tpl_vars['lang']->value;?>
/moon/"><img  src = "<?php echo $_smarty_tpl->tpl_vars['honoo_url_root']->value;?>
images/svg/elements/moon.svg" /></a>
                     </div>
            </div>

            <div class = "col-md-12 col-sm-12 col-xs-12">
               <div class = "container">
                  <div class = "row">
                     <div class = "col-md-12" id = "smaller-logo-container">
                        <a href = "<?php echo $_smarty_tpl->tpl_vars['honoo_url_root']->value;
echo $_smarty_tpl->tpl_vars['lang']->value;?>
/home/"><img  src = "<?php echo $_smarty_tpl->tpl_vars['honoo_url_root']->value;?>
images/png/logo.png" /></a>
                     </div>
                  </div>
               </div>
            </div>

         </div>
      </nav>
<?php }
}
