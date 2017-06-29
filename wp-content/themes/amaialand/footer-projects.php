<?php $homeID = 20; ?>
<style>
/*div#lz_overlay_chat,div#lz_eye_catcher {
display: none!important;
}*/
/*div#lz_overlay_chat{
display: none!important;
}*/
</style>
<footer>
  <div class="footer">
    <article class="col3">
      <h6><a href="#">Amaialand.com</a></h6>
      <ul>
        <li><a href="<?php echo get_permalink(4); ?>">Condo</a></li>
        <li><a href="<?php echo get_permalink(6); ?>">House &amp; Lot</a></li>
        <li><a href="<?php echo get_permalink(8); ?>">Commercial</a></li>
        <li><a href="<?php echo get_permalink(347); ?>">Locations</a></li>
        <li><a href="<?php echo get_permalink(12); ?>">Home Financing</a></li>
        <!-- <li><a href="#">Investor Guide</a></li>
        <li><a href="#">OFW Guide</a></li> -->
        <li><a href="http://askamie.amaialand.com/">Contact Us</a></li>
      </ul>
    </article>
    <article class="col3">
      <h6>Contact Us</h6>
      <p>
        <a href="tel:09778526242">+63977-85-AMAIA</a><br>
        <a href="mailto:kayakona@amaialand.com">kayakona@amaialand.com</a><br>
      </p>
    </article>
    <article class="col3">
      <h6>Email Newsletter</h6>
      <!-- <p>
      <input type="email" name="email" value="Your email address">
    </p>
    <p class="center"><input type="submit" name="subscribe" value="Subscribe"></p> -->
    <?php echo do_shortcode('[mc4wp_form id="1579"]'); ?>
  </article>
  <aside class="social" id="social">
    <ul>
      <li>
        <a href="<?php echo get_field('facebook', $homeID); ?> " target="_blank" rel="nofollow"><i class="fa fa-facebook" aria-hidden="true"></i></a>
      </li>
      <li>
        <a href="<?php echo get_field('twitter', $homeID); ?> " target="_blank" rel="nofollow"><i class="fa fa-twitter" aria-hidden="true"></i></a>
      </li>
      <li>
        <a href="<?php echo get_field('instagram', $homeID); ?> " target="_blank" rel="nofollow"><i class="fa fa-instagram" aria-hidden="true"></i></a>
      </li>
    </ul>
  </aside>
</div>
<div class="copyright">
  <center>Copyright 2016. Amaia Land.</center> <!--<a href="<?php echo get_permalink(25); ?>">Privacy Policy</a> | <a href="<?php echo get_permalink(27); ?>">Terms and Conditions</a> | <a href="<?php echo get_permalink(29); ?>">Sitemap</a> | <a href="#">E-newsletter</a> | <a href="http://askamie.amaialand.com/">Contact Us</a>-->
</div>
</footer>


<div class="floatingMenu">
  <button class="show_hide"><i class="fa fa-commenting-o" aria-hidden="true"></i></button>
  <ul class="sub">
    <li><a a href="tel:09778526242"><i class="fa fa-phone" aria-hidden="true"></i></a></li>
    <li><a href="<?php echo get_permalink(18); ?>"><i class="fa fa-envelope-o" aria-hidden="true"></i></a></li>
    <li><a href="#" id="chat"><i class="fa fa-comments-o" aria-hidden="true"></i></a></li>

  </ul>
</div>
<!-- Scripts -->
<script src="<?php echo bloginfo('template_directory');?>/js/jquery.min.js"></script>
<script src="<?php echo bloginfo('template_directory');?>/js/flickity.pkgd.min.js"></script>

<!-- Sticky Menu -->
<script>
if ( $(window).width() > 1025) {
  $(window).scroll(function(){
    var sticky = $('.sticky'),
    scroll = $(window).scrollTop();

    if (scroll >= 90) sticky.addClass('fixed');
    else sticky.removeClass('fixed');
  });
}

</script>

<!-- Popup -->
<script src="<?php echo bloginfo('template_directory');?>/js/jquery.magnific-popup.js"></script>
<script>
jQuery(document).ready(function($) {

  $('#open-popup').magnificPopup({
    type:'inline',
    closeBtnInside: true,
    fixedContentPos: false,
  });
  $('.image-link1').magnificPopup({
    gallery: {
      enabled: true
    },
    type:'image',
    closeBtnInside: true,
    verticalFit: true,
    fixedContentPos: false,
  });
  $('.image-link2').magnificPopup({
    gallery: {
      enabled: true
    },
    type:'image',
    closeBtnInside: true,
    verticalFit: true,
    fixedContentPos: false,
  });
  $('.image-link3').magnificPopup({
    gallery: {
      enabled: true
    },
    type:'image',
    closeBtnInside: true,
    verticalFit: true,
    fixedContentPos: false,
  });
  $('.image-link4').magnificPopup({
    gallery: {
      enabled: true
    },
    type:'image',
    closeBtnInside: true,
    verticalFit: true,
    fixedContentPos: false,
  });
  $('.image-link5').magnificPopup({
    gallery: {
      enabled: true
    },
    type:'image',
    closeBtnInside: true,
    verticalFit: true,
    fixedContentPos: false,
  });
  $('.iframe-popup').magnificPopup({
    type:'iframe',
    closeBtnInside: true,
    verticalFit: true,
    fixedContentPos: false,
  });
});
</script>


