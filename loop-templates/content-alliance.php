<?php
/**
 * Partial template for content in page.php
 *
 * @package understrap
 */

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<div class="entry-content">

		<?php the_content(); ?>
		 <input class="form-control" id="myInput" type="text" placeholder="Search..">
		 <div id="alliance-events">
			<?php echo alp_alliance_blocks();?>
		</div>
		<div class="alliance-closer">
			<?php the_field('closing_text');?>
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
