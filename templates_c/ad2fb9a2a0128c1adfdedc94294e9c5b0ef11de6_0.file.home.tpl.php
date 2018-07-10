<?php
/* Smarty version 3.1.32-dev-35, created on 2018-03-18 15:47:39
  from '/var/www/html/inc/template/es/home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-35',
  'unifunc' => 'content_5aaec25bc3ed81_24927006',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ad2fb9a2a0128c1adfdedc94294e9c5b0ef11de6' => 
    array (
      0 => '/var/www/html/inc/template/es/home.tpl',
      1 => 1520794473,
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
function content_5aaec25bc3ed81_24927006 (Smarty_Internal_Template $_smarty_tpl) {
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
      <p>Te regalamos la luna.  Para siempre.</p>
 <br/>
<p>Nada es para siempre, <br/>
y nadie puede regalarte la luna.<br/>
Es cierto, pero no para los poetas.</p>
 <br/>
<p>Quieres ser un poeta de honoo?<br/>
Clica en la botella y escribe tu honoo.</p>
      </div>
      </div>

      </div>
      </section>
      
<?php $_smarty_tpl->_subTemplateRender("file:../footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
