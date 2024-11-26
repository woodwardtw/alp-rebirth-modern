</div>
</div>
</div>

                   


<?php if( have_rows('cs_content') ): ?>
    <div class="container">

    <?php while( have_rows('cs_content') ): the_row(); ?>
    <?php $index = get_row_index(); ?>
    <!--SUB TOPIC-->
        <?php if( get_row_layout() == 'sub_topic' ): 
            $title = get_sub_field('sub_topic_title');
            $slug = sanitize_title($title);
            $resources = get_sub_field('resources');
            $size = alp_topic_row_size($resources);
        ?>
            <div class='row'>
				<div class='col-md-<?php echo $size;?>'>
					<div class='sub-topic'>
                        <?php if (get_sub_field('sub_topic_title')): ?>
						<h2 class="lead trio-header" id='<?php echo $slug;?>'><?php echo $title; ?></h2>
                        <?php endif;?>
						<?php the_sub_field('sub_topic_content'); ?>
					</div>
				</div>
            <?php if($resources != '') :?>
				<div class='col-md-5 offset-md-1'>
                    <?php if($resources):                    
                        echo "<div class='menu-block'>
                        <ul class='resource-links'>";
                        foreach($resources as $resource){
                            $title = $resource['resource_title'];
                            $link = $resource['resource_link'];
                            $description = $resource['resource_description'];
                            $type = $resource['resource_type'];
                            if(str_contains(strtolower($description), 'coming soon')){
                                $link = "#{$slug}";       
                            }
                            if(array_key_exists('host', parse_url($link))){
                                $url_source = alp_remove_www(parse_url($link)["host"]);
                            } else {
                                $url_source = $link;
                            }
                           
                            echo "
                                    <li>                                        
                                        <a href='{$link}'>
                                           <div class='inline'>
                                                <div class='resource-icon {$type}' arial-lable='Icon for {$type}.'></div>
                                           </div>
                                           <div class='inline'>
                                                {$title}
                                                <div class='resource-source'>source: {$url_source}</div>
                                                <div class='resource-description'>{$description} &nbsp;</div>
                                            </div>                                    
                                        </a>
                                    </li>
                                ";
                        }
                        echo "</ul></div>";
                    ?>
                    <?php endif;?>

                    <?php endif;?>
				</div>
			
        <!--IMAGE LOOP-->            
        <?php elseif( get_row_layout() == 'cs_image' ): 
            $title = get_sub_field('title');
            $slug = sanitize_title($title);
            $content = get_sub_field('content');
            $image = get_sub_field('image');
            $direction = get_sub_field('image_align');
            $order_left = ' order-first ';
            $order_right = ' order-last ';
            if($direction == 'right'){
                $order_left = ' order-last ';
                $order_right = ' order-first ';
            }
            ?>
        <div class='row d-flex align-items-center'>
				<div class='col-md-5 <?php echo $order_left;?>'>    
                    <figure>
                        <?php echo wp_get_attachment_image( $image['ID'], 'large', array('class'=>'img-fluid') ); ?>
                        <figcaption><?php echo $image['caption']; ?></figcaption>
                    </figure>
                </div>
            <div class='col-md-2 order-2'></div>
            <div class='col-md-5 <?php echo $order_right;?>'>
                <?php if($title) :?>
                    <h2 class="lead trio-header" id="<?php echo $slug;?>"><?php echo $title; ?></h2>
                <?php endif;?>
                <?php echo $content; ?>
			</div>
        </div>
        <?php endif; ?>
        <!--full block loop-->
         <?php if( get_row_layout() == 'cs_full_block' ): 
            $title = get_sub_field('title');
            $content = get_sub_field('text');
            $slug = sanitize_title($title);
        ?>
      
      <div class='row full-width-row'>
                <?php if($title):?>
                    <div class='col-md-12'>
                        <h2 class='lead trio-header' id="<?php echo $slug;?>"><?php echo $title;?></h2>
                    </div>
                <?php endif;?>
				  <div class='col-md-12'>
                  <?php echo $content;?>  
                    </div>
            </div>
        <?php endif;?>
         
         
        
        <!--even two cols loop-->
         <?php if( get_row_layout() == 'even_two_column' ): 
            $title = get_sub_field('title');
            $left = get_sub_field('left_column');
            $right = get_sub_field('right_column');
            $slug = sanitize_title($title);
        ?>        
            <div class='row full-width-row'>
                <?php if($title):?>
                    <div class='col-md-12'>
                        <h2 class='lead trio-header' id="<?php echo $slug;?>"><?php echo $title;?></h2>
                    </div>
                <?php endif;?>
				<div class='col-md-6'>
                    <?php echo $left;?>                    
                </div>
                <div class='col-md-6'>
                    <?php echo $right;?>                    
                </div>
            </div>
        <?php endif;?>

        <!--uneven two cols loop-->
        <?php if( get_row_layout() == '60-40_two_column' ): 
            $title = get_sub_field('title');
            $left = get_sub_field('left_column');
            $right = get_sub_field('right_column');
            $slug = sanitize_title($title);
            $background_color = get_sub_field('background_color')
        ?>        
            <div class='row full-width-row'>
                <?php if($title):?>
                    <div class='col-md-12'>
                        <h2 class='lead trio-header' id="<?php echo $slug;?>"><?php echo $title;?></h2>
                    </div>
                <?php endif;?>
				<div class='col-md-7' style='background: <?php echo $background_color;?>'>
                    <?php echo $left;?>                    
                </div>
                <div class='col-md-5'>
                    <?php echo $right;?>                    
                </div>
            </div>
        <?php endif;?>
    <?php endwhile; ?>
<?php endif; ?>