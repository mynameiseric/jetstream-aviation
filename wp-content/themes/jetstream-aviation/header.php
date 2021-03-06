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

<?php 
 // gravity_form_enqueue_scripts(1, true);
  wp_head(); 
?>
</head>

<body <?php body_class(); ?>>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-77310426-1', 'auto');
  ga('send', 'pageview');

</script>
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
        <div class="mobile-container">
          <div class="mobile-swoosh-up">
            <img src="<?php echo get_template_directory_uri() . '/img/swoosh-up.png'?>">
          </div>
          <div class="hamburger">
            <a id="menu-toggle" class="button menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'jetstream-aviation' ); ?>
              <span></span>
              <span></span>
              <span></span>
              <span></span>
            </a>
          </div>
          <div class="logo-header">
            <a href="/" alt="link to homepage">
              <img src="<?php echo get_template_directory_uri() . '/img/jetstream-aviation-logo.png'?>">
            </a>
          </div>
        </div>
<!--        <div class="swoosh-up"><img src="<?php // echo get_template_directory_uri() . '/img/swoosh-up.png';?>"></div>-->
        <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'items_wrap' => my_nav_wrap(), 'before' => '<div>', 'walker' => new Custom_Walker_Nav_Menu() ) ); ?>
<!--        <div class="swoosh-down"><img src="<?php // echo get_template_directory_uri() . '/img/swoosh-down.png';?>"></div>-->
      </nav><!-- #site-navigation -->
    </div>
	</header><!-- #masthead -->

<!--  <section id="request-quote" class="request-quote">
    <div class="inner">
      <a href="#" id="close-request-quote"><span class="fa fa-times-circle"></span></a>
      <h4>Call us at 208.345.3730 or fill out the form below</h4>
      <?php //echo do_shortcode( '[gravityform id="1" ajax="true" title="false" description="false"]' ); 
           //  gravity_form(1, false, false, false, null, false, 1, false)
        ?>
    </div>-->
  </section>
  
	<div id="content" class="site-content">
