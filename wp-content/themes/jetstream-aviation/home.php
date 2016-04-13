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
      
    
      <section class="panel">
        <div class="wrapper">
          <div class="inner">
            <h2>Your Plane is Ready</h2>
            <h4>Welcome message here</h4>
          </div>
        </div>
      </section>
      <section class="panel">
        <div class="wrapper">
          <div class="inner">
            <h2>Private Charter</h2>
            <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquah</h4>
            <p>
              <a class="button" href="/private-charter">View our Fleet</a>
            </p>
          </div>
        </div>
      </section>
      <section class="panel">
        <div class="wrapper">
          <div class="inner">
            <h2>Private Charter</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            <p>
              <a class="button" href="/private-charter">View our Fleet</a>
            </p>
          </div>
        </div>
      </section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();