<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Jetstream_Aviation
 */

?>

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

<!--	<div class="entry-content">
		<?php
//			the_content();
//
//			wp_link_pages( array(
//				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'jetstream-aviation' ),
//				'after'  => '</div>',
//			) );
		?>
	</div> .entry-content -->

</article><!-- #post-## -->
