<?php
/**
 * Partial template for content service
 *
 * @package understrap
 */

?>
</div>
</div>
</div>
<div class="jumbotron jumbotron-service <?php echo $post->post_name; ;?>">
	 <div class="container partner header">
	 	<div class="justify-content-md-center row">
	 	  <div class="partner-tag col-md-12">Our Services</div>
          <h1 class="display-3 partner-title col-md-8"><?php the_title();?></h1>
          <div class="service-tag-line"><?php the_content();?></div>
          <div class="more-below bounce"><i class="fa fa-arrow-down"></i></div>
        </div>
    </div>   
</div>

<div class="container-fluid">
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">	
	<div class="entry-content"> 
<!--         sub services            -->
		<div class="row service-row d-flex justify-content-between">			
			<?php echo get_sub_services(get_the_title());?>
		</div>	
	</div>
</article>
</div>
<!--quotes-->
				<div class="quotes"> 	
					<div class="container-fluid">				
	 					<div class="row quotes justify-content-md-center">
							<div class="col-md-12 quote-box">
								<div id="carouselQuoteControls" class="carousel slide" data-ride="false">
									  <div class="carousel-inner">
									  <div class="quote-slogan">Words from our partners</div>	

									    <!--ITEMS START-->
										<? echo quote_maker();?>																
										<!--ITEMS END-->
									  </div>
									  <a class="carousel-control-prev" href="#carouselQuoteControls" role="button" data-slide="prev">								   
									    <span class="quote-nav left"><i class="fa fa-arrow-left"></i></span>
									  </a>
									  <a class="carousel-control-next" href="#carouselQuoteControls" role="button" data-slide="next">
									    <span class="quote-nav right"><i class="fa fa-arrow-right"></i></span>
									  </a>
								</div>
							</div>	
	 					</div>
	 				</div>
 				</div>
 <!--end quotes-->
 <div class="container">
		<div class="row">
		 <div class="service-video col-md-12" style="text-align: center; margin: 30px 0">
				<?php echo get_service_video();?>
		</div>
	</div>
</div>

<!--          sub service details            -->
<div class="">
	<div class="container">
		<div class="row">
			<div class="col-md-12">				
				<?php echo get_the_sub_service_detail();?>
			</div>
		
		</div>
<!--          related stories           -->
		<div class="row">
			<div class="col-md-12">
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
