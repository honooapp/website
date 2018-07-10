<?php
/* Smarty version 3.1.32-dev-35, created on 2018-04-08 15:23:26
  from '/var/www/html/inc/template/it/upload.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-35',
  'unifunc' => 'content_5aca6c2e1e3159_01435548',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'aac831ae5a116960ebdb1563d07581c6200f0f2a' => 
    array (
      0 => '/var/www/html/inc/template/it/upload.tpl',
      1 => 1523215404,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../header.tpl' => 1,
    'file:../nav_v4.tpl' => 1,
    'file:./errors.tpl' => 1,
    'file:../footer-upload.tpl' => 1,
  ),
),false)) {
function content_5aca6c2e1e3159_01435548 (Smarty_Internal_Template $_smarty_tpl) {
?>
   <?php $_smarty_tpl->_subTemplateRender("file:../header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>"Scrivi un Honoo"), 0, false);
?>

   <?php $_smarty_tpl->_subTemplateRender("file:../nav_v4.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


      <!-- Header -->
      <section id = "upload-section">
         <div class = "container">
            <form action = "<?php echo $_smarty_tpl->tpl_vars['honoo_url_root']->value;
echo $_smarty_tpl->tpl_vars['lang']->value;?>
/upload/send/" method = "POST" enctype = "multipart/form-data" id = "upload-form">
               <input type = "hidden" name = "MAX_FILE_SIZE" value = "102400000000">
               <div class = "col-md-10 offset-md-1 col-lg-10 offset-lg-1">
                  <div id = "captcha-container">
                     <p>Dimostraci di non essere un robot!</p>
                     <div class="g-recaptcha" data-sitekey="6LdO1U0UAAAAAIFlt3DWL5SKoNAhXBl7ZG9cEZU2"></div>
                     <input type = "submit" value = "Ok" class = "invertColors">
                  </div>
                  <?php if ($_smarty_tpl->tpl_vars['success']->value) {?>
                  <div id = "success-container">
                     <p>Il tuo messaggio adesso è sulla luna</p>
                     <p><a href = "javascript:void(0);$('#success-container').hide();">Premi qui per spedirne un altro!</a></p>
                  </div>
                  <?php }?>

                  <?php if (count($_smarty_tpl->tpl_vars['errors']->value) > 0) {?>
                  <div id = "error-container">
                     <p>Abbiamo riscontrato degli errori : <br>
                     <?php $_smarty_tpl->_subTemplateRender("file:./errors.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('codes'=>$_smarty_tpl->tpl_vars['errors']->value), 0, false);
?>
<br>
                     <button id = "retry-btn" type = "button">Riprova</button></p>
                  </div>
                  <?php }?>

                  <div class = "row" id ="upload-container">
                      <div class = "col-md-6 sub img-container">
                         <div class="upload-btn-wrapper">
                            <div id = "image-preview"></div>
                            <button class="btn-element"><img src = "<?php echo HONOO_URL;?>
images/svg/elements/arrow.svg"><br><span>carica qui la tua foto</span></button>
                            <input type="file" name="image" id = "file-uploader" />
                         </div>
                      </div>
                     <div class = "col-md-6 sub">
                        <div id = "upload-counter"></div>
                        <textarea maxlength = "144" placeholder = "scrivi qui il tuo messaggio" name = "description" id = "upload-description" required></textarea>
                        <input type = "submit" value = "ok">
                     </div>
                  </div>
               </div>
            </form>
         </div>
      </section>

         <?php $_smarty_tpl->_subTemplateRender("file:../footer-upload.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
