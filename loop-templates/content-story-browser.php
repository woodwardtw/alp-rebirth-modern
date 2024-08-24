<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */

?>
</div>
</div>
</div>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<div class="facet-page-wrapper">

		<header class="entry-header">

		</header><!-- .entry-header -->

		<div class="entry-content">
			<div class="container">
				<div class="row">			
					<div class="col-md-4 facet-facets">
						<div class="facet-box">
							<h3 class="filter-lead">Filter stories by</h3>
							<h3>Author</h3>
							<?php echo facetwp_display( 'facet', 'authors' );?>
							<h3>Category</h3>
							<?php echo facetwp_display( 'facet', 'parent_services');?>
							<h3>Service</h3>
							<?php echo facetwp_display( 'facet', 'services' );?>
						</div>	
					</div>
					<div class="col-md-8 facet-holder"><!--ALPHA PRIME PARTNER LOOP-->
						    <div class="facet-topper"><span class="facet-all">All Stories</span><?php echo facetwp_display( 'counts' ); ?></div>
							<?php echo facetwp_display( 'template', 'facet_loop' );?>
							<?php echo do_shortcode('[facetwp pager="true"]') ;?>
							<button class="btn btn-alp btn-dark" value="Reset" onclick="FWP.reset()" class="facet-reset" />Reset Filters</button>
					</div>
				</div>
			</div>	
		</div>
		
		<div class="district-learn-more">
			<div class="container">	
				<div class="row align-items-center">
					<div class="col-md-8 district-contact">
						<h2>Want to learn more?</h2>
						<p>Reach out to us to begin a conversation about how we might build a story around our work together.</p>
						<button class="btn btn-alp btn-dark" type="">Contact Us</button>
					</div>
				</div>
			</div>

			<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
				'after'  => '</div>',
			) );
			?>

		</div><!-- .entry-content -->
	</div>


	<footer class="entry-footer">

		<?php edit_post_link( __( 'Edit', 'understrap' ), '<span class="edit-link">', '</span>' ); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
