<?php
/**
 * Template Name: ALP special topic
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="full-width-page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content">

		<div class="row">

			<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main" role="main">

					<!-- .entry-content -->

					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'loop-templates/content', 'topic' ); ?>
						<?php get_template_part( 'loop-templates/content', 'flexcontent' );?>
											
					<?php endwhile; // end of the loop. ?>
					
					
 				<!--stories-->
				
				<!--end stories-->	
				<!--tweets-->
				<!-- <div class="blue-row">
					<div class="container">
						<div class="row tweet-row">
							<div class="col-md-3 tweet-center tweet-control">
								<i class="fa fa-twitter"></i>
								<div class="tweet-tag">#ALPLearn</div>
								<a class="carousel-control-prev tweet-less" href="#carouselTweetControls" role="button" data-slide="prev">		
								 	<span class="tweet-nav left"><i class="arrow-left"></i></span>
								</a>
								<a class="carousel-control-next tweet-more" href="#carouselTweetControls" role="button" data-slide="next">
									<span class="tweet-nav right"><i class="arrow-right"></i></span>
								</a>
							</div>
							<div id="carouselTweetControls" class="carousel slide col-md-9" data-ride="false" data-interval="false">
								<div class="carousel-inner">
									<!--TWEETS START-->
								    
									<!--ITEMS END-->
								</div>
							</div>
						</div> 
					<!--end tweets-->
						<div class="row message-row">    
							 <div class="col-md-12 alp-sub-message">
							 	<h2>ALP is active across North America</h2>
							 	<div class="home-details">ALP is a partner, designer, and agent of change. We move beyond the expert mindset and one-size-fits-all, quick fix solutions.</div>
								<div class="home-map">
							 		<?php echo do_shortcode('[mapit person="any"]');?>
							 	</div>
							 </div>							
	 					</div>

	 				</div>
					
	 			</div>	 					

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
