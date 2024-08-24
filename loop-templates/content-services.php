<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">


	</header><!-- .entry-header -->

	<div class="entry-content services-agg">
		<div class="row">
			<div class="col-md-6 services-main">
				<h2>About the IDEA System</h2>
					<?php the_content(); ?>
			</div>
			<div class="col-md-6">
				<img class="idea-circle" src="<?php echo get_template_directory_uri();?>/imgs/idea-circle.svg" class="img-fluid">
			</div>
			<div class="col-md-12" style="margin: 30px 0;">
				<?php echo get_service_video();?>
			</div>
		</div>
<!--TOP SERVICES-->
	</div>
</article>
</div>
</div>
</div>

<div class="light-blue">
	<div class="container">
		<?php echo get_the_top_services();?>
<!--END TOP SERVICES-->
<!--ALL SUB SERVICES-->
	<div class="row all-services-row" id="all-services-holder">
		<div class="col-md-12 all-services-agg"><h2>All Services</h2></div>
		<?php echo get_all_the_sub_services();?>
	</div>
<!--END SUB SERVICES-->
</div>
		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
			'after'  => '</div>',
		) );
		?>

	</div><!-- .entry-content -->
	
	<footer class="entry-footer">

		<?php edit_post_link( __( 'Edit', 'understrap' ), '<span class="edit-link">', '</span>' ); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
