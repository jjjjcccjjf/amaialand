<?php $homeID = 20; ?>
<style>
/*div#lz_overlay_chat,div#lz_eye_catcher {
display: none;
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
  <center>Copyright 2016. Amaia Land.</center> <!--<a href="<?php echo get_permalink(25); ?>">Privacy Policy</a> | <a href="<?php echo get_permalink(27); ?>">Terms and Conditions</a> | <a href="<?php echo get_permalink(29); ?>">Sitemap</a> | <a href="#">E-newsletter</a> | <a href="http://askamie.amaialand.com/">Contact Us</a> -->
</div>
</footer>

<div class="floatingMenu" style="z-index:9999999">
  <button class="show_hide"><i class="fa fa-commenting-o" aria-hidden="true"></i></button>
  <ul class="sub">
    <li><a a href="tel:09778526242"><i class="fa fa-phone" aria-hidden="true"></i></a></li>
    <li><a href="<?php echo get_permalink(18); ?>"><i class="fa fa-envelope-o" aria-hidden="true"></i></a></li>
    <li><a href="#" id="chat" onclick="lz_chat_change_state(true,false);" ><i class="fa fa-comments-o" aria-hidden="true"></i></a></li>
  </ul>
</div>
<!-- Scripts -->
<script src="https://use.fontawesome.com/108c9331e1.js"></script>
<script src="<?php echo bloginfo('template_directory'); ?>/js/jquery.min.js"></script>
<script src="<?php echo bloginfo('template_directory'); ?>/js/flickity.pkgd.min.js"></script>
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
<script src="<?php echo bloginfo('template_directory'); ?>/js/jquery.magnific-popup.js"></script>

<script>
jQuery(document).ready(function($) {

  $('#open-popup').magnificPopup({
    type:'inline',
    closeBtnInside: true,
    fixedContentPos: false
  });
});
</script>

<script type="text/javascript" src="<?php echo bloginfo('template_directory'); ?>/js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="<?php echo bloginfo('template_directory'); ?>/js/jquery-ui-1.7.custom.min.js"></script>
<script type="text/javascript">
$(function() {

  var $tabs = $('#tabs').tabs();

  $(".ui-tabs-panel").each(function(i){

    var totalSize = $(".ui-tabs-panel").size() - 1;

    if (i != totalSize) {
      next = i + 2;
      $(this).append("<a href='#' class='next-tab mover' rel='" + next + "'><img src='<?php echo bloginfo('template_directory'); ?>/images/arrowdown.png'></a>");
    }

    if (i != 0) {
      prev = i;
      $(this).append("<a href='#' class='prev-tab mover' rel='" + prev + "'><img src='<?php echo bloginfo('template_directory'); ?>/images/arrowup.png'></a>");
    }

  });

  $('.next-tab, .prev-tab').click(function() {
    $tabs.tabs('select', $(this).attr("rel"));
    var li_id = $('#tabs').find('li.ui-state-active');
    var y_pos = $(li_id).position();
    // $('').scrollTop()+y_pos.top;
    $("#tabs_ul").animate({ scrollTop: y_pos.top}, 300);
    // $('#tabs_ul').animate({
    // }, 500);
    // alert($tabs.id());
    return false;
  });


});
</script>

<script src="<?php echo bloginfo('template_directory'); ?>/js/jPushMenu.js"></script>
<script>
jQuery(document).ready(function($) {
  $('.toggle-menu').jPushMenu();
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

<!--<script language="JavaScript" src="http://www.geoplugin.net/javascript.gp" type="text/javascript"></script>

<script language="Javascript">
document.write("Welcome to our visitors from "+geoplugin_countryName());
</script>-->

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
<script type="text/javascript">
$(document).ready(function () {
  /**
  *  script for property type on change event
  *  @author: lsalamante@myoptimind.com
  */

  var $project_type = $('select[name=ptype]'); // Property drop down variable
  var $price_range = $('select[name=pprice]'); // Price range drop down variable
  var $location = $('select[name=ploc]'); // Location drop down variable

  $project_type.change(function(){

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
      }
    });
    $.ajax({
      url:"<?php echo get_home_url(); ?>/ajax_property_finder.php?type=location&rfo=" + rfo,
      type:'POST',
      data:form_data,
      success:function(msg){
        $location.empty();
        $location.append(msg);
      }
    });
  });

  /** end script for property type on change event */
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

<script>
function contact_agent(email_to,cnt){
  var form_data={

    fullname:$("#fullname"+cnt).val(),
    email_from:$("#email_from"+cnt).val(),
    subject:$("#subject"+cnt).val(),
    message:$("#message"+cnt).val(),
    email_to:email_to,
    contactAgent:"1"
  };
  $.ajax({
    url:"<?php echo bloginfo('template_directory'); ?>/php-functions/contactAgent.php",
    type:'POST',
    data:form_data,
    success:function(msg){
      if(msg == 'Message Sent!')
      {
        $('.inquiry_res').text(msg);
        $('.inquiry_res').css('color','green');

      }
      else
      {
        $('.inquiry_res').text(msg);
        $('.inquiry_res').css('color','red');

      }
    }
  });
  return false;

}

</script>

<!-- livezilla.net code Amaia -->
<script>
$(document).ready(function(){
  // alert('test');
  $("div#lz_eye_catcher").attr('style','display:none!important;');
  $("div#lz_overlay_chat").attr('style', 'display:none!important;');
  // $("div#lz_chat_overlay_main").attr('style', 'display:none!important;');

});
window.setInterval(function(){
  $("div#lz_eye_catcher").attr('style','display:none!important;');
}, 1000);
</script>
<script>
$('#chat').click(function(){
  // alert('clicked');
  // $("div#lz_eye_catcher").attr('style','display:block!important;position: fixed; height: 100px; width: 300px; overflow: hidden; z-index: 9999; cursor: auto; margin: 0px; opacity: 1.1; left: 1029px; bottom: 0px; right: auto; top: auto;');
  $("div#lz_overlay_chat").attr('style', 'display: block !important; position: fixed; height: 31px; width: 300px; overflow: hidden; z-index: 9999; cursor: move; margin: 0px; opacity: 1.1; left: 1583px; border-radius: 6px 6px 0px 0px; bottom: 0px; right: auto; top: auto;');
  // $("div#lz_eye_catcher,div#lz_overlay_chat").css('display','block');
  // void(lz_chat_change_state(true,false));
});
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



<?php if(is_front_page()): ?>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo bloginfo('template_directory'); ?>/js/responsiveslides.min.js"></script>
  <script>
  $.noConflict();
  jQuery(function () {
    jQuery("#rslides").responsiveSlides({
      auto: true,
      // pager: true,
      // nav: true,
      speed: 500,
      maxwidth: 2656,
      namespace: "centered-btns"
    });
  });
  </script>
<?php endif; ?>

</body>

</html>
