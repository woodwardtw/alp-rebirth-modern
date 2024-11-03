<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<!--corner for mobile-->
<div class="bottom-corner">
	<button type="button" id="btn-contact" class="btn" data-bs-toggle="modal" data-bs-target="#contactModal">Work with us<i class="arrow-right"></i></button>
</div>	

<!-- Contact Modal -->
<div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="contactModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    	<button type="button" class="close" data-dismiss="modal" id="closer" aria-label="Close">
          <span aria-hidden="true" data-bs-dismiss="modal">Close <span class="close-x">X</span></span>
        </button>
      <div class="modal-header">
        <h2 class="modal-title" id="contactModalLabel">Work with us</h2>        
      </div>
      <div class="modal-message">
      	<p>Tell us a little about yourself and how we might work together.</p>
      	<div class="modal-required">
      		*All fields are required.
      	</div>
      </div>
      <div class="modal-body">
       <?php echo do_shortcode('[gravityform id="2" title="false" description="false" ajax="true"]');?>
			<div class="modal-bottom">
				<h3>Other ways we can connect</h3>
				<p>&nbsp;</p>
				<div class="modal-social">
					<a href="https://twitter.com/alplearn"><div class="modal-twitter"></div>Follow on twitter</a> 
				<!-- 					<a href="https://www.linkedin.com/company/advanced-learning-partnerships-inc/"><div class="modal-linkedin"></div>connect on linkedin</a>
				 -->				
				</div>	
      		</div>
      </div>
    </div>
  </div>
</div>

<div class="row backup-row medium-blue footer-<?php echo $post->post_name;?> footer-<?php echo $post->post_type;?>">	
	<div class="back-to-top col-md-10">		
			<hr>
 		<a href="#content" class="btn btn-alp btn-dark btn-footer"><i class="fa fa-arrow-up"></i>Back to Top</a>
 	</div>
</div>

<div class="wrapper" id="wrapper-footer">

	<footer class="container">

		<div class="row" id="footer">

							<div class="footer-widget col-md-4 col-sm-12">
								<div class="footer-brand">
									<img src="<?php echo get_template_directory_uri();?>/imgs/alp_footer_logo.svg"><br>
									© <?php echo date("Y");?> Advanced Learning Partnerships LLC
								</div>
								<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer Far Left") ) : ?><?php endif;?>
							</div>
							<div class="footer-widget address col-md-4 col-sm-12 ">
								<div class="footer-address">
									Advanced Learning Partnerships<br>
									PO Box 17254, Chapel Hill, NC 27516
								</div>
								<div class="footer-numbers">
									<span class="footer-phone">T: (919) 308-2636</span><br> 
									<!--<span class="footer-fax">F: (919) 747-4200</span>--> 
									<a href="mailto:info@alplearn.com">info@alplearn.com</a><br>
									<button class="footer-contact" type="button" data-bs-toggle="modal" data-bs-target="#contactModal">Contact Us</button>
								</div>
								<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer Mid Left") ) : ?><?php endif;?>
							</div>
							<div class="footer-widget col-md-2 col-6 footer-menu">
								<?php wp_nav_menu( array( 'theme_location' => 'footer-mid-right-menu' ) ); ?>		
								<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer Mid Right") ) : ?><?php endif;?>
							</div>
							<div class="footer-widget col-md-2 col-6 follow">
								<h2>Learn With Us</h2>
								<?php wp_nav_menu( array( 'theme_location' => 'footer-far-right-menu' ) ); ?>											
								<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Footer Far Right") ) : ?><?php endif;?>							
							</div>	
											


		</div><!-- row end -->

	</div><!-- container end -->

</footer><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>

