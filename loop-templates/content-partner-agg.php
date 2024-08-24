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

	<header class="entry-header">

	</header><!-- .entry-header -->

	<div class="entry-content districts">
		<div class="col-md-10 offset-md-1"><!--ALPHA PRIME PARTNER LOOP-->
			<div class="row prime-partner">
				<?php echo get_the_prime_partner();?>
			</div>
			<div class="row secondary-partner row-eq-height">
					<? echo get_the_secondary_partners();?>
			</div>
		</div>
	</div>
	<div class="district-data">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-7 districts-map">
					<h2>Districts we partner with:</h2>
					<?php echo do_shortcode('[mapit person="any"]');?>
				</div>
				<div class="col-md-5 districts-stats">
					<?php echo  get_the_partner_stats();?>
				</div>
			</div>
		</div>
	</div>
	<div class="district-learn-more">
		<div class="container">	
			<div class="row align-items-center">
				<div class="col-md-8 district-contact">
					<h2><?php echo acf_fetch_partner_agg_button_area_title();?></h2>
					<p><?php echo acf_fetch_partner_agg_button_area_statement();?></p>
					<button class="btn btn-alp btn-dark" type="button" data-toggle="modal" data-target="#contactModal">Contact Us</button>
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