<!-- Mobile Menu -->
<script src="<?php echo bloginfo('template_directory');?>/js/jPushMenu.js"></script>
<script>
jQuery(document).ready(function($) {
  $('.toggle-menu').jPushMenu();
});
</script>

<!-- Responsive Tabs -->
<script src="<?php echo bloginfo('template_directory');?>/js/easyResponsiveTabs.js"></script>
<script type="text/javascript">
$(document).ready(function() {
  //Horizontal Tab
  $('#landmark-list').easyResponsiveTabs({
    type: 'default', //Types: default, vertical, accordion
    width: 'auto', //auto or any width like 600px
    fit: true, // 100% fit in a container
    tabidentify: 'hor_1'
  });

  $('#unitplans').easyResponsiveTabs({
    type: 'default', //Types: default, vertical, accordion
    width: 'auto', //auto or any width like 600px
    fit: true, // 100% fit in a container
    tabidentify: 'plans'
  });

  $('#gallery').easyResponsiveTabs({
    type: 'default', //Types: default, vertical, accordion
    width: 'auto', //auto or any width like 600px
    fit: true, // 100% fit in a container
    tabidentify: 'gall'
  });
});
</script>

<!-- Smooth Scroll -->
<script>
$(document).ready(function(){
  // Add smooth scrolling to all links
  $("a").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "" && this.hash !== "#request") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top -150
      }, 800, function(){

        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
});
</script>

<script type="text/javascript">
function jsonpCallback(data) {
  //alert('Country: ' + data.address.country);

  var form_data = {
    country:data.address.country,
    set_greeting:'1'
  };
  $.ajax({
    url:"<?php echo home_url().'/set_greeting.php'; ?>",
    type:'POST',
    data:form_data,
    success:function(msg)
    {
      //alert(msg);
      if(msg != "")
      {
        $('#greeting').text(msg);
      }
      else
      {
        $('#greeting').text('Welcome Home!');
      }
    }
  });

}
</script>
<script src="http://api.wipmania.com/jsonp?callback=jsonpCallback"
type="text/javascript"></script>

<script>
$(".close").click(function(){
  $(".modalDialog").modal('hide');
});
</script>


<script src="https://use.fontawesome.com/108c9331e1.js"></script>
<script type="text/javascript">
$(document).ready(function () {

  $(".sub").hide();
  $(".show_hide").show();

  $('.show_hide').click(function () {
    $(".sub").toggle("slide");
  });

});
</script>
<script>
function check_loc_with_rfo(rfo)
{
  //alert(rfo);
  if($('#rfo').is(':checked'))
  var rfo = rfo;
  else
  var rfo = '0';

  var form_data={
    rfo : rfo,
    getLocationsWithRFO:"1"
  };
  $.ajax({
    url:"<?php echo get_home_url(); ?>/getLocationsWithRFO.php",
    type:'POST',
    data:form_data,
    success:function(msg){
      //alert(msg);
      $("#ploc").html(msg);
    }
  });

}
</script>

<!-- livezilla.net code Amaia -->
<script>
$(document).ready(function(){
  // alert('test');
  //         $("div#lz_eye_catcher").attr('style','display:none!important;');
  //    $("div#lz_overlay_chat").attr('style', 'display:none!important;');
  // $("div#lz_chat_overlay_main").attr('style', 'display:none!important;');
});
</script>
<script>
// $('#chat').click(function(){
//   alert('clicked');
//   $("div#lz_eye_catcher").attr('style','display:block!important;position: fixed; height: 100px; width: 300px; overflow: hidden; z-index: 9999; cursor: auto; margin: 0px; opacity: 1.1; left: 1029px; bottom: 0px; right: auto; top: auto;');
//   $("div#lz_overlay_chat").attr('style', 'display: block!important; position: fixed; height: 31px; width: 300px; overflow: hidden; z-index: 9999; cursor: move; margin: 0px; opacity: 1.1; left: 1029px; border-radius: 6px 6px 0px 0px; bottom: 0px; right: auto; top: auto;');
//   });
</script>
<div id="livezilla_tracking" style="display:none"></div>
<script type="text/javascript">
var script = document.createElement("script");
script.async=true;
script.type="text/javascript";
var src = "http://www.chat2.ayalalandmarketing.com/amaia/server.php?a=9f060&rqst=track&output=jcrpt&hg=P2FsaXNpP3N1cHBvcnQ_&hcgs=MQ__&htgs=MQ__&ovlc=IzczYmUyOA__&ovlt=V2UgYXJlIE9ubGluZS4gQ2hhdCB3aXRoIHVzLg__&ovloo=MQ__&ovlapo=MQ__&eca=Mg__&ecmb=MA__&eci=aHR0cDovL2NoYXQuYXlhbGFsYW5kbWFya2V0aW5nLmNvbS91cGxvYWRzL2J1YmJsZXMvcmJnLWNoYXQtYmFyLWFtYWlhLnBuZw__&ecio=aHR0cDovLw__&nse="+Math.random();
setTimeout("script.src=src;document.getElementById('livezilla_tracking').appendChild(script)",1);
</script>
<noscript>
  <img src="http://www.chat2.ayalalandmarketing.com/amaia/server.php?a=9f060&amp;rqst=track&amp;output=nojcrpt" width="0" height="0" style="visibility:hidden;" alt="">
</noscript>
<!-- http://www.livezilla.net -->

</body>

</html>
