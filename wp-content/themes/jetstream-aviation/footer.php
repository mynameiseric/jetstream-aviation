 <?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Jetstream_Aviation
 */

?>

	</div><!-- #content -->
	<footer id="colophon" class="site-footer" role="contentinfo">
      <div class="newsletter-signup">
        <div class="inner">
          <div class="argus-seal">
            <img src="<?php echo get_template_directory_uri() . '/img/argus-seal.png';?>">
          </div>
          <h5>SIGN UP FOR OUR ONEWAY SPECIALS</h5><?php echo do_shortcode('[mc4wp_form id="39"]');?>
        </div>
      </div>
      <div class="inner">
        <div class="contact-us">
          <h5><span>Contact Us</span></h5>
          <?php //echo do_shortcode( '[gravityform id="2" ajax="true" title="false" description="false"]' );
          //echo get_page_template_slug( get_the_ID() );
            if ( basename( get_permalink() ) != 'request-a-quote' ) {
              echo do_shortcode( '[gravityform id="2" title="false" description="false" ajax="true"]' );
            }
          ?>
          <div class="contact-info">
            <div class="boise">
              <h6>Boise</h6>
              <div class="address">
                <div class="fa fa-home" aria-hidden="true"></div>
                <div class="inner">
                  3591 Rickenbacker Street<br/>Boise, ID 83705<br/><a href="https://goo.gl/maps/YiZ9hpqDFq82" target="_blank">View Map</a>
                </div>
              </div>
              <div class="phone">
                <div class="fa fa-phone" aria-hidden="true"></div>
                <div class="inner">
                  208.345.3730
                </div>
              </div>
              <div class="email">
                <div class="fa fa-envelope" aria-hidden="true"></div>
                <div class="inner">
                  <a href="mailto:fly@jetstreamaviation.com">fly@jetstreamaviation.com</a>
                </div>
              </div>
              <div class="radio">
                <div class="fa fa-map-marker" aria-hidden="true"></div>
                <div class="inner">
                Boise, Idaho KBOI
                </div>
              </div>
            </div>
            <div class="seattle">
              <h6>Seattle</h6>
              <div class="address">
                <div class="fa fa-home" aria-hidden="true"></div>
                <div class="inner">
                  8453 Perimeter Road South<br/>Seattle, WA 98108<br/><a href="https://goo.gl/maps/V1QnAen3wM22" target="_blank">View Map</a>
                </div>
              </div>
              <div class="phone">
                <div class="fa fa-phone" aria-hidden="true"></div>
                <div class="inner">
                  206.979.8719
                </div>
              </div>
              <div class="email">
                <div class="fa fa-envelope" aria-hidden="true"></div>
                <div class="inner">
                  <a href="mailto:fly@jetstreamaviation.com">fly@jetstreamaviation.com</a>
                </div>
              </div>
              <div class="radio">
                <div class="fa fa-map-marker" aria-hidden="true"></div>
                <div class="inner">
                Seattle, Washington KBFI
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="copyright">
        <div class="inner">
          <p> 
          &copy;<?php echo date('Y');?> Jetstream Aviation, Inc.
          </p>
          <a class="facebook" target="_new" href="https://www.facebook.com/JetstreamAviationInc/"><span>facebook></span></a>                </div>
      </div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
