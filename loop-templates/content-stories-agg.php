<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<div class="entry-content stories-agg">
		<a href="../podcasts" class="btn btn-alp btn-dark">Our Podcasts</a>
		<div class="col-md-12">

			<div class="row stories-three row-eq-height">
				<div class="col-md-12"><h2>Featured Stories</h2></div>				
				<? echo featured_story('featured');?>
			</div>

			<div class="row stories-one row-eq-height">
				<div class="col-md-12"><h2>Most Recent Stories</h2></div>
				<? echo most_recent();?>
			</div>

			<div class="row stories-two row-eq-height">
				<div class="col-md-12"><h2>Most Popular Stories</h2></div>				
				<? echo most_popular();?>
			</div>
			<div clas="row">
				<a class="btn btn-alp btn-dark" href="story-browser">View All Stories</a>
			</div>
		</div>
	</div>
</article>
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

	<footer class="entry-footer">

		<?php edit_post_link( __( 'Edit', 'understrap' ), '<span class="edit-link">', '</span>' ); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
