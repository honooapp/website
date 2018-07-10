      <footer class="footer-upload">
        <div class = "first">
        {if $showBottle == true}
        <a href = "{$honoo_url_root}{$lang}/upload/"><img src = "{$honoo_url_root}images/gif/bottle.gif" align = "center"></a>
        {else}
        <div id = "bottle-placeholder"></div>
        {/if}</div>
        <div class = "second">
        </div>
        <div class = "third"></div>

      </footer>


      {if !isset($set_jquery_into_header)}
      <script src="{$honoo_url_root}vendor/jquery/jquery.min.js"></script>
      {/if}
      <script src="{$honoo_url_root}vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="{$honoo_url_root}vendor/jquery-easing/jquery.easing.min.js"></script>
      <script src="{$honoo_url_root}js/honoo.js"></script>

      {if isset($includeMoonCode) && $includeMoonCode == true}
      <script src="{$honoo_url_root}js/jquery.event.move.js"></script>
      <script src="{$honoo_url_root}js/jquery.event.swipe.js"></script>
      <script src="{$honoo_url_root}js/jquery.cardslider.min.js"></script>
      <script type = "text/javascript">
      currentPage = {$page};
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



          var jqxhr = $.get("{$honoo_url_root}{$lang}/ajax/getPosts/" + currentPage + "/", function(data) {



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
          $(".honoo-list").append('<li class="honoo-post"><div class="honoo-image" style="background-image: url({$honoo_url_root}uploads/' + decodeEntities(post.image) + ')" ></div><div class="honoo-description">' + decodeEntities(post.description) + '</div></li>');
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




</script>
<script>
</script>
      {/if}
   </body>
</html>
