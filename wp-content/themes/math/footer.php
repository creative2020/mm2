<?php do_action('tt_before_footer'); ?>

<div class="row">
    <div id="footer-wrap" class="col-sm-10 col-sm-offset-1">
        <div id="footer-col" class="col-sm-6">
            <a href="https://maps.google.com/maps?q=15061+Nall+Ave.+Leawood,+KS+66223&ie=UTF8&hq=&hnear=15061+Nall+Ave,+Overland+Park,+Kansas+66223&gl=us&t=m&source=embed&ll=38.85555,-94.648676&spn=0.010026,0.012789&z=14&iwloc=A"><img class="img-responsive" src="<?php echo get_stylesheet_directory_uri(); ?>/images/map.png" width="200px"/>
            <h2><i class="fa fa-map-marker"></i> Map</h2>
            <p>15061 Nall Ave, Leawood, KS 66223</p>
            
            </a>
        </div>
        <div id="footer-col" class="col-sm-6">
            <img class="img-responsive" src="<?php echo get_stylesheet_directory_uri(); ?>/images/contact.png" width="450px"/>
            
            <h2><i class="fa fa-phone"></i> Contact us</h2>
              <h4>Math Monkey of Leawood • 913-897-MATH (6284)</h4>
        </div>
    </div>    
</div>
          
      
  <div id="copyright" class="col-sm-10 col-sm-offset-1">
    <p><?php _e('&copy;','flexx'); echo ' '.date('Y').' '; _e(''.bloginfo('name'). ' - All rights reserved.','flexx'); ?> | <a href="#" title="Privacy Policy">privacy policy</a> | </p>
  </div>
  
</div><!--row-->

<?php wp_footer(); ?>
<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
</body>
</html>
