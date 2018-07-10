(function($) {
  "use strict"; // Start of use strict


  // Smooth scrolling using jQuery easing
  $('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: (target.offset().top - 48)
        }, 1000, "easeInOutExpo");
        return false;
      }
    }
  });


$("#file-uploader").on("change",function(){
    var reader = new FileReader();
    reader.onload = function (e) {
        // get loaded data and render thumbnail.
        $("#image-preview").css("background-image","url(" + e.target.result + ")");
    };

    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
});



$('#upload-form').on("submit",function() {
if($("#captcha-container").css("display") == "none"){
$("#captcha-container").show();
return false;    
}
return true;
});


$("#retry-btn").on("click",function(){
$("#error-container").hide();
});

if($("#upload-counter").length > 0){

 function updateCountdown() {
        var remaining = 144 - $('#upload-description').val().length;
        $('#upload-counter').text(remaining);
    }

    $(function () {
        updateCountdown();
        $('#upload-description').change(updateCountdown);
        $('#upload-description').keyup(updateCountdown);
    });
}


})(jQuery); // End of use strict
