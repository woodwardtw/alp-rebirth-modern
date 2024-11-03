<?php
/**
 * Partial template for content partner
 *
 * @package understrap
 */

?>
</div>
</div>
</div>
<?php //echo bannerMaker();?>
<div class="jumbotron jumbotron-single-partner">
	 <div class="container partner header">
	 	<div class="justify-content-md-center row">
	 	  <div class="partner-tag col-md-12">Our Partners</div>
          <h1 class="display-3 partner-title col-md-8"><?php the_title();?></h1>
          <div class="col-md-9 partner-description"><?php echo get_the_district_overview(1);?></div>
        </div>
    </div>
</div>

<div class="container">
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">	
	<div class="entry-content"> 
<!--          overview            -->
		<div class="row partner-row">
			<div class="district-overview col-md-8">
				<h2>District Overview</h2>
				<?php echo get_the_district_overview(0);?>					
				</div>
			<div class="col-md-4 partner-img-row"><img class="img-fluid partner-img" src="<?php echo get_the_district_img();?>" alt="An image representing the district."></div>
		</div>	
<!--          services and demographics            -->	
		<div class="row partner-details">
			<div class="col-md-8">
				<h3>Key Services</h3><div class="partner-all-services"><a href="../../services">View All Services</a></div>
				<div class="the-services row">					
					<?php echo get_the_district_services();?>
				</div>
			</div>
			<div class="col-md-4 the-demographics">
				<h3>Highlights</h3>
				<ul>
					<?php echo get_the_district_demogrphics();?>
				</ul>
			</div>
		</div>
<!--          timeline            -->
</div>
</article>
</div>
<div class="district-timeline">
	<div class="container">	
		<div class="row partner-timeline">
			<h2>District Timeline</h2>
			<div class="timeline-overview"><?php echo get_the_timeline_overview();?></div>			
		</div>
			<?php echo get_the_timeline_events();?>		
		</div>
<!--          Back to top            -->
		<div class="row partner-bottom">
			<div class="container">
				<div class="col-md-12">
					<div class="dell row">
						<div class="alp-partner-logo col-md-6"><img src="<?php echo acf_fetch_alp_partner_logo()?>"></div>
						<div class="dell-partner-logo col-md-6"><img src="<?php echo acf_fetch_dell_partner_logo()?>"></div>					
						<div class="partner-statement col-md-12"><?php echo acf_fetch_partner_statement();?></div>
					</div>
				</div>
			</div>	
		</div>

		<?php
		/*wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
			'after'  => '</div>',
		) );*/
		?>
	</div><!-- .entry-content -->	
	<div class="partner-nav">
		<?php partner_post_nav(); ?>
	</div>
	<div class="district-learn-more">
		<div class="container">	
			<div class="row align-items-center">
				<div class="col-md-8 district-contact">
					<h2 class="services-button-title button-area-title"><?php echo acf_fetch_partner_button_header() ?></h2>
					<div class="services-button-statement button-area-statement"><?php echo acf_fetch_partner_button_description() ?></div>					
					<button class="btn btn-alp btn-dark" type="button" data-bs-toggle="modal" data-bs-target="#contactModal">Contact Us</button>
				</div>
			</div>
		</div>


	<footer class="entry-footer">
		<?php edit_post_link( __( 'Edit', 'understrap' ), '<span class="edit-link">', '</span>' ); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
