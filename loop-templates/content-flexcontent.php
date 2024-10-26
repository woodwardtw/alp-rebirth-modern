</div>
</div>
</div>

                   


<?php if( have_rows('content') ): ?>
    <div class="container">
         <div class="topic-row row">
                <div class="col-md-6">
                    <?php the_field('topic_summary'); ?>
                </div>
                <div class="col-md-5 offset-md-1">
                    <?php alp_topic_menu(); ?>
                </div>
            </div>
    <?php while( have_rows('content') ): the_row(); ?>
    <?php $index = get_row_index(); ?>
    <!--SUB TOPIC-->
        <?php if( get_row_layout() == 'sub_topic' ): 
            $title = get_sub_field('sub_topic_title');
            $slug = sanitize_title($title);
            $resources = get_sub_field('resources');
            $size = alp_topic_row_size($resources);
        ?>
            <div class='row topic-row'>
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
        <?php elseif( get_row_layout() == 'image' ): 
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
        <div class='row topic-row d-flex align-items-center'>
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
         <?php if( get_row_layout() == 'full_block' ): 
            $title = get_sub_field('title');
            $content = get_sub_field('content');
            $slug = sanitize_title($title);
        ?>
            <div class='row topic-row full-width-row'>
				<div class='col-md-12'>
                    <?php if($title):?>
                        <h2 class="lead trio-header" id="<?php echo $slug?>"><?php echo $title;?></h2>
                    <?php endif;?>
                    <?php echo $content;?>
                </div>
            </div>
        <?php endif;?>
         <!--person loop-->
         <?php if( get_row_layout() == 'people' ): 
            $persons = get_sub_field('individuals');
            $title = get_sub_field('title');
            $slug = sanitize_title($title);
        ?>
            <div class='row topic-row d-flex justify-content-around people-row'>
            <?php if($title):?>
                <div class="col-md-12">
                    <h2 class="lead trio-header" id="<?php echo $slug?>"><?php echo $title;?></h2>
                </div>
            <?php endif;?>
           
				<?php                   
                    foreach($persons as $person){
                        $post_id = $person;
                        $name = get_the_title($post_id);
                        $job_title = get_the_alp_title($post_id);
                        $img_src = get_the_bio_img('faculty', $post_id);
                        $img = "<img src='{$img_src}' class='img-fluid team-bio-single'>";
                        $email_html = '';
                        if(get_field('email', $post_id)){
                            $email = get_field('email', $post_id);
                            $email_html = "<a href='mailto:{$email}' aria-lable='Email to {$name}'>✉️ Connect</a>";
                        }
                        $link = get_permalink( $post_id);
                        echo "
                        <div class='col-md-4 person-holder team-square leadership'>
                            <div class='card'>
                                <div class='card-body leadership'>
                                    <a href='{$link}' class='stretched-link'>
                                        {$img}
                                        <h2 class='small-name'>{$name}</h2>
                                        <div class='title'>{$job_title}</div>
                                        <div class='small-contact'>
                                            {$email_html}
                                        </div>
                                    </a>
                                </div>                           
                            </div>
                        </div>
                        ";
                    }
                ?>
            </div>
    
        <?php endif;?>
          <!--accordion loop-->
         <?php if( get_row_layout() == 'accordion' ): 
            $accordion_parts = get_sub_field('accordion_parts');
            $accord_title = get_sub_field('accordion_title');
            echo "<div class='row topic-row full-width-row d-flex justify-content-around'>";
            if($accord_title){
                $title_slug = sanitize_title($accord_title);
                echo "<h2 class='lead trio-header' id='{$title_slug}'>{$accord_title}</h2>";
            }
            echo "<div class='accordion accordion-flush' id='accordion-{$index}'>";
            foreach($accordion_parts as $piece){
                $title = $piece['title'];
                $slug = sanitize_title($title);
                $content = $piece['content'];
                echo "
                    <div class='accordion-item' id='{$slug}-item'>
                        <h2 class='accordion-header' id='{$slug}'>
                        <button class='accordion-button collapsed' id='{$slug}-button' type='button' data-bs-toggle='collapse' data-bs-target='#{$slug}-content' aria-expanded='false' aria-controls='{$slug}-content'>
                            {$title}
                        </button>
                        </h2>
                        <div id='{$slug}-content' class='accordion-collapse collapse hide' aria-labelledby='{$slug}'>
                        <div class='accordion-body'>
                         {$content}
                        </div>
                        </div>
                    </div>
                ";

            }
            echo "</div></div>";
        ?>
        <?php endif?>
        <!--CUSTOM POSTS BY CATEGORY AND/OR TAG-->
        <?php if( get_row_layout() == 'posts' ):
                $title = 'Learn more';
                if(get_sub_field('title')){
                     $title = get_sub_field('title');
                }
        $slug = sanitize_title( $title);
            echo "<div class='row topic-row full-width-row'>
                    <div class='col-md-10'>
                        <h2 class='lead trio-header' id='{$slug}'>{$title}</h2>
                    </div>
                        ";
            $col = 10; 
            $offset = '';                       
            if(get_sub_field('narrative')){
                $narrative = get_sub_field('narrative');
                $col = 5;
                $offset = 'offset-md-1';
                echo "
                    <div class='col-md-6'>
                        {$narrative}
                    </div>
                ";
            }
            
            $cats = get_sub_field('category');
            $tags = get_sub_field('tags');
            $type = get_sub_field('post_type');
            $limit = get_sub_field('max_responses');

            $args = array(
                'category__and' => $cats,//has all the categories
                'post_type' => $type,
                'posts_per_page' => $limit,
                'tag__and' => $tags,//has all the tags
                'paged' => get_query_var('paged')
            );
            $the_query = new WP_Query( $args );

            // The Loop
            if ( $the_query->have_posts($attribution = NULL) ) :
                echo "<div class='col-md-{$col} {$offset}'>";
                while ( $the_query->have_posts() ) : $the_query->the_post();
                // Do Stuff
                $post_id = get_the_ID();
                $title = get_the_title();
                $url = get_the_permalink();
                if(get_field('resource_url', $post_id)){
                    $url = get_field('resource_url', $post_id);
                }
                 if(get_field('creator', $post_id)){
                    $attribution = "<div class='attribution'>Created by: ".get_field('creator', $post_id)."</div>";
                }

                if(get_the_content()){
                     $excerpt = wp_trim_words(get_the_content(), 30);
                }                
               
                echo "
                    <div class='posts-loop'>
                        <div class='post-block'>
                            <a class='post-link' href='{$url}'>
                                <h3 class='accordion-title'>{$title}</h3>                           
                                {$attribution}
                                <p>{$excerpt}</p>                                
                             </a>
                        </div>
                    </div>
                ";
                endwhile;
            endif;            
            // Reset Post Data
            wp_reset_postdata();
            echo "</div></div>";
        ?>        
        <?php endif;?>
        <!--challenge loop-->
         <?php if( get_row_layout() == 'two_column' ): 
            $title = get_sub_field('title');
            $left = get_sub_field('left_column');
            $right = get_sub_field('right_column');
            $slug = sanitize_title($title);
        ?>        
            <div class='row topic-row full-width-row'>
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
    <?php endwhile; ?>
<?php endif; ?>