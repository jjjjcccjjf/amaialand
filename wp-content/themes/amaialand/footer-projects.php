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
<script type="text/javascript">
$(document).ready(function () {
  /**
  *  script for property finder stuffs
  *  @author: @jjjjcccjjf | lsalamante@myoptimind.com
  */

  var $project_type = $('select[name=ptype]'); // Property drop down variable
  var $price_range = $('select[name=pprice]'); // Price range drop down variable
  var $location = $('select[name=ploc]'); // Location drop down variable
  var $rfo = $('#rfo'); // Location drop down variable

  /**
  * set our locations and price range based on the property type
  */
  $project_type.change(function(){

    /**
    * Initialize if rfo variable
    * could improve this to make into a function but
    * asdasdashdlakshdkajshdjakshdkjashdakshdjk
    */
    var rfo = 0;
    if($('#rfo').is(':checked')){
      rfo = 1;
    }

    var form_data = {
      ptype : $project_type.val()
    };

    $.ajax({
      url:"<?php echo get_home_url(); ?>/ajax_property_finder.php?type=price_range&rfo=" + rfo,
      type:'POST',
      data:form_data,
      success:function(msg){
        $price_range.empty();
        $price_range.append(msg);
        // console.log(msg);
      }
    });
    $.ajax({
      url:"<?php echo get_home_url(); ?>/ajax_property_finder.php?type=location&rfo=" + rfo,
      type:'POST',
      data:form_data,
      success:function(msg){
        $location.empty();
        $location.append(msg);
        // console.log(msg);
      }
    });
  });
  /** end script for property type on change event */

  /**
  * set our locations based on price range
  */
  $price_range.change(function(){

    var rfo = 0;
    if($('#rfo').is(':checked')){
      rfo = 1;
    }

    var form_data = {
      ptype : $project_type.val(),
      pprice : $price_range.val()
    };

    $.ajax({
      url:"<?php echo get_home_url(); ?>/ajax_location_changer.php?rfo=" + rfo,
      type:'POST',
      data:form_data,
      success:function(msg){
        $location.empty();
        $location.append(msg);
        // console.log(msg);
      }
    });

  });
  /** end script for price range on change event */

  $rfo.change(function(){
    set_property_type();
  });

  /**
  * ajax call for setting the property type options
  * @var [type]
  */
  var set_property_type = function(){
    var is_rfo = 0;
    if($('#rfo').is(':checked')){
      is_rfo = 1;
    }

    $.ajax({
      url:"<?php echo get_home_url(); ?>/ajax_rfo_checker.php?rfo=" + is_rfo,
      type:'POST',
      data:{},
      success:function(msg){
        $project_type.empty();
        $project_type.append(msg);
      }
    });
  }
  /**
  * initialize our property type dropdown
  */
  set_property_type();

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
<?php 
foreach(wp_get_post_terms(wp_get_post_parent_id(get_the_ID()), "location") as $loc) 
{ 
  $location_name = $loc->name;
}
echo $location_name;
echo get_the_ID();

$mandaue = array(74, 3534);

?>
<!-- livezilla.net code Amaia -->
<script>

window.setInterval(function(){
  $("#lz_overlay_chat").attr('class','left-chat');
  $("#lz_eye_catcher").attr('style','display:none!important;');
}, 1);

</script>

<?php if(get_the_ID() == 3534 || $location_parent_id == 74): ?>

<!-- livezilla.net code (MANDAUE) -->
<div id="livezilla_tracking" style="display:none"></div>
<script type="text/javascript">
var script = document.createElement("script");script.async=true;script.type="text/javascript";var src = "http://chat2.ayalalandmarketing.com/amaia/server.php?a=b9452&rqst=track&output=jcrpt&intgroup=QW1haWEgU3RlcHMgTWFuZGF1ZQ__&hg=Pw__&ovlc=IzczYmUyOA__&eca=MQ__&ecsp=MQ__&nse="+Math.random();setTimeout("script.src=src;document.getElementById('livezilla_tracking').appendChild(script)",1);
</script>
<noscript>
  <img src="http://chat2.ayalalandmarketing.com/amaia/server.php?a=b9452&amp;rqst=track&amp;output=nojcrpt" width="0" height="0" style="visibility:hidden;" alt="">
</noscript>
<!-- http://www.livezilla.net -->

<?php //elseif($) ?>
<?php endif; ?>


<!-- GENERAL Livezilla -->
<?php if($location_name == "Luzon"): ?>
<div id="livezilla_tracking" style="display:none"></div>
<script type="text/javascript">
var script = document.createElement("script");script.async=true;script.type="text/javascript";var src = "http://chat2.ayalalandmarketing.com/amaia/server.php?a=9b51f&rqst=track&output=jcrpt&intgroup=QW1haWEgTGFuZA__&hg=Pw__&ovlc=IzczYmUyOA__&eca=MQ__&ecsp=MQ__&nse="+Math.random();setTimeout("script.src=src;document.getElementById('livezilla_tracking').appendChild(script)",1);
</script>
<noscript>
<img src="http://chat2.ayalalandmarketing.com/amaia/server.php?a=9b51f&amp;rqst=track&amp;output=nojcrpt" width="0" height="0" style="visibility:hidden;" alt="">
</noscript>

<!-- ILOILO Livezilla -->
<?php elseif(wp_get_post_parent_id(get_the_ID()) == 96): ?>
<!-- livezilla.net code (Iloilo) -->
<div id="livezilla_tracking" style="display:none"></div>
<script type="text/javascript">
var script = document.createElement("script");script.async=true;script.type="text/javascript";var src = "http://chat2.ayalalandmarketing.com/amaia/server.php?a=e80b6&rqst=track&output=jcrpt&intgroup=QW1haWEgU2NhcGVzIElsb2lsbw__&hg=Pw__&ovlc=IzczYmUyOA__&eca=MQ__&ecsp=MQ__&nse="+Math.random();setTimeout("script.src=src;document.getElementById('livezilla_tracking').appendChild(script)",1);
</script>
<noscript>
<img src="http://chat2.ayalalandmarketing.com/amaia/server.php?a=e80b6&amp;rqst=track&amp;output=nojcrpt" width="0" height="0" style="visibility:hidden;" alt="">
</noscript>
<!-- http://www.livezilla.net -->

<!-- GENERAL Livezilla -->
<?php else: ?>
<!-- livezilla.net code (NORTHPOINT and CAPITOL) -->
<div id="livezilla_tracking" style="display:none"></div>
<script type="text/javascript">
var script = document.createElement("script");script.async=true;script.type="text/javascript";var src = "http://chat2.ayalalandmarketing.com/amaia/server.php?a=df744&rqst=track&output=jcrpt&intgroup=Tm9ydGhQb2ludCBhbmQgQ2FwaXRvbA__&hg=Pw__&ovlc=IzczYmUyOA__&eca=MQ__&ecsp=MQ__&nse="+Math.random();setTimeout("script.src=src;document.getElementById('livezilla_tracking').appendChild(script)",1);
</script>
<noscript>
<img src="http://chat2.ayalalandmarketing.com/amaia/server.php?a=df744&amp;rqst=track&amp;output=nojcrpt" width="0" height="0" style="visibility:hidden;" alt="">
</noscript>
<!-- http://www.livezilla.net -->
<?php endif; ?>

<!-- http://www.livezilla.net -->

</body>

</html>
