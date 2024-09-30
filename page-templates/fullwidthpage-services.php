<?php
/**
 * Template Name: ALP SERVICES Page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>
</div>
</div>
</div>
<div class="jumbotron jumbotron-services">
	 <div class="container team header">
	 	<div class="justify-content-md-center row">
          <h1 class="display-3 services-title col-md-8"><?php the_title();?></h1>
          <div class="col-md-8 services-description"><?php echo acf_fetch_services_header_description($post->ID);?></div>
        </div>
    </div>
</div>
<div class="wrapper" id="full-width-services-wrapper">

	<div class="container" id="content">

		<div class="row">

			<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main" role="main">

					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'loop-templates/content', 'services' ); ?>

						<?php
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :

							comments_template();

						endif;
						?>

					<?php endwhile; // end of the loop. ?>

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->
<div class="medium-blue contact-button-area">
	<div class="container">
		<h2 class="services-button-title button-area-title"><?php echo acf_fetch_services_button_area_title() ?></h2>
		<div class="services-button-statement button-area-statement"><?php echo acf_fetch_services_button_area_statement() ?></div>
		  <button type="button" class="btn-alp btn-dark btn" data-bs-toggle="modal" data-bs-target="#contactModal">Contact Us</button>
	</div>
</div>

<?php get_footer(); ?>
