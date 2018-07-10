<?php
/* Smarty version 3.1.32-dev-35, created on 2018-03-24 15:43:28
  from '/var/www/html/inc/template/en/upload.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-35',
  'unifunc' => 'content_5ab6aa60b9e727_89009289',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ba5c33e9716c48a5a703ddef0834d4f4afc6f676' => 
    array (
      0 => '/var/www/html/inc/template/en/upload.tpl',
      1 => 1521920056,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../header.tpl' => 1,
    'file:../nav_v2.tpl' => 1,
    'file:./errors.tpl' => 1,
    'file:../footer.tpl' => 1,
  ),
),false)) {
function content_5ab6aa60b9e727_89009289 (Smarty_Internal_Template $_smarty_tpl) {
?>
   <?php $_smarty_tpl->_subTemplateRender("file:../header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>"Scrivi un Honoo"), 0, false);
?>

   <?php $_smarty_tpl->_subTemplateRender("file:../nav_v2.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


      <!-- Header -->
      <section id = "upload-section">
         <div class = "container">
            <form action = "<?php echo $_smarty_tpl->tpl_vars['honoo_url_root']->value;
echo $_smarty_tpl->tpl_vars['lang']->value;?>
/upload/send/" method = "POST" enctype = "multipart/form-data" id = "upload-form">
               <input type = "hidden" name = "MAX_FILE_SIZE" value = "102400000000">
               <div class = "col-md-10 offset-md-1 col-lg-6 offset-lg-3">
                  <div id = "captcha-container">
                     <p>Dimostraci di non essere un robot!</p>
                     <div class="g-recaptcha" data-sitekey="6LcBqDkUAAAAALdiNEqkDkvYAVF6vuRzMb83f5O2"></div>
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


                  <p>Come and find out just how crazy our love is for poets, <br>
                  for the brave, for those who believe in “forever” and for those who long for the moon.
                  </p>
                  <div class = "row" id ="upload-container">
                      <div class = "col-md-6 sub img-container">
                         <div class="upload-btn-wrapper">
                            <div id = "image-preview"></div>
                            <button class="btn-element"><img src = "<?php echo HONOO_URL;?>
images/svg/elements/arrow.svg"><br><span>Load your photo here</span></button>
                            <input type="file" name="image" id = "file-uploader" />
                         </div>
                      </div>
                     <div class = "col-md-6 sub">
                        <div id = "upload-counter"></div>
                        <textarea maxlength = "144" placeholder = "Write your text here" name = "description" id = "upload-description" required></textarea>
                        <input type = "submit" value = "Ok">
                     </div>
                  </div>
               </div>
            </form>
         </div>
      </section>

         <?php $_smarty_tpl->_subTemplateRender("file:../footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
