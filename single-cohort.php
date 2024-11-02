<?php
/**
 * The template for displaying all single cohorts.
 *
 * @package understrap
 */

get_header();
$container   = get_theme_mod( 'understrap_container_type' );
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
								
						<!-- 		</div>
							</div>
						</div>  -->
					<!--end tweets-->
				<!-- 		<div class="row message-row">    
							 <div class="col-md-12 alp-sub-message">
							 	<h2>ALP is active across North America</h2>
							 	<div class="home-details">ALP is a partner, designer, and agent of change. We move beyond the expert mindset and one-size-fits-all, quick fix solutions.</div>
								<div class="home-map">
							 		<?php //echo do_shortcode('[mapit person="any"]');?>
							 	</div>
							 </div>							
	 					</div> -->

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
<!--CONTACT Modal -->
<div class="modal fade" id="resourceModal" tabindex="-1" role="dialog" aria-labelledby="the-greeting" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen" role="document">
    <div class="modal-content">
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      <div class="modal-header">
        <h2 class="modal-title" id="the-greeting">Resource Submission</h2>       
      </div>
      <div class="modal-body">
        <?php echo do_shortcode('[gravityform id="3" title="false" description="false" ajax="true"]');?>
      </div>      
    </div>
  </div>
</div>
    <!-- END Modal -->
<?php get_footer(); ?>
