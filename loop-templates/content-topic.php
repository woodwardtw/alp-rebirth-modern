<?php
/**
 * Partial template for content topics
 *
 * @package understrap
 */

?>
</div>
</div>
</div>
<div class="jumbotron jumbotron-home"
	<?php if ( has_post_thumbnail() ) :
		$bg = esc_url( get_the_post_thumbnail_url( null, 'full' ) );
		echo " style=\"background-image: url('{$bg}'); background-size: cover; background-position: center;\"";
	endif; ?>
>
	<?php if ( ! has_post_thumbnail() ) : ?>
		<video autoplay muted loop id="homeVideo">
			<source src="<?php echo esc_url( get_template_directory_uri() ); ?>/imgs/ALP_BackgroundVideo_v1_4.webm" type="video/webm">
			<source src="<?php echo esc_url( get_template_directory_uri() ); ?>/imgs/ALP_BackgroundVideo_v1_3.mp4" type="video/mp4">
		</video>
	
	<?php endif; ?>
	<div class="container home header">
	 	<div class="justify-content-md-center row">
          <h1 class="display-3 home-header-title col-md-10"><?php the_title();?></h1>
          <div class="col-md-10 home-header-details"><?php the_field('introduction');?></div>
        </div>
    </div>
</div>
<div class="container">
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">	

	<div class="entry-content">
		<?php the_content(); ?>
		<?
				$html = '';
				if( have_rows('topic_blocks') ):
				    // Loop through rows.
				    while( have_rows('topic_blocks') ) : the_row();
			
				        // Load sub field value.
				        $title = get_sub_field('title');
				        $desc = get_sub_field('short_description');
				        $image = get_sub_field('image');
				        $image_url = $image['sizes']['medium'];
				        //var_dump($image);
				        // Do something...
				        $html .= "<div class='col-md-4'>
				        			<div class='ai-block'>
				        			<h2>{$title}</h2>
				        			<img src='{$image_url}' class='img-fluid'>
				        			{$desc}
				        			</div>
				        		</div>
				        ";
				    // End loop.
				    endwhile;
				    echo "<div class='row triad-row'>" . $html . "</div>";
					// No value.
					else :
					    // Do something...
					endif;			
			
			
		?>
		<?php  
		  	$html = '';
		  	if( have_rows('topic_rows') ):
		  
		  	    // Loop through rows.
		  	    while( have_rows('topic_rows') ) : the_row();
		  
		  	        // Load sub field value.
		  	        $title = get_sub_field('topic_row_title');
		  	        $accent = get_sub_field('accent_color');
		  	        $desc = get_sub_field('topic_row_description');
		  	        $items = get_sub_field('topic_row_item');
		  	        //var_dump($items);
		  	         $item_html = '';
		  	         if(is_array($items)){
			  	         	 foreach ($items as $key => $item) {
			  	        	// code...
			  	        	$item_title = $item['title'];
			  	        	$item_desc = $item['descriptor'];
			  	        	$item_link = $item['link'];
			  	        	$item_button = $item['button_text'];
			  	        	$item_html .= "
			  	        		<div class='col-md-6'>
			  	        			<div class='ai-text-block' style='border-left: 10px solid {$accent}'>
			  	        				<h3>{$item_title}</h3>
			  	        				{$item_desc}
			  	        				<a href='{$item_link}' target='_blank' class='btn btn-alp btn-learn btn-number-1'>{$item_button}</a>
			  	        			</div>
			  	        		</div>
			  	        	";
			  	        }

		  	         }
		  	       
		  	        // Do something...
		  	        $html .= "
		  	        <div class='row sub-item-row'>
		  	        		<div class='col-md-12'>
		  	        			<h2>{$title}</h2>
		  	        			{$desc}		  	        			
		  	        		</div>
		  	        		{$item_html}
		  	        </div>

		  	        ";
		  	    // End loop.
		  	    endwhile;
		  	    echo "{$html}";
		  		// No value.
		  		else :
		  		    // Do something...
		  		endif;
		 

		?>
		
		

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
