<?php
/* Smarty version 3.1.32-dev-35, created on 2018-03-18 14:41:35
  from '/var/www/html/inc/template/ch/moon.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-35',
  'unifunc' => 'content_5aaeb2dff211a0_22007483',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '74ce9a4cd3d912f224481e57aa5df5e87a3beb79' => 
    array (
      0 => '/var/www/html/inc/template/ch/moon.tpl',
      1 => 1520794472,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../header.tpl' => 1,
    'file:../nav_v2.tpl' => 1,
    'file:../footer.tpl' => 1,
  ),
),false)) {
function content_5aaeb2dff211a0_22007483 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:../header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>"Scrivi un Honoo"), 0, false);
?>

<?php $_smarty_tpl->_subTemplateRender("file:../nav_v2.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<section id = "moon-section">
<div class = "container">
<div id = "honoo-list" class = "col-md-10 offset-md-1 col-lg-10 offset-lg-1">
<div class="loader" id = "moon-loader"></div>
<div id = "load-more"><button>Show more</button></div>

</div>
</div>
</section>

<?php $_smarty_tpl->_subTemplateRender("file:../footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('includeMoonCode'=>"true"), 0, false);
}
}
