   {include file="../header.tpl" title = "Scrivi un Honoo"}
   {include file="../nav_v4.tpl"}

      <!-- Header -->
      <section id = "upload-section">
         <div class = "container">
            <form action = "{$honoo_url_root}{$lang}/upload/send/" method = "POST" enctype = "multipart/form-data" id = "upload-form">
               <input type = "hidden" name = "MAX_FILE_SIZE" value = "102400000000">
               <div class = "col-md-10 offset-md-1 col-lg-10 offset-lg-1">
                  <div id = "captcha-container">
                     <p>Dimostraci di non essere un robot!</p>
                     <div class="g-recaptcha" data-sitekey="6LdO1U0UAAAAAIFlt3DWL5SKoNAhXBl7ZG9cEZU2"></div>
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

                  <div class = "row" id ="upload-container">
                      <div class = "col-md-6 sub img-container">
                         <div class="upload-btn-wrapper">
                            <div id = "image-preview"></div>
                            <button class="btn-element"><img src = "{HONOO_URL}images/svg/elements/arrow.svg"><br><span>carica qui la tua foto</span></button>
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

         {include file="../footer-upload.tpl"}
