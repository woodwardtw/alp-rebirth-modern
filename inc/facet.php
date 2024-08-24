<?php while ( have_posts() ): the_post(); ?>
<div class="row facet-story">
	<div class="col-md-4 facet-story-img">
		<?php the_post_thumbnail('medium');?>
	</div>
	<div class="col-md-8 facet-story-info">
		<a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
		<div class="facet-author">by <?php the_author();?></div>
		<div class="facet-excerpt"><?php echo strip_tags(get_the_story_lead());?> </div>
	</div>
</div>
<?php endwhile; ?>