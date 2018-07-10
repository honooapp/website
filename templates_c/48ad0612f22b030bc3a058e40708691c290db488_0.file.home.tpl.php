<?php
/* Smarty version 3.1.32-dev-35, created on 2018-03-24 14:42:50
  from '/var/www/html/inc/template/it/home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-35',
  'unifunc' => 'content_5ab69c2a7b9013_90395620',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '48ad0612f22b030bc3a058e40708691c290db488' => 
    array (
      0 => '/var/www/html/inc/template/it/home.tpl',
      1 => 1521916959,
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
function content_5ab69c2a7b9013_90395620 (Smarty_Internal_Template $_smarty_tpl) {
?>
   <?php $_smarty_tpl->_subTemplateRender("file:../header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>"Scrivi un honoo"), 0, false);
?>

   <?php $_smarty_tpl->_subTemplateRender("file:../nav_v2.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


      <!-- Header -->
      <section id = "home-intro">
      <div class = "container">
      <div class = "row">
      <div class = "col-12">
      <p> Ti regaliamo la luna. Per sempre.</p>
 <br/>
<p>Niente è per sempre,<br/>
e nessuno può regalarti la luna.<br/>
È vero, ma non per i poeti.</p>
 <br/>
<p>Vuoi essere un poeta di honoo?<br/>
Clicca sulla bottiglia e componi il tuo honoo.</p>
      </div>
      </div>

      </div>
      </section>

<?php $_smarty_tpl->_subTemplateRender("file:../footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
