<?php
/**
 * Template Name: ALP STORY BROWSER Page
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
<div class="stories-agg-wrapper">
	<div class="jumbotron jumbotron-stories">
		 <div class="container header">
		 	<div class="justify-content-md-center row">
	          <h1 class="display-3 story-agg-title col-md-8"><?php the_title();?></h1>
	          <div class="col-md-8 story-agg-desc"><?php echo get_post_field('post_content', $post->ID);?></div>
	        </div>
	    </div>
	</div>

	<div class="wrapper" id="full-width-home-wrapper">

		<div class="<?php echo esc_attr( $container ); ?>" id="content">

			<div class="row">

				<div class="col-md-12 content-area" id="primary">

					<main class="site-main" id="main" role="main">

						<?php while ( have_posts() ) : the_post(); ?>

							<?php get_template_part( 'loop-templates/content', 'story-browser' ); ?>

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
</div>
<?php get_footer(); ?>
