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

  </article>
  </main><!-- #main -->
</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
