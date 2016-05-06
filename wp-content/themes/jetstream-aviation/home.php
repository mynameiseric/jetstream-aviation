<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Jetstream_Aviation
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
      
<?php
  $args=array(
    'post_type'       => 'homepage_panel',
    'post_status'     => 'publish',
    'posts_per_page'  => -1,
    'order_by'        => 'menu_order',
    'order'           => 'ASC',
  );

 
  $my_query = new WP_Query($args);
  $featured_image = '';
  $count = 0;
  if( $my_query->have_posts() ) {
    $post_count = $my_query->post_count;
    while ($my_query->have_posts()) : $my_query->the_post(); 
      $count++;
      ?>
  <section class="panel <?php if( $count % 2 == 0 ) {?>light-bg<?php } else { ?>dark-bg<?php } ?>" <?php if( has_post_thumbnail() ) { ?>data-original="<?php the_post_thumbnail_url( 'large' ); }?>" style="background: #0d61ad center/cover no-repeat;">
        <div class="wrapper">
          <div class="inner">
            <h2><?php the_title(); ?></h2>
      <?php if ($count != $post_count) { ?>
            <span></span>
      <?php } ?>
            <?php the_content(); ?>
          </div>
        </div>
      </section>
      <?php if ($count != $post_count) { ?>
        <a href="#" class="next-panel-arrow"><span></span></a>          
      <?php } 
      else { ?>
        <a href="#" id="footer-arrow"><span></span></a>          
      <?php } ?>
  <?php
    endwhile;
  }
  wp_reset_query();  // Restore global post data stomped by the_post().
  ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();