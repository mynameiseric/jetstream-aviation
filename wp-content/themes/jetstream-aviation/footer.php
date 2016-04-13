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
        <h5>SIGN UP FOR OUR NEWSLETTER</h5><?php echo do_shortcode('[mc4wp_form id="29"]');?>
      </div>
    </div>
    <div class="inner">
      <div class="contact-us">
        <h5><span>Contact Us</span></h5>
        <div class="contact-info">
          <div class="address">
            3591 Rickenbacker Street<br/>Boise, ID 83705
          </div>
          <div class="phone">
            208.345.3730
          </div>
          <div class="radio">
            Boise, Idaho KBOI<br/>Seattle, Washington KBFI
          </div>
        </div>
        <?php echo do_shortcode( '[gravityform id="2" ajax="true" title="false" description="false"]' ); ?>
      </div>
      <div class="argus-seal">
        <div class="inner">
          <img src="/wp-content/uploads/2016/04/argus-seal.png">
          <p>Jetstream has proudly obtained the ARG/US Gold International Certification</p>
        </div>
      </div>
    </div>
    <div class="copyright">
      <div class="inner">
        <p>
        &copy;<?php echo date('Y');?> Jetstream Aviation, Inc.
        </p>
      </div>
    </div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
