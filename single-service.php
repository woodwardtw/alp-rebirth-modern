<?php
/**
 * The template for displaying all single services.
 *
 * @package understrap
 */

get_header();
$container   = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="single-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main" id="main">

				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'loop-templates/content', 'service' ); ?>

						<?php understrap_post_nav(); ?>

					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
					?>

				<?php endwhile; // end of the loop. ?>

			</main><!-- #main -->

		<!-- Do the right sidebar check -->
		<?php //get_template_part( 'global-templates/right-sidebar-check' ); ?>

	</div><!-- .row -->

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
