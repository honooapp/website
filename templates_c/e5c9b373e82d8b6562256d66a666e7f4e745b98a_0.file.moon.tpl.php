<?php
/* Smarty version 3.1.32-dev-35, created on 2018-04-08 12:55:50
  from '/var/www/html/inc/template/it/moon.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-35',
  'unifunc' => 'content_5aca49963f5e38_79752618',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e5c9b373e82d8b6562256d66a666e7f4e745b98a' => 
    array (
      0 => '/var/www/html/inc/template/it/moon.tpl',
      1 => 1523206547,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../header.tpl' => 1,
    'file:../nav_v3.tpl' => 1,
    'file:../footer.tpl' => 1,
  ),
),false)) {
function content_5aca49963f5e38_79752618 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:../header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>"Scrivi un Honoo"), 0, false);
?>

<?php $_smarty_tpl->_subTemplateRender("file:../nav_v3.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<section id = "moon-section">
<div class = "container  my-slider">
<ul class = "honoo-list">
</ul>
<div class="loader" id = "moon-loader"></div>
<!-- <div id = "load-more"><button>Carica meno recenti</button></div> -->
</div>
</section>

<?php $_smarty_tpl->_subTemplateRender("file:../footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('includeMoonCode'=>"true"), 0, false);
?>

<?php }
}
