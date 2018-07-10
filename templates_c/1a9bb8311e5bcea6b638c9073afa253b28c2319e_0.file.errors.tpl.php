<?php
/* Smarty version 3.1.32-dev-35, created on 2018-03-19 13:40:23
  from '/var/www/html/inc/template/en/errors.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-35',
  'unifunc' => 'content_5aaff607a6e660_21861262',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1a9bb8311e5bcea6b638c9073afa253b28c2319e' => 
    array (
      0 => '/var/www/html/inc/template/en/errors.tpl',
      1 => 1520794474,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../errors_output.tpl' => 1,
  ),
),false)) {
function content_5aaff607a6e660_21861262 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('errorTranslations', array("error-saving-db"=>"Impossibile salvare il record","error-reading-db"=>"Impossibile leggere i dati","error-saving-image"=>"Impossibile salvare l'immagine","error-image-mime"=>"Il tipo MIME di questa immagine non è valido","error-uploading-image"=>"Impossibile caricare l'immagine","invalid-captcha"=>"Codice di sicurezza non valido","image-missing"=>"Campo 'immagine' vuoto","description-too-long"=>"La descrizione è troppo lunga","description-missing"=>"campo 'descrizione' vuoto","limit-reached"=>"Limite raggiunto","error-reading-num"=>"Impossibile leggere il numero di pagine","page-not-valid"=>"Pagina non valida","action-not-valid"=>"Azione non valida","error-login"=>"Impossibile effettuare il login"));
?>

<?php $_smarty_tpl->_subTemplateRender("file:../errors_output.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('translation'=>$_smarty_tpl->tpl_vars['errorTranslations']->value,'codes'=>$_smarty_tpl->tpl_vars['errors']->value), 0, false);
?>


<?php }
}
