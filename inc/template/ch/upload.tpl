   {include file="../header.tpl" title = "Scrivi un Honoo"}
   {include file="../nav_v2.tpl"}

      <!-- Header -->
      <section id = "upload-section">
         <div class = "container">
            <form action = "{$honoo_url_root}{$lang}/upload/send/" method = "POST" enctype = "multipart/form-data" id = "upload-form">
               <input type = "hidden" name = "MAX_FILE_SIZE" value = "102400000000">
               <div class = "col-md-10 offset-md-1 col-lg-6 offset-lg-3">
                  <div id = "captcha-container">
                     <p>Dimostraci di non essere un robot!</p>
                     <div class="g-recaptcha" data-sitekey="6LcBqDkUAAAAALdiNEqkDkvYAVF6vuRzMb83f5O2"></div>
                     <input type = "submit" value = "Ok" class = "invertColors">
                  </div>
                  {if $success}
                  <div id = "success-container">
                     <p>Il tuo messaggio adesso è sulla luna</p>
                     <p><a href = "javascript:void(0);$('#success-container').hide();">Premi qui per spedirne un altro!</a></p>
                  </div>
                  {/if}

                  {if count($errors) > 0}
                  <div id = "error-container">
                     <p>Abbiamo riscontrato degli errori : <br>
                     {include file="./errors.tpl" codes = $errors}<br>
                     <button id = "retry-btn" type = "button">Riprova</button></p>
                  </div>
                  {/if}


                  <p>来吧，让我们一起来发现对诗曲狂热的爱。为了那份勇敢,<br>
                     为了那些相信"永远"的人们，也为了那些渴望月亮的人们。
                  </p>
                  <div class = "row" id ="upload-container">
                     <div class = "col-md-6 sub img-container">
                        <div class="upload-btn-wrapper">
                           <div id = "image-preview"></div>
                           <button class="btn-element"><img src = "{HONOO_URL}images/svg/elements/arrow.svg"><br><span>加载你的照片</span></button>
                           <input type="file" name="image" id = "file-uploader" />
                        </div>
                     </div>
                    <div class = "col-md-6 sub">
                       <div id = "upload-counter"></div>
                       <textarea maxlength = "144" placeholder = "写下你的信息" name = "description" id = "upload-description" required></textarea>
                       <input type = "submit" value = "Ok">
                    </div>
                  </div>
               </div>
            </form>
         </div>
      </section>

         {include file="../footer.tpl"}
