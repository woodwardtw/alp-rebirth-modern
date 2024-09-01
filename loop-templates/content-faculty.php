<?php
/**
 * Partial template for content faculty
 *
 * @package understrap
 */

?>
</div>
</div>
</div>
<div class="jumbotron faculty-jumbo">
	 <div class="container header">
	 	<div class="justify-content-md-center row">
	 		<div class="col-md-3">
	 			<img src="<?php echo get_the_bio_img('faculty');?>" class="img-fluid faculty-bio-img">
	 		</div>
	 		<div class="col-md-6 faculty-header-text">
	 			<div class="faculty-tag"><?php echo get_faculty_cat();?></div>
          		<h1 class="display-3 faculty-name"><?php the_title();?></h1>
          		<div class="faculty-degree"><?php echo get_the_degree();?></div>
          		<div class="faculty-alp-title"><?php echo get_the_alp_title();?></div>
	 		</div>	 	  
        </div>
    </div>
</div>

<div class="container">
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">	

	<div class="entry-content faculty-entry-content">
		<div class="row">
			<div class="col-md-9 faculty-bio-body"><!-- post paragraph -->
				<h2 class="about-faculty">About <?php echo get_faculty_first_name();?></h2>
			<?php echo get_the_post_thumbnail( $post->ID, 'story', array( 'class' => 'img-fluid' ) ); ?>	
			<?php the_content(); ?>
			<? if (get_faculty_cat() === "Leadership"): ?>
				<a href="#faculty-qualifications" class="qualifications-mobile btn-dark btn-alp">Qualifications</a>
				<div class="faculty-posts-header">
					<h2 class="faculty-posts-lead">Related Stories</h2> 
					<span class="faculty-more-link"><a href="<?php echo get_faculty_link();?>">View more stories from <?php echo get_faculty_first_name();?><i class="arrow-right"></i></a></span>
				</div>
			<!-- if leader -->
				<?php echo get_faculty_bio_posts();?>
				<h2 class="faculty-posts-lead">Find <?php echo get_faculty_first_name();?> on the Road</h2>
				<?php echo do_shortcode('[mapit person="'.get_faculty_first_name().'"]')?>
			<? endif; ?>
			</div>
			<div class="col-md-3 faculty-sidebar" id="faculty-qualifications">
				<?php echo get_the_experience();?>
				<?php echo get_the_teaching();?>
				<?php echo get_the_certs();?>
				<?php echo get_the_skills();?>
				<?php echo get_the_awards();?>
				<?php echo get_the_qualifications();?>
			</div>

			<!--TWEET SLIDER-->
			<!--TWEET END-->
			</div>
		</div>	
	</article>
</div>
	<div class="light-blue">
		<div class="container">
				<div class="col-md-12 faculty-touch">
					<?php if (get_faculty_cat() === 'Leadership'):?>
						<h2>Want to get in touch with <?php echo get_faculty_first_name();?>?</h2>
						<a href="mailto:<?php echo acf_fetch_email_address();?>"><button class="btn btn-primary btn-dark btn-alp action-one-button">Reach Out</button></a>
						</div>
					<?php endif; ?>		
					<div class="col-md-12 faculty-social d-flex justify-content-center">
						<?php echo get_the_social();?>
					</div> 
		</div>
	</div><!-- .entry-content -->

	<footer class="faculty-footer">


	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
