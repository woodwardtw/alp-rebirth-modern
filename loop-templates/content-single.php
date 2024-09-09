<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */

?>
</div>
</div>
</div>
<div class="jumbotron jumbotron-story">
	 <div class="container story header">
	 	<div class="justify-content-md-center row">	 		
	 		<div class="col-md-9 the-story-header-text">
	 			<div class="the-story-tag">Our Stories</div>
          		<h1 class="display-3 the-story-title"><?php the_title();?></h1>
          		<div class="author-block">
          			<img class="author-img" src="<?php echo get_avatar_url(get_the_author_meta('ID'));?>">
          			<div class="the-story-author"><?php echo get_the_author_meta('display_name');?></div>
          		</div>
	 		</div>	 	  
        </div>
    </div>
</div>

<div class="container the-story">
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">	
	<?php echo get_the_story_lead();?>

	<?php echo get_the_post_thumbnail( $post->ID, 'story', array( 'class' => 'img-fluid' ) ); ?>
	<div class="the-story-caption"><?php echo get_the_post_thumbnail_caption();?></div>

	<div class="entry-content row align-items-center">
		<div class="row">
			<div class="col-md-8 offset-md-2">
				<?php the_content(); ?>
			</div>
			<div class="col-md-4 offset-md-2 story-meta">
				<h3>Story tags</h3>				
				<?php single_story_tags($post->ID);?>
				<?php single_story_real_tags($post->ID);?>
			</div>
			<div class="col-md-4 story-meta">
				<h3>Get in touch</h3>
				<?php echo story_social_links(get_the_author_meta('display_name'));?>
			</div>
			<div class="col-md-8 offset-md-2 story-meta soc-share-box">
				<h3>Share this story</h3>
				<?php echo story_social_sharing_buttons($post)?>
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

		<?php understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
