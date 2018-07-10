<?php
/* Smarty version 3.1.32-dev-35, created on 2018-03-19 13:32:12
  from '/var/www/html/inc/template/en/home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-35',
  'unifunc' => 'content_5aaff41c5d58c2_71717662',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cf29986351a0fa68a4262cdaed622ded26acbfb9' => 
    array (
      0 => '/var/www/html/inc/template/en/home.tpl',
      1 => 1520794474,
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
function content_5aaff41c5d58c2_71717662 (Smarty_Internal_Template $_smarty_tpl) {
?>
   <?php $_smarty_tpl->_subTemplateRender("file:../header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>"Honoo"), 0, false);
?>

   <?php $_smarty_tpl->_subTemplateRender("file:../nav_v2.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

      
      <!-- Header -->
      <section id = "home-intro">
      <div class = "container">
      <div class = "row">
      <div class = "col-12">
      <p>We'll give you the moon. For ever.</p>
 <br/>
<p>Nothing is forever,<br/>
and no one can give you the moon.<br/>
This is true, but not for poets.</p>
 <br/>
<p>Would you like to be a honoo poet?<br/>
Click on the bottle and write your honoo.</p>
      </div>
      </div>

      </div>
      </section>
      
<?php $_smarty_tpl->_subTemplateRender("file:../footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
