<?php
/* Smarty version 3.1.32-dev-35, created on 2018-03-12 07:24:58
  from '/var/www/html/inc/template/header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-35',
  'unifunc' => 'content_5aa6638a4aaee1_31028117',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1bec498fe479bb9ffe336df891893f137cac5334' => 
    array (
      0 => '/var/www/html/inc/template/header.tpl',
      1 => 1520794464,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5aa6638a4aaee1_31028117 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta http-equiv="Content-Type" content="text/html;charset=utf-8" ></meta>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
      <!-- Bootstrap core CSS -->
      <link href="<?php echo $_smarty_tpl->tpl_vars['honoo_url_root']->value;?>
vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <!-- Custom fonts for this template -->
      <link href="<?php echo $_smarty_tpl->tpl_vars['honoo_url_root']->value;?>
vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
      <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
      <!-- Custom styles for this template -->
      <link href="<?php echo $_smarty_tpl->tpl_vars['honoo_url_root']->value;?>
css/honoo.css" rel="stylesheet">
      <?php echo '<script'; ?>
 src='https://www.google.com/recaptcha/api.js'><?php echo '</script'; ?>
>
      <?php if (isset($_smarty_tpl->tpl_vars['set_jquery_into_header']->value) && $_smarty_tpl->tpl_vars['set_jquery_into_header']->value == true) {?>
      <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['honoo_url_root']->value;?>
vendor/jquery/jquery.min.js"><?php echo '</script'; ?>
>
      <?php }?>
   </head>
   <body id="page-top"><?php }
}
