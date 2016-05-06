<?php
/**
 * Page Template for the Private Charter page 
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Jetstream_Aviation
 */

get_header(); 
the_post();

?>

<div id="primary" class="content-area">
  <main id="main" class="site-main" role="main">

  <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header" style="<?php if( has_post_thumbnail() ) { ?>background-image: url('<?php the_post_thumbnail_url( 'large' )?>')<?php }?>; ">
      <div class="container">
        <div class="inner">
        <?php
            the_title( '<h1 class="entry-title">', '</h1>' );
            the_content(); 
        ?>
        </div>
      </div>
    </header><!-- .entry-header -->

    <div class="entry-content">
      <h2><span>Rental Fleet</span></h2>
  <?php
      
    $args=array(
      'post_type'       => 'rental',
      'post_status'     => 'publish',
      'posts_per_page'  => -1,
      'order_by'        => 'menu_order',
      'order'           => 'DESC',
    );


    $my_query = new WP_Query($args);
    if( $my_query->have_posts() ) { ?>
      <div class="grid-container">
      <?php
      $post_count = $my_query->post_count;
      while ($my_query->have_posts()) : $my_query->the_post(); 
        ?>
        <section class="aircraft">
          <h3><?php the_title(); ?></h3>
          <?php if( has_post_thumbnail() ) { ?>
          <div class="aircraft-image"  style="<?php if( has_post_thumbnail() ) { ?>background-image: url('<?php the_post_thumbnail_url( 'medium' )?>')<?php }?>;">
            <?php //the_post_thumbnail('large'); ?>
          </div>
          <div class="description">
          <?php }
          the_content(); 
          ?>
          </div>
        </section>
    <?php
      endwhile; ?>
      </div>
    <?php
    }
    wp_reset_query();  // Restore global post data stomped by the_post().
    ?>
    </div><!-- .entry-content -->

  </article>
  </main><!-- #main -->
</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
