<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Jetstream_Aviation
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'jetstream-aviation' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
    <div class="container">
      <div class="site-branding">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="nav-home" rel="home">
        <?php
        if ( is_front_page() && is_home() ) : ?>
          <h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
        <?php else : ?>
          <p class="site-title"><?php bloginfo( 'name' ); ?></p>
        <?php
        endif;
        echo '</a>';

        $description = get_bloginfo( 'description', 'display' );
        if ( $description || is_customize_preview() ) : ?>
          <p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
        <?php
        endif; ?>
      </div><!-- .site-branding -->
      <nav id="site-navigation" class="main-navigation" role="navigation">
        <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'jetstream-aviation' ); ?></button>
<!--        <div class="swoosh-up"><img src="<?php // echo get_template_directory_uri() . '/img/swoosh-up.png';?>"></div>-->
        <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'items_wrap' => my_nav_wrap(), 'before' => '<div>', 'walker' => new Nav_Link_Wrap() ) ); ?>
<!--        <div class="swoosh-down"><img src="<?php // echo get_template_directory_uri() . '/img/swoosh-down.png';?>"></div>-->
      </nav><!-- #site-navigation -->
    </div>
	</header><!-- #masthead -->

  <section id="request-quote" class="request-quote">
    <div class="inner">
      <a href="#" id="close-request-quote"><span class="fa fa-times-circle"></span></a>
      <h4>Call us at 208.555.5555 or fill out the form below:</h4>
      <?php echo do_shortcode( '[gravityform id="1" ajax="true" title="false" description="false"]' ); ?>
    </div>
  </section>
  
	<div id="content" class="site-content">
