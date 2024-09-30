<?php
/**
 * Template Name: ALP Topic Page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="full-width-home-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content">

		<div class="row">

			<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main" role="main">

					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'loop-templates/content', 'home' ); ?>
											
					<?php endwhile; // end of the loop. ?>
					
					<!--TRIO GROUPING-->
					<?php if( have_rows('home_call_out') ): ?>
 
					    <div class="row row-eq-height home-trio">
					 	<div class="col-md-12" id="svgRow"><? echo get_the_trio_header();?></div>
					    <?php while( have_rows('home_call_out') ): the_row(); ?>
						
					        <div class="col-md-4">
					        	<div class="trio-stat"><?php trio_svg(get_row_index());?></div>
					        	<h3 class="trio-stat-title"><?php the_sub_field('landing_main_title'); ?></h3>
					        	<p><?php the_sub_field('landing_blurb'); ?></p>
					        </div>
					        					       					        
					    <?php endwhile; ?>					 
					   </div>
					<?php endif; ?>
 					<!--END TRIO-->
 					<!--FIRST CALL TO ACTION ZONE-->
 					<?php if( have_rows('first_call_repeater') ): ?>
 						<div class="home-divider"></div>
 						<?php while( have_rows('first_call_repeater') ): the_row(); ?>
		 					<div class="row main-speech first-call call-number-<?echo get_row_index();?>">
		 						<div class="col-md-6 action-one">
		 							<h2 class="lead first-home-header"><?php the_sub_field('first_callout_header');?></h2>
		 							<div class="first-home-details"><?php echo the_sub_field('first_callout_details');?></div> 	
		 						</div>
		 						<div class="col-md-6">
		 							<?php echo acf_fetch_main_home_image();?>
		 						</div>

		 					</div>	
		 				<?php endwhile; ?>	
	 				 <?php endif; ?>	
 					<!--END FIRST CALL TO ACTION-->
 					<div class="row main-speech first-call">
 						<div class="col-md-6">
							<a href="services" class="btn btn-alp btn-learn btn-number-<?echo get_row_index();?>">Let's Learn Together</a>	
						</div>
					</div>	
 					<!--SECOND CALL TO ACTION - OUR DRIVERS-->
 					</div>
 					<div class="container-fluid drivers">
	 					<div class="container">
		 					<div class="row second-call justify-content-md-center">
								<div class="col-md-9">
									<?php echo get_the_second_home_header();?>
		 							<?php echo get_the_second_home_details();?> 	
								</div>
							</div>
							<div class="row drivers">
								<? echo get_the_home_drivers();?>						
								<a href="<?php echo get_home_url().'/services';?>" class="btn btn-alp btn-dark action-two-button">Read More</a>				
							</div>
						</div>	
					</div>	
 				<!--END SECOND CALL TO ACTION-->
 				<!--quotes-->
				<div class="quotes"> 	
					<div class="container-fluid">				
	 					<div class="row quotes justify-content-md-center">
							<div class="col-md-12 quote-box">
								<div id="carouselQuoteControls" class="carousel slide" data-ride="false">
									  <div class="carousel-inner">
									  <div class="quote-slogan">Words from our partners</div>	

									    <!--ITEMS START-->
										<? echo quote_maker();?>																
										<!--ITEMS END-->
									  </div>
									  <a class="carousel-control-prev" href="#carouselQuoteControls" role="button" data-slide="prev">								   
									    <span class="quote-nav left"><i class="arrow-left"></i></span>
									  </a>
									  <a class="carousel-control-next" href="#carouselQuoteControls" role="button" data-slide="next">
									    <span class="quote-nav right"><i class="arrow-right"></i></span>
									  </a>
								</div>
							</div>	
	 					</div>
	 				</div>
 				</div>
 				<!--end quotes-->
 				<!--stories-->
				<div class="container">
 					<h2 class="second-home-header d-flex justify-content-center" id="latest-stories">Latest Stories</h2>
 					<div class="row stories row-eq-height">
						<?php echo story_maker();?>
						 <a href="<?php echo get_home_url().'/our-stories';?>" class="btn btn-alp btn-dark stories-button d-flex justify-content-center">View Our Stories</a>
 					</div>
 				</div>	
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
						</div> -->
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
