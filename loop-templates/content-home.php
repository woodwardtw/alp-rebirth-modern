<?php
/**
 * Partial template for content home
 *
 * @package understrap
 */

?>
</div>
</div>
</div>
<div class="jumbotron jumbotron-home">
	 <video autoplay muted loop id="homeVideo">
	 	<source src="<?php echo get_template_directory_uri();?>/imgs/ALP_BackgroundVideo_v1_4.webm" type="video/webm">
  		<source src="<?php echo get_template_directory_uri();?>/imgs/ALP_BackgroundVideo_v1_3.mp4" type="video/mp4">
	</video>
	 <div class="container home header">
	 	<div class="justify-content-md-center row">
          <h1 class="display-3 home-header-title col-md-10"><?php the_title();?></h1>
          <div class="col-md-10 home-header-details"><?php echo get_the_home_details();?></div>
          <a class="btn btn-alp btn-light" href="our-partners">View Our Case Studies</a>
        </div>
    </div>
</div>
<div class="container">
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">	

	<div class="entry-content">

		<?php the_content(); ?>

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
