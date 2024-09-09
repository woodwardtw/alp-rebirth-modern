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

	<div class="entry-content" id="svgRow">
		<!--lead statements-->
		<div class="row">
			<?php echo get_the_team_statements();?>
		</div>
		<!--end lead statements-->
	</div>
</article>
</div>
</div>
</div>
<div class="container-fluid light-blue" id="team-half">
		<!--team photo-->
		<div class="container">
		<div class="row">
			<div class="col-md-10 offset-md-1">
				<img src="<?php echo acf_fetch_team_photo();?>" class="img-fluid">
			</div>
		</div><!--end team photo-->
	</div>
</div>
<div class="container-fluid light-blue">
		<!--team photo-->
		<div class="container">
			<!--leadership photos-->
			<div class="row">
				<div class="col-md-12 team-leadership team-row">
					<h2>Our Team</h2>
				</div>
				<?php get_leadership_bios();?>
			</div>		
			<!--end leadership photos-->

		<!--featured consultants photos-->
		<div class="row">
			<div class="col-md-12 team-consultant team-row consultant-row">
				<h2>Featured Consultants</h2>
			</div>
			<?php echo get_faculty_bios('featured consultant');?>
		</div>		
		<!--end leadership photos-->		

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
