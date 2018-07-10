<?php
/* Smarty version 3.1.32-dev-35, created on 2018-04-08 15:23:26
  from '/var/www/html/inc/template/footer-upload.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32-dev-35',
  'unifunc' => 'content_5aca6c2e2ae352_77740939',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '39e5fbb367b4eba05b464c600bdb999a016dc84d' => 
    array (
      0 => '/var/www/html/inc/template/footer-upload.tpl',
      1 => 1523215390,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5aca6c2e2ae352_77740939 (Smarty_Internal_Template $_smarty_tpl) {
?>
      <footer class="footer-upload">
        <div class = "first">
        <?php if ($_smarty_tpl->tpl_vars['showBottle']->value == true) {?>
        <a href = "<?php echo $_smarty_tpl->tpl_vars['honoo_url_root']->value;
echo $_smarty_tpl->tpl_vars['lang']->value;?>
/upload/"><img src = "<?php echo $_smarty_tpl->tpl_vars['honoo_url_root']->value;?>
images/gif/bottle.gif" align = "center"></a>
        <?php } else { ?>
        <div id = "bottle-placeholder"></div>
        <?php }?></div>
        <div class = "second">
        </div>
        <div class = "third"></div>

      </footer>


      <?php if (!isset($_smarty_tpl->tpl_vars['set_jquery_into_header']->value)) {?>
      <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['honoo_url_root']->value;?>
vendor/jquery/jquery.min.js"><?php echo '</script'; ?>
>
      <?php }?>
      <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['honoo_url_root']->value;?>
vendor/bootstrap/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
      <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['honoo_url_root']->value;?>
vendor/jquery-easing/jquery.easing.min.js"><?php echo '</script'; ?>
>
      <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['honoo_url_root']->value;?>
js/honoo.js"><?php echo '</script'; ?>
>

      <?php if (isset($_smarty_tpl->tpl_vars['includeMoonCode']->value) && $_smarty_tpl->tpl_vars['includeMoonCode']->value == true) {?>
      <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['honoo_url_root']->value;?>
js/jquery.event.move.js"><?php echo '</script'; ?>
>
      <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['honoo_url_root']->value;?>
js/jquery.event.swipe.js"><?php echo '</script'; ?>
>
      <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['honoo_url_root']->value;?>
js/jquery.cardslider.min.js"><?php echo '</script'; ?>
>
      <?php echo '<script'; ?>
 type = "text/javascript">
      currentPage = <?php echo $_smarty_tpl->tpl_vars['page']->value;?>
;
      var decodeEntities = (function() {
          //create a new html document (doesn't execute script tags in child elements)
          var doc = document.implementation.createHTMLDocument("");
          var element = doc.createElement('div');

          function getText(str) {
              element.innerHTML = str;
              str = element.textContent;
              element.textContent = '';
              return str;
          }

          function decodeHTMLEntities(str) {
              if (str && typeof str === 'string') {
                  var x = getText(str);
                  while (str !== x) {
                      str = x;
                      x = getText(x);
                  }
                  return x;
              }
          }
          return decodeHTMLEntities;
      })();

      function loadNewPage() {
        $("#load-more").hide();
         $("#moon-loader").show();



          var jqxhr = $.get("<?php echo $_smarty_tpl->tpl_vars['honoo_url_root']->value;
echo $_smarty_tpl->tpl_vars['lang']->value;?>
/ajax/getPosts/" + currentPage + "/", function(data) {



                  if (data.hasOwnProperty("currentPage") && data.hasOwnProperty("posts") && data.posts.length > 0) {
                  	currentPage = data.currentPage + 1;
                      $(data.posts).each(function() {
                          appendNewPost(this);
                      });
                      //
                  }


              }).fail(function() {

              })
              .always(function() {
                  //remove loader
                  $('.honoo-list').append($("#load-more").clone(1));
            $("#load-more").remove();
                  $("#moon-loader").hide();
                  $('.honoo-list').append($("#moon-loader").clone(1));
    				$("#moon-loader").remove();
            $("#load-more").show();
		$('.my-slider').cardslider({
            showCards: 0,
				swipe: false,
				dots: false,
                nav: true,
                loop: true
        });
              });

      }

      function appendNewPost(post) {
          $(".honoo-list").append('<li class="honoo-post"><div class="honoo-image" style="background-image: url(<?php echo $_smarty_tpl->tpl_vars['honoo_url_root']->value;?>
uploads/' + decodeEntities(post.image) + ')" ></div><div class="honoo-description">' + decodeEntities(post.description) + '</div></li>');
      }
      $(document).ready(function() {
          loadNewPage();
      });

      /*$(window).scroll(function() {
          if ($(window).scrollTop() == $(document).height() - $(window).height()) {
          	$("#moon-loader").show();
              loadNewPage();
          }
      });*/

      $("#load-more button").on("click",function(){

              loadNewPage();
      });




<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
<?php echo '</script'; ?>
>
      <?php }?>
   </body>
</html>
<?php }
}
