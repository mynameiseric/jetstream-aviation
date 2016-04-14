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
      
    
      <section class="panel" style="background: url('./wp-content/uploads/2016/04/Dollarphotoclub_93006929-1600x762.jpg') center/cover no-repeat;">
        <div class="wrapper">
          <div class="inner">
            <h2>Your Plane is Ready</h2>
            <h4>Welcome message here... lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquah.</h4>
          </div>
        </div>
      </section>
      <section class="panel" style="background: url('./wp-content/uploads/2016/04/Dollarphotoclub_80598948-copy-1600x1066.jpg') center/cover no-repeat;">
        <div class="wrapper">
          <div class="inner">
            <h2>Private Charter</h2>
            <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliquah.</h4>
            <p>
              <a class="button" href="/private-charter">View our Fleet</a>
            </p>
          </div>
        </div>
      </section>
      <section class="panel" style="background: url('./wp-content/uploads/2016/04/Dollarphotoclub_2153178-1600x991.jpg') center/cover no-repeat;">
        <div class="wrapper">
          <div class="inner">
            <h2>Aircraft Management</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            <p>
              <a class="button" href="/aircraft-management">View our Services</a>
            </p>
          </div>
        </div>
      </section>
      <section class="panel" style="background: url('./wp-content/uploads/2016/04/30655393-1600px.jpg') center/cover no-repeat;">
        <div class="wrapper">
          <div class="inner">
            <h2>Aircraft Sales</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            <p>
              <a class="button" href="/private-charter">View our Services</a>
            </p>
          </div>
        </div>
      </section>
      <section class="panel" style="background: url('./wp-content/uploads/2016/04/Dollarphotoclub_82548802-4in.jpg') center/cover no-repeat;">
        <div class="wrapper">
          <div class="inner">
            <h2>Aircraft Maintenance</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            <p>
              <a class="button" href="/aircraft-maintenance">View our Services</a>
            </p>
          </div>
        </div>
      </section>
      <section class="panel" style="background: url('./wp-content/uploads/2016/04/Dollarphotoclub_26028773-8in-1600x1067.jpg') center/cover no-repeat;">
        <div class="wrapper">
          <div class="inner">
            <h2>Flight Lessons</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            <p>
              <a class="button" href="/flight-lessons">View our Services</a>
            </p>
          </div>
        </div>
      </section>
      <section class="panel about-jetstream" style="background: #0d61ad; height: auto; padding-bottom: 20px;">
        <h2 style="text-align: center; color: #fff;">About Jetstream Aviation</h2>
        <div style="width: 1280px;margin: 0 auto;">
          <div style="float:left;width: 50%;padding: 0 40px;">
            <p style="color: #fff; text-align: left; margin-top: 0;">
Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. 
            </p>
            <p>
              <a class="button" href="/meet-the-team">Meet your flight team</a>
            </p>
          </div>
          <div style="float:right;width: 50%;padding: 0 40px;">
            <img src="./wp-content/uploads/2016/04/timeline.png" alt="timeline">
          </div>
        </div>
      </section>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();