<?php
/* Smarty version 3.1.32-dev-35, created on 2018-03-18 16:12:32
  from '/var/www/html/inc/template/errors_output.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-35',
  'unifunc' => 'content_5aaec830022c50_66503049',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd098a44ad6a11136c29a45c575fa367ebd33296d' => 
    array (
      0 => '/var/www/html/inc/template/errors_output.tpl',
      1 => 1520794464,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5aaec830022c50_66503049 (Smarty_Internal_Template $_smarty_tpl) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['errors']->value, 'error');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['error']->value) {
echo $_smarty_tpl->tpl_vars['translation']->value[$_smarty_tpl->tpl_vars['error']->value];?>

<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
