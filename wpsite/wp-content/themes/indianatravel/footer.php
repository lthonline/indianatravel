<div class="afilition-brands">
    <ul class="afilition-brands-list">
        
        <li><img src="<?php echo get_template_directory_uri(); ?>/images/IATA-logo.png" alt="International Air Transport Association (IATA)" width="89" height="57" /></li>        
        <li><img src="<?php echo get_template_directory_uri(); ?>/images/incredible-india-tourism-logo.png" alt="Incredible India Tourism" width="250" height="57" /></li>
        <li><img src="<?php echo get_template_directory_uri(); ?>/images/20years-logo.jpg" alt="Indiana travel services" width="150" /></li>
        <li><img src="<?php echo get_template_directory_uri(); ?>/images/le-club-accor-hotels.jpg" alt="Indiana travel services" width="159" height="auto"/></li>
        <li><img src="<?php echo get_template_directory_uri(); ?>/images/the-leading-hotels-of-world.jpg" alt="Indiana travel services" width="150" /></li>
    </ul>
</div>
<footer class="footer section-60">
  <div class="container">
    <div class="wrapper">
      <div class="contact-detail">
        <div class="col-md-4 map">
          <div id="indiana-map" style="width: 100%; height: 320px;"></div>
          <script>
            function initMap() {
              var uluru = {lat: 19.074862, lng: 72.834399};
              var map = new google.maps.Map(document.getElementById('indiana-map'), {
                zoom: 16,
                center: uluru
              });
              var marker = new google.maps.Marker({
                position: uluru,
                map: map
              });
            }
          </script>
          <script async defer
          src="https://maps.googleapis.com/maps/api/js?key=<?php echo GOOGLE_MAP_KEY; ?>&callback=initMap">
          </script>
        </div>
        <div class="col-md-4 add-detail">
          <h2>CONTACT<span>US NOW</span></h2>
          <div class="details">
            <a href="tel:+91 22 6174 2233" rel="nofollow"><span><i class="fa fa-phone" aria-hidden="true"></i>
              &nbsp;&nbsp; +91 22 6174 2222</span></a><br><br>
            <a href="mailto:info@indianatravelservices.com"><span><i class="fa fa-envelope" aria-hidden="true"></i> &nbsp;: info@indianatravelservices.com</span></a> <br><br>
            <span><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;
              :&nbsp; <strong>INDIANA TRAVEL SERVICES</strong><br>
              <p>303, 3rd floor, Ramkrishna Chambers,<br>
                Linking Road, Opposite Maple Showroom,<br>
                Khar West, Mumbai 400052, India</p>
            </span>
          </div>
        </div>
        <div class="col-md-4">
          <a name="footercontact"></a> 
          <?php echo do_shortcode('[contact-form-7 id="131" title="Footer Contact Form" html_id="footer-form"]'); ?>
        </div>

      </div>
    </div>
  </div>   
</footer>
<div class="float-form-wrapper">
   <div class="float-form-header">
      <span class="float-form-title">Call Us Now</span>
      <span class="fa fa-chevron-circle-down btn-expand hide-arrow"></span>
   </div>
   <div class="float-form-holder expand" id="floatFormHolder">
      <div>
         <span class="address-block-title">INDIANA TRAVEL SERVICES</span>
         <ul class="address-block-line">
            <li><span class="fa fa-map-marker"></span> <strong>Address</strong></li>
            <li>303, 3rd floor, Ramkrishna Chambers,</li>
            <li>Linking Road, Opposite Maple Showroom,</li>            
            <li>Khar West, Mumbai 400052, India</li>            
            <li>&nbsp;</li> 
            <li><span class="fa fa-phone"></span> +91 22 6174 2222</li>
         </ul>    
         <div>
            <a href="https://www.google.co.in/maps/place/Indiana+Travel+Services/@19.0748323,72.8343987,15z/data=!4m5!3m4!1s0x0:0xbf3e7ccf15b388be!8m2!3d19.0748323!4d72.8343987" target="_blank">Find us on Google Map</a>
         </div>
      </div>
   </div>   
</div>
<?php wp_footer(); ?>
</body>