<?php
/* Smarty version 3.1.32-dev-35, created on 2018-03-18 14:41:36
  from '/var/www/html/inc/template/ch/home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-35',
  'unifunc' => 'content_5aaeb2e0be3ba1_31647294',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '680dc047ad65ee187f0455880d105914eb7e01bc' => 
    array (
      0 => '/var/www/html/inc/template/ch/home.tpl',
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
function content_5aaeb2e0be3ba1_31647294 (Smarty_Internal_Template $_smarty_tpl) {
?>
   <?php $_smarty_tpl->_subTemplateRender("file:../header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>"Scrivi un Honoo"), 0, false);
?>

   <?php $_smarty_tpl->_subTemplateRender("file:../nav_v2.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

      
      <!-- Header -->
      <section id = "home-intro">
      <div class = "container">
      <div class = "row">
      <div class = "col-12">
      <p>我们将带给你永远的月亮</p>
 <br/>
<p>世上没有永远，<br/>
也没有人能给你月亮<br/>
但是这毋庸置疑的事实却无效于诗人。</p>
 <br/>
<p>你是否愿意成为一名激情似火的诗人?<br/>
请点击漂流瓶并书写你心中的烈焰</p>
      </div>
      </div>

      </div>
      </section>
      
<?php $_smarty_tpl->_subTemplateRender("file:../footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
