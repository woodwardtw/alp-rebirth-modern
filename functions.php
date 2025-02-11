<?php
/**
 * UnderStrap functions and definitions
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// UnderStrap's includes directory.
$understrap_inc_dir = 'inc';

// Array of files to include.
$understrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker. Trying to get deeper navigation? Check out: https://github.com/understrap/understrap/issues/567.
	'/editor.php',                          // Load Editor functions.
	'/block-editor.php',                    // Load Block Editor functions.
	'/deprecated.php',                      // Load deprecated functions.
  '/acf-data.php',
  '/extras.php',
  '/custom-post-types.php'
);

// Load WooCommerce functions if WooCommerce is activated.
if ( class_exists( 'WooCommerce' ) ) {
	$understrap_includes[] = '/woocommerce.php';
}

// Load Jetpack compatibility file if Jetpack is activiated.
if ( class_exists( 'Jetpack' ) ) {
	$understrap_includes[] = '/jetpack.php';
}

// Include files.
foreach ( $understrap_includes as $file ) {
	require_once get_theme_file_path( $understrap_inc_dir . $file );
}


//ADD FONTS 
add_action('wp_enqueue_scripts', 'alp_scripts');
function alp_scripts() {
  $query_args = array(
    'family' => 'Roboto:300,400,700|Old+Standard+TT:400,700|Oswald:400,500,700',
    'subset' => 'latin,latin-ext',
  );
  //wp_enqueue_style ( 'google_fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ), array(), null );
  wp_enqueue_style ( 'cloud_fonts', add_query_arg( $query_args, "https://cloud.typography.com/7739656/6620392/css/fonts.css" ), array(), null );

  wp_enqueue_script( 'alp_js', get_template_directory_uri() . '/js/alp.js', array(), '1.1.1', true );
  }


//add footer widget areas
if ( function_exists('register_sidebar') )
  register_sidebar(array(
    'name' => 'Footer - far left',
    'id'            => 'footer-far-left',    // ID should be LOWERCASE  ! ! !        
    'before_widget' => '<div class = "widgetizedArea">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  )
);

if ( function_exists('register_sidebar') )
  register_sidebar(array(
    'name' => 'Footer - medium left',
    'id'            => 'footer-med-left',    // ID should be LOWERCASE  ! ! !            
    'before_widget' => '<div class = "widgetizedArea">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  )
);


if ( function_exists('register_sidebar') )
  register_sidebar(array(
    'name' => 'Footer - medium right',
    'id'            => 'footer-med-right',    // ID should be LOWERCASE  ! ! !            
    'before_widget' => '<div class = "widgetizedArea">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  )
);

if ( function_exists('register_sidebar') )
  register_sidebar(array(
    'name' => 'Footer - far right',
    'id'            => 'footer-far-right',    // ID should be LOWERCASE  ! ! !            
    'before_widget' => '<div class = "widgetizedArea">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  )
);

//set a path for IMGS

  if( !defined('THEME_IMG_PATH')){
   define( 'THEME_IMG_PATH', get_stylesheet_directory_uri() . '/imgs/' );
  }


function bannerMaker(){
  global $post;
   if ( get_the_post_thumbnail_url( $post->ID ) ) {
      //$thumbnail_id = get_post_thumbnail_id( $post->ID );
      $thumb_url = get_the_post_thumbnail_url($post->ID);
      //$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);

        return '<div class="jumbotron custom-header-img" style="background-image:url('. $thumb_url .')"><h1 class="home-entry-title display-4">'. get_the_title() .'</h1>'. get_the_details() .'<div class="btn btn-home btn-alp">View Our Case Studies</div></div>';

    } 
}

function get_the_details(){
  global $post;
   $details = get_field( "page_details", $post->ID );
   if ($details){
    return '<p class="lead team-lead col-md-6">'.$details.'</p>';
   }
}


//HOME PAGE ACF FUNCTIONS

function get_the_home_details(){
  global $post;
   $details = get_field( "page_details", $post->ID );
   if ($details){
    return $details;
   }
}

function get_the_trio_header(){
  global $post;
   $trio_header = get_field( "trio_header", $post->ID );
   if ($trio_header){
    return '<h2 class="lead trio-header">'.$trio_header.'</h2>';
   }
}

function trio_svg($number){
  $svgs = ['Home_Experience_animated','Home_Commitment_animated','Home_Success_animated'];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, get_template_directory_uri() . '/imgs/'.$svgs[$number-1].'.svg');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $output = curl_exec($ch);
    curl_close($ch);
    echo $output;

}


function get_the_first_home_header() {
  global $post;
   $home_first_header = get_field( "home_first_header", $post->ID );
   if ($home_first_header){
    return '<h2 class="lead first-home-header">'.$home_first_header.'</h2>';
   }
}

function get_the_first_home_details() {
  global $post;
   $home_first_details = get_field( "home_first_details", $post->ID );
   if ($home_first_details){
    return '<div class="first-home-details">'.$home_first_details.'</div>';
   }
}

function get_the_second_home_header() {
  global $post;
   $home_second_header = get_field( "home_second_header", $post->ID );
   if ($home_second_header){
    return '<h2 class="lead second-home-header first-home-header d-flex justify-content-center">'.$home_second_header.'</h2>';
   }
}

function get_the_second_home_details() {
  global $post;
   $home_second_details = get_field( "home_second_details", $post->ID );
   if ($home_second_details){
    return '<div class="second-home-details d-flex justify-content-center">'.$home_second_details.'</div>';
   }
}

function get_the_home_drivers(){
    global $post;
    $html = "";
    if( have_rows('our_drivers') ):
    while ( have_rows('our_drivers') ) : the_row();

      $html .= '<div class="col-md-3 driver">';
        // Your loop code
      $html .= '<img class="driver-images" src="' . get_sub_field('driver_image') . '">';
      $html .= '<h3 class="driver-title">' . get_sub_field('driver_title') . '</h3>';
      $html .= '<p>' . get_sub_field('driver_details') . '</p>';
      $html .= '</div>';

    endwhile;

    else :

        // no rows found

endif;
    return $html;

}



function acf_fetch_main_home_image(){
  global $post;
  $html = '';
  $image = get_sub_field('first_callout_image');

    if( $image) {      
      $html = '<img src="' .  $image['sizes'][ 'partner-thumb' ] . '" alt="' . $image['alt'] . '" class="img-fluid">' ; 
     return $html;    
    }

}




function get_the_quote() {
  global $post;
   $the_quote = get_field( "the_quote", $post->ID );
   if ($the_quote){
    return $the_quote;
   }
}

//FIX TITLE ON QUOTES 
function quoteTitles ($post_id){
  $type = get_post_type($post_id);
  if ($type === 'quote'){
    remove_action( 'save_post', 'quoteTitles' );
    $quote = substr(get_field( "the_quote", $post_id ),0, 40) . ' . . .';
    $my_post = array(
        'ID'           => $post_id,
        'post_title'   => $quote,      
    );

  // Update the post into the database
    wp_update_post( $my_post );
  }
    add_action( 'save_post', 'quoteTitles' );
}

add_action( 'save_post', 'quoteTitles', 10, 3 ); //don't forget the last argument to allow all three arguments of the function


function get_the_quote_speaker() {
  global $post;
   $quote_speaker = get_field( "the_speaker", $post->ID );
   if ($quote_speaker){
    return '<div class="quote-speaker">'.$quote_speaker.'</div>';
   }
}


function get_the_quote_school() {
  global $post;
   $quote_school = get_field( "the_school", $post->ID );
   if ($quote_school){
    return '<div class="quote-school">'.$quote_school.'</div>';
   }
}

//get the quotes for the front page
function quote_maker($cat = ''){

  $html = "";
  $inc = 1;
  $args = array(
      'posts_per_page' => 15,
      'post_type'   => 'quote', 
      'post_status' => 'publish', 
      'order_by' => 'date',  
      'nopaging' => false, 
      'category_name' => $cat                                     
                    );
    $the_query = new WP_Query( $args );
                    if( $the_query->have_posts() ): 
                      while ( $the_query->have_posts() ) : $the_query->the_post(); 
                       if ($inc === 1) {
                        $active = "active";
                       } else {
                        $active = "";
                       }
                      $html .= '<div class="carousel-item ' . $active . ' quote-slide"><div class="quote-text"><h3>' . get_the_quote() . '</h3>'.get_the_quote_speaker(). get_the_quote_school().'</div></div>';
                      $inc++;
                       endwhile;
                  endif;
            wp_reset_query();  // Restore global post data stomped by the_post().
   return $html;
}

//get the stories for the front page
function story_maker(){
  $html = "";
  $inc = 1;
  $args = array(
      'posts_per_page' => 3,
      'post_type'   => 'post', 
      'post_status' => 'publish', 
      'order_by' => 'date',
      'category_name' => 'story',  
      'nopaging' => false, 
      'tag' => 'front',                                       
                    );
    $the_query = new WP_Query( $args );
                    if( $the_query->have_posts() ): 
                      while ( $the_query->have_posts() ) : $the_query->the_post();  
                        $thumb_url = '';
                         if ( get_the_post_thumbnail_url( get_the_ID() ) ) {
                            //$thumbnail_id = get_post_thumbnail_id( $post->ID );
                            $thumb_url = ' <img src="'.get_the_post_thumbnail_url( get_the_ID(), 'medium').'">';
                          }                      
                      $html .= '<div class="story-item col-md-4">' . $thumb_url . '<a href="'.get_the_permalink().'"><h3>' . get_the_title() . '</h3></a><div class="story-author">by '.get_the_author().'</div><div class="story-excerpt">'. strip_tags(get_the_story_lead()) . '</div><a class="more-story" href="'.get_the_permalink().'">Read more <i class="arrow-right"></i></a></div>';
                       endwhile;
                  endif;
            wp_reset_query();  // Restore global post data stomped by the_post().
   return $html;
}

function story_read_more() {
    return ' . . .';
}
function get_the_story_excerpt($limit) {
    return wp_trim_words(get_the_excerpt(), $limit, story_read_more());
}


/*
<div class="carousel-item quote-slide">
                      <img class="d-block w-100" src="..." alt="Third slide">
                    </div>
                    */


//MENUS 

function register_alp_menus() {
  register_nav_menus(
    array(
      //'footer-far-left-menu' => __( 'Footer Far Left Menu' ),
      //'footer-mid-left-menu' => __( 'Footer Mid Left Menu' ),
      'footer-mid-right-menu' => __( 'Footer Mid Right Menu' ),
      'footer-far-right-menu' => __( 'Footer Far Right Menu' ),
    )
  );
}
add_action( 'init', 'register_alp_menus' );

//PARTNERS 

function get_the_prime_partner(){
  global $post;
  $html = '';

            $args = array(
                      'posts_per_page' => 1,
                      'post_type'   => 'partner', 
                      'post_status' => 'publish',
                      'category_name' => 'featured',
                    );
                    $the_query = new WP_Query( $args );
                    if( $the_query->have_posts() ): 
                      while ( $the_query->have_posts() ) : $the_query->the_post(); 
                      $html .= '<div class="partner-agg-img col-md-6">';
                      $html .= '<img src="' . get_the_partner_thumb() . '">';
                      $html .= '</div><div class="col-md-6"><div class="featured-case"><i class="fa fa-check-circle"></i>Featured Case Study</div><a class="partner-agg-title" href="'.get_the_permalink().'"><h3 class="partner-post-title">';
                      $html .=  get_the_title(); ;                      
                      $html .= '</h3></a>'. get_the_district_overview(1);
                      $html .= '<a class="read-more-partner" href="'.get_the_permalink().'">View Case Study<i class="arrow-right"></i></a></div>';          
                     endwhile;
                  endif;
            wp_reset_query();  // Restore global post data stomped by the_post().

  return $html;
}


function get_the_secondary_partners(){
  global $post;
  $html = '';
  $featured = get_cat_ID('featured');

            $args = array(
                      'posts_per_page' => 10,
                      'post_type'   => 'partner', 
                      'post_status' => 'publish',
                      'cat' => '-'.$featured,
                    );
                    $the_query = new WP_Query( $args );
                    $i = 1;                   
                    if( $the_query->have_posts() ): 
                      while ( $the_query->have_posts() ) : $the_query->the_post(); 
                         if ($i === 1 || $i === 3 || $i === 5){
                          $margin = 'fix-left';
                        } else {
                          $margin = 'fix-right';
                        }
                      $html .= '<div class="col-md-6 '.$margin.'"><div class="card"><div class="card-body">';
                      $html .= '<img src="'.get_the_partner_thumb().'" class="img-fluid">';
                      $html .= '<a class="partner-agg-title" href="'.get_the_permalink().'"><h3 class="partner-post-title">';
                      $html .=  get_the_title(); ;                      
                      $html .= '</h3></a>'. get_the_district_overview(1) .'<a class="read-more-partner" href="'.get_the_permalink().'">View Case Study<i class="arrow-right"></i></a>';
                      $html .= '</div></div></div>'; 
                      $i++;         
                     endwhile;
                  endif;
            wp_reset_query();  // Restore global post data stomped by the_post().

  return $html;
}


function get_the_partner_stats(){
    global $post;
    $html = "";
    if( have_rows('statistics') ):

    while ( have_rows('statistics') ) : the_row();

        // Your loop code
        $html .= '<div class="row stat-list"><div class="col-4 district-stat-number">' . get_sub_field('stat_number') . '</div>';
        $html .= '<div class="col-8"><h3>' . get_sub_field('stat_header') . '</h3>';
        $html .= '<p>' . get_sub_field('stat_description') . '</p></div></div>';

    endwhile;

else :

    // no rows found

endif;

    return $html;
}



function get_the_district_overview($len) {
  global $post;
   $district_overview = preg_replace('#<a.*?>(.*?)</a>#is', '\1',get_field( "district_overview", $post->ID ));   
   if ($district_overview){
    if ($len === 0){   
    return get_field( "district_overview", $post->ID );
    }
   else if ($len === 1) {
     $array = explode('.',$district_overview);
     $text = $array[0];
     return $text . '.';    
   }
 }
}


function get_the_district_img(){
    global $post;   
   $district_img = get_field( "district_featured_image", $post->ID );   
   if ($district_img){
    return $district_img['sizes']['medium_large'];
   }
}

function get_the_partner_thumb(){
   global $post;  
  $district_img = get_field( "district_featured_image", $post->ID );   
   if ($district_img){
     $image = $district_img['sizes']['medium_large'];
    return $image;
   }
}




function get_the_district_services(){
    global $post;
    $html = "";
    $services = get_field('key_services');

    if( $services) {
     foreach ($services as $service) {
      $parent_id = $service->parent;
        $parent = get_term_by('id', $parent_id, 'service');
        $parent_slug = $parent->slug;
        $html .= '<div class="col-md-4"><a href="../../services/'. $parent_slug .'#' . $service->slug . '"><div class="service-offer"><div class="service-name icon-' . sanitize_title($service->name) . ' ' . $parent_slug . '">';
        $html .= $service->name;
        $html .= '</div></div></a></div>';
      }
    }
    return $html;
}

function get_the_district_demogrphics(){
    global $post;
    $html = "";
    if( have_rows('district_demographics') ):

    while ( have_rows('district_demographics') ) : the_row();

        // Your loop code
        $html .= '<li>' . get_sub_field('descriptor') . '</li>';

    endwhile;

else :

    // no rows found

endif;

    return $html;
}

function get_the_timeline_events(){
   global $post;
   $tag = $post->post_name;
   $html = "";
   if( have_rows('timeline') ):

    while ( have_rows('timeline') ) : the_row();
      $start_year = get_sub_field('start_year');
      $end_year = get_sub_field('end_year');
      $the_event_time = $start_year . ' - ' . $end_year;
      $event_id = get_sub_field('event_category');
      $event_category = get_term_by('id', $event_id, 'service')->name;
      $sub_cat_parent = get_term_by('id', $event_id, 'service')->parent;
      $sub_service = sanitize_title($event_category);
      $event_descriptor = get_sub_field('event_descriptor');
      $event_img = get_sub_field('event_image')['sizes'][ 'partner-thumb' ];
      
      $html .= '<div class="row event"><div class="col-md-2 event-col"><span class="timeline-time"><i class="fa fa-calendar"></i></i>'. $the_event_time .'</span></div>';

    $html .= '<div class="col-md-6 timeline-details"><div class="circle-icon icon-' . $sub_service . '"></div><a href="'.timeline_service_link($sub_cat_parent, $sub_service).'" data-toggle="tooltip" data-placement="right" title="Read about this service"><h2>'. $event_category.'</h2></a>';

    $html .= '<p class="timeline-para">'.$event_descriptor.'</p>';
    $html .= '<a class="timeline-read-more" href="'.timeline_service_link($sub_cat_parent, $sub_service).'">Read about this service <i class="arrow-right"></i></a>';
    $html .= partner_timeline_stories($tag, $sub_service) .'</div>';
    $html .= '<div class="col-md-4 timeline-img"><img class="img-fluid img-timeline" src="'.$event_img.'"></div></div>';
 endwhile;

else :

    // no rows found

endif;

    return $html;
}



function get_the_timeline_overview(){
  global $post;
   if (get_field('timeline_overview', $post->ID)){
    return get_field('timeline_overview', $post->ID);
   } else {
      $tag = $post->post_name;
     $html = "";
     $count = count(get_field('timeline'));
     $rows = get_field('timeline' ); 
     $start_row = $rows[0]; 
     $end_row = $rows[$count-1];
     $start_year = $start_row['start_year']; 
     $start_season = $start_row['event_season']; 
     $end_year = $end_row['end_year']; 
     $end_season = $end_row['event_season'];     
     $html = $start_season . ' ' . $start_year . ' - ' . $end_season . ' ' . $end_year;

     return $html;
   }
   
}

function timeline_service_link($parent_id, $service){
  $url_base = '../../services/';
  $slug = get_term_by( 'id', $parent_id, 'service', OBJECT, null )->slug;
  $link = $url_base . $slug . '#' . $service;
  return $link;
}


function partner_timeline_stories($tag,$sub_service){
  global $post;
  $html = '';

            $args = array(
                      'posts_per_page' => 2,
                      'post_type'   => 'post', 
                      'post_status' => 'publish',
                      'category_name' => 'featured, story',
                      'tag' => $tag,
                      'tax_query' => array(
                          array(
                            'taxonomy' => 'service',
                            'field'    => 'slug',
                            'terms'    => $sub_service,
                          ),
                        ),
                    );
                    $the_query = new WP_Query( $args );
                    $i = 1;                   
                    if( $the_query->have_posts() ): 
                      $html .= '<div class="timeline-article-holder"><div class="timeline-article-header"><i class="fa fa-bars"></i><h3>Articles</h3></div>';
                      while ( $the_query->have_posts() ) : $the_query->the_post(); 
                        $html .= '<div class="timeline-article"><a href="'.get_the_permalink().'">'.get_the_title().'</a></div>';
                     endwhile;
                     $html .= '</div>';
                  endif;
            wp_reset_query();  // Restore global post data stomped by the_post().

  return $html;
}


function acf_fetch_partner_button_header(){
  global $post;
  $html = '';
  $button_header = get_field('button_header');

    if( $button_header) {      
      $html = $button_header;  
     return $html;    
    }

}


function acf_fetch_partner_button_description(){
  global $post;
  $html = '';
  $button_description = get_field('button_description');

    if( $button_description) {      
      $html = $button_description;  
     return $html;    
    }

}


function acf_fetch_partner_agg_button_area_title(){
  global $post;
  $html = '';
  $partner_agg_button_area_title = get_field('partner_agg_button_area_title');

    if( $partner_agg_button_area_title) {      
      $html = $partner_agg_button_area_title;  
     return $html;    
    }

}


function acf_fetch_partner_agg_button_area_statement(){
  global $post;
  $html = '';
  $partner_agg_button_area_statement = get_field('partner_agg_button_area_statement');

    if( $partner_agg_button_area_statement) {      
      $html = $partner_agg_button_area_statement;  
     return $html;    
    }

}



function acf_fetch_alp_partner_logo(){
  global $post;
  $html = '';
  $alp_partner_logo = get_field('alp_partner_logo');

    if( $alp_partner_logo) {      
      $html = $alp_partner_logo;  
     return $html;    
    }

}


function acf_fetch_dell_partner_logo(){
  global $post;
  $html = '';
  $dell_partner_logo = get_field('dell_partner_logo');

    if( $dell_partner_logo) {      
      $html = $dell_partner_logo;  
     return $html;    
    }

}



function acf_fetch_partner_statement(){
  global $post;
  $html = '';
  $partner_statement = get_field('partner_statement');

    if( $partner_statement) {      
      $html = $partner_statement;  
     return $html;    
    }

}













//services agg button stuff


function acf_fetch_services_button_area_title(){
  global $post;
  $html = '';
  $services_button_area_title = get_field('single_service_button_area_title',$post->ID);
    if( $services_button_area_title) {      
      $html = $services_button_area_title;  
     return $html;    
    }
}


function acf_fetch_services_button_area_statement(){
  global $post;
  $html = '';
  $services_button_area_statement = get_field('single_service_button_area_statement',$post->ID);
    if( $services_button_area_statement) {      
      $html = $services_button_area_statement;  
     return $html;    
    }
}

function acf_fetch_contact_title(){
  global $post;
  $html = '';
  $services_button_area_title = get_field('footer_heading');
    if( $services_button_area_title) {      
      $html = $services_button_area_title;  
     return $html;    
    }
}


function acf_fetch_contact_statement(){
  global $post;
  $html = '';
  $services_button_area_statement = get_field('footer_details');

    if( $services_button_area_statement) {      
      $html = $services_button_area_statement;  
     return $html;    
    }
}



//FACULTY PROFILES

add_image_size( 'faculty', 400, 400, array( 'center', 'top' ) );

function get_the_bio_img($size, $post_id = NULL){
  
    global $post;
    $html = "";
    $img = get_field('bio_image', $post_id);
    
    if( $img ) {
      if($img['sizes'][$size]){
        $img = $img['sizes'][$size];     
        $html .= $img;
      }
       else {
        $html .= $img['sizes']['medium'];
       }
    }
    return $html;
}

function get_the_degree(){
  global $post;
    $html = "";
    $degree = get_field('degrees');

    if( $degree) {
           
      $html .= $degree;
    }
    return $html;
}

function get_the_alp_title($post_id = NULL){
    if(isset($post_id)){
          $title = get_field('alp_title', $post_id);
    } else {
         global $post;
         $title = get_field('alp_title');
    }
 
    $html = "";

    if( $title) {
           
      $html .= $title;
    }
    return $html;
}


function get_faculty_cat(){
  global $post;
  $categories = get_the_category($post->ID);
  if ( ! empty( $categories ) ) {
      return esc_html( $categories[0]->name );   
  }
}

function get_story_cat(){
  global $post;
  $categories = get_the_category($post->ID);
  if ( ! empty( $categories ) ) {
      return esc_html( $categories[1]->name );   
  }
}


function get_the_experience(){
  global $post;
    $html = "";
    $experience = get_field('experience');
    $current_year = date("Y");
    if( $experience) {
      if ($experience >1 ){
        $plural = 's';      
      } else {
        $plural = '';
      }
      if ($experience > 99){
        $experience = $current_year - $experience;
      }
      $html = '<div class="experience"><h3>Experience</h3>';      
      $html .= $experience . ' Year' . $plural . '</div>';
    }
    return $html;
}

function get_the_teaching(){
  global $post;
    $html = "";
    $teaching = get_field('teaching');

    if( $teaching) {      
      $html = '<div class="teaching"><h3>Teaching</h3>';      
      $html .= $teaching . '</div>';
    }
    return $html;
}


function get_the_certs(){
  global $post;
   if( have_rows('certifications') ):
    $html = '<div class="certifications"><h3>Certifications</h3><ul>';
    $rows = count(get_field('certifications'));
    $count = 0;
    while ( have_rows('certifications') ) : the_row();       
        $html .=  "<li>".get_sub_field('certificate')."</li>";
        $count++;     
    endwhile;
    $html .= '</div>';
    return $html;
    else :
        // no rows found
    endif;
}

function get_the_skills(){
  global $post;
   if( have_rows('skills') ):
  $html = '<div class="skills"><h3>Key Skills and Qualifications</h3><ul>';    
    while ( have_rows('skills') ) : the_row();    
        $html .=  '<li>'.get_sub_field('skill').'</li>';        
    endwhile;
    $html .= '</ul></div>';
    return $html;
    else :
        // no rows found
endif;

}

function get_the_awards(){
  global $post;
   if( have_rows('awards') ):
  $html = '<div class="awards"><h3>Recognition and Publications</h3><ul>';    
    while ( have_rows('awards') ) : the_row();    
        $html .=  '<li>'.get_sub_field('award').'</li>';        
    endwhile;
    $html .= '</ul></div>';
    return $html;
    else :
        // no rows found
endif;

}

function get_the_qualifications(){
  global $post;
   if( have_rows('academic_qualifications') ):
  $html = '<div class="qualifications"><h3>Academic Qualifications</h3><ul>';    
    while ( have_rows('academic_qualifications') ) : the_row();    
        $html .=  '<li>'.get_sub_field('qualification').'</li>';        
    endwhile;
    $html .= '</ul></div>';
    return $html;
    else :
        // no rows found
endif;

}


function get_faculty_first_name(){
  global $post;
  $title = explode(" ",$post->post_title);  
  $first = $title[0];
  return $first;
}


//point more stories link to facet wp page with author restriction 
function get_faculty_link(){
   $author = get_field('author');
   $url = get_site_url();
  if ($author){
    $the_id = $author["ID"];
    $link = $url . '/story-browser/?fwp_authors=' . $the_id;
    return $link;
  }  
}


function get_faculty_bio_posts(){
  global $post;
  $html = '';
  $author = get_field('author');
  if ($author){
    $the_id = $author["ID"];
            $args = array(
                      'author' => $the_id,
                      'posts_per_page' => 3,
                      'post_type'   => 'post', 
                      'post_status' => 'publish',
                    );
                    $the_query = new WP_Query( $args );
                    if( $the_query->have_posts() ): 
                      $html .= '<div class="row the-faculty-posts">';                      
                      while ( $the_query->have_posts() ) : $the_query->the_post(); 
                      $html .= '<div class="faculty-post-img col-md-4">';
                        if ( has_post_thumbnail() ) {
                        $html .=  get_the_post_thumbnail(get_the_ID(),'medium', array('class' => 'faculty-post-img', 'alt' => 'Faculty post image.'));
                        }  
                       $html .= '<a href="'.get_the_permalink().'"><h3 class="faculty-post-title">';
                       $html .=  get_the_title(); ;                      
                       $html .= '</h3></a><div class="faculty-post-byline">by ' . get_the_author() . '</div>';
                       $html .= strip_tags(get_the_story_lead());
                       $html .= '<a class="faculty-read-more" href="' . get_the_permalink() . '">Read more<i class="arrow-right"></i></a></div>';          
                     endwhile;
                     $html .= '</div>';
                  endif;
            wp_reset_query();  // Restore global post data stomped by the_post().
  }

  return $html;
}

function socialStatement ($social){
  $social = strtolower($social);
    if ($social === 'twitter'){
      return 'follow on ';
    }
    if ($social === 'linkedin'){
      return 'connect on ';
    } else {
      return 'join on ';
    }
}


function get_the_social(){
  global $post;
   if( have_rows('field_5b3c0fdf055e0') ):
  $html = '';    
    while ( have_rows('field_5b3c0fdf055e0') ) : the_row();  
        $service = get_sub_field('social_media_service');  
        $html .=  '<a href="' . get_sub_field('social_media_url') . '" class="faculty-social-link"><i class="'. strtolower($service) .'" aria-hidden="true"></i>'. socialStatement($service) . $service .'</a>';        
    endwhile;
    $html .= '</div>';
    return $html;
    else :
        // no rows found
endif;

}


function has_twitter_account (){
  if( have_rows('social_media') ):
    while ( have_rows('social_media') ) : the_row(); 
    $service = strtolower(get_sub_field('social_media_service'));   
      if ($service === 'twitter'){
        return true;
      }
     endwhile;
  endif;   
}

function get_twitter_account (){
  if( have_rows('social_media') ):
    while ( have_rows('social_media') ) : the_row();  
      $service = strtolower(get_sub_field('social_media_service'));  
      if ($service === 'twitter'){
         $twitter_url = get_sub_field('social_media_url');
         $account = basename($twitter_url);
        return $account;
      }
     endwhile;
  endif;   
}


function acf_fetch_email_address(){
  global $post;
  $html = '';
  $email_address = get_field('email_address');
    if( $email_address) {      
      $clean_email = str_replace( "@advancedpartnerships.com", "@alplearn.com", $email_address);
     return $clean_email;    
    } else {
      return 'alp@alplearn.com';
    }

}


//STORIES
function get_the_story_lead(){
    global $post;
    $html = "";
    $lead = get_field('lead_quote');

    if( $lead) {      
      $html = '<div class="the-story-lead-quote">' . $lead . '</div>';
      return $html;      
    }
}


//SERVICES 

add_action( 'init', 'create_service_taxonomies', 0 );

function create_service_taxonomies() {
  // Add new taxonomy, make it hierarchical (like categories)
  $labels = array(
    'name'              => _x( 'Services', 'taxonomy general name', 'textdomain' ),
    'singular_name'     => _x( 'Service', 'taxonomy singular name', 'textdomain' ),
    'search_items'      => __( 'Search Services', 'textdomain' ),
    'all_items'         => __( 'All Services', 'textdomain' ),
    'parent_item'       => __( 'Parent Service', 'textdomain' ),
    'parent_item_colon' => __( 'Parent Service:', 'textdomain' ),
    'edit_item'         => __( 'Edit Service', 'textdomain' ),
    'update_item'       => __( 'Update Service', 'textdomain' ),
    'add_new_item'      => __( 'Add New Service', 'textdomain' ),
    'new_item_name'     => __( 'New Service Name', 'textdomain' ),
    'menu_name'         => __( 'Service', 'textdomain' ),
  );

  $args = array(
    'hierarchical'      => true,
    'labels'            => $labels,
    'show_ui'           => true, //SWITCH OFF FOR PRODUCTION
    'show_admin_column' => true,
    'query_var'         => true,
    'rewrite'           => array( 'slug' => 'service' ),
  );

  register_taxonomy( 'service', array( 'partner','post' ), $args );
}



function get_sub_services($cat_name){
  $term_id = get_term_by('name', $cat_name, 'service')->term_id;
  $taxonomy_name = 'service';
  $term_children = get_term_children( $term_id, $taxonomy_name );
  $html = '';
  foreach ( $term_children as $child ) {
     $term = get_term_by( 'id', $child, $taxonomy_name );
     $safe_name = sanitize_title($term->name);
     $safe_cat_name = sanitize_title($cat_name);
     $term_name = $term->name;
     $html .= "
      <div class='card service-sub-service icon-{$safe_name} icon-{$safe_cat_name}-subs'><a href='#{$safe_name}'><div class='card-body'>{$term_name}</div></a></div>";
  }
  return $html;
}



function get_the_sub_service_outcomes(){
    global $post;
    $html = '<ul class="service-outcomes-list">';
    if( have_rows('the_sub_service_outcomes') ):

    while ( have_rows('the_sub_service_outcomes') ) : the_row();
        // Your loop code       
        $html .= '<li>' . get_sub_field('the_sub_service_outcome_statement') . '</li>';

    endwhile;
    $html .= '</ul>';

else :

    // no rows found

endif;

    return $html;
}

function get_the_sub_service_deliverables(){
  global $post;
    $html = '<ul class="service-deliverable">';
    if( have_rows('the_sub_service_deliverables') ):

    while ( have_rows('the_sub_service_deliverables') ) : the_row();

        // Your loop code
       
        $html .= '<li>' . get_sub_field('the_sub_service_deliverable_statement') . '</li>';

    endwhile;
    $html .= '</ul>';
else :

    // no rows found

endif;

    return $html;
  
}

function get_the_sub_service_detail(){
    global $post;
    //Do the color assignment based on the service category
    $colors = array(
      "Inspire" => "orange",
      "Design" => "green",
      "Empower" => "dark_blue",
      "Amplify" => "light_blue",
      "Additional Learning Solutions" => "red"
    );
    $title = get_the_title();
    $color = $colors[$title];

    $html = "";
    if( have_rows('sub_service_detail') ):

    while ( have_rows('sub_service_detail') ) : the_row();

        // Your loop code FIX ICONS TO BE SPECIFIC
        $sub_service_name = get_sub_field('the_sub_service')[0]->name;
        $sub_service_description = get_sub_field('the_sub_service_description');

        $slug = get_sub_field('the_sub_service')[0]->slug;
        $html .= '<div class="row sub-service-row" id="' . sanitize_title($sub_service_name) . '""><div class="col-md-2"><img class="sub-service-icon-large" src="' . get_stylesheet_directory_uri() . '/imgs/' . special_service_shield($slug,'med') . '"></div><div class="col-md-10"><h2>'.$sub_service_name.'</h2><div class="service-statement">';
        $html .= $sub_service_description . '</div></div>';
        //$html .= '<div class="col-md-5 offset-md-2 service-outcomes"><h3>Outcomes</h3>'.get_the_sub_service_outcomes().'</div>'; 
        //$html .= '<div class="col-md-5 service-deliverables"><h3>Deliverables</h3>'.get_the_sub_service_deliverables().'</div>';     
        $html .= get_the_sub_service_post(get_sub_field('the_sub_service')[0]->slug);         
        $html .='</div>';

    endwhile;

else :

    // no rows found

endif;

    return $html;
}


function special_service_shield($slug,$size){
  if ($size === 'med'){    
    $size = '@2x';
  } else {
    $size = '';
  }
  //AMPLIFY
  if($slug === 'change-management'){
    return 'amplify/ALP_Badge_ChangeMgmt'.$size.'.png';
  }
  if($slug === 'program-impact'){
    return 'amplify/ALP_Badge_ProgramImpact'.$size.'.png';
  }
  if($slug === 'leadership-professional-learning'){
    return 'amplify/ALP_Badge_LeadershipProfessionalMoving'.$size.'.png';
  }
   if($slug === 'trailblazer-cohorts'){
    return 'amplify/ALP_Badge_TrailblazerCohorts'.$size.'.png';
  }
  if($slug === 'facilitated-sessions'){
    return 'amplify/ALP_Badge_FacLearningExp'.$size.'.png';
  }
  if($slug === 'coaching-academy'){
    return 'amplify/ALP_Badge_CoachingAcademy'.$size.'.png';
  }
  if ($slug === 'facilitated-learning-walks'){
    return 'amplify/ALP_Badge_FacilitatedLearningWalks'.$size.'.png';
  }
  //DESIGN
  if($slug === 'competency-modeling'){
    return 'design/ALP_Badge_CompetencyModeling'.$size.'.png';//
  }
  if( $slug === 'learning-model-development'){
    return 'design/ALP_Badge_LearningModelDev'.$size.'.png';
  }
  if($slug === 'designing-learner-centered-experiences'){
    return 'design/ALP_Badge_AuthenticLearning'.$size.'.png';//
  }
  if($slug === 'strategic-planning'){
    return 'design/ALP_Badge_StrategicPlanning'.$size.'.png';//
  }
  if($slug === 'toolkit-field-guide-development'){
    return 'design/ALP_Badge_ToolkitFieldGuide'.$size.'.png';//
  }
   if($slug === 'curriculum-design'){
    return 'design/ALP_Badge_NeedsAssessment'.$size.'.png';//
  }
  //EMPOWER
   if($slug === 'learning-design' || $slug === 'learner-centered-experience-design'){
    return 'empower/ALP_Badge_LearningDesignFac'.$size.'.png';//fix link
  }
  if($slug === 'profile-for-innovative-educators'){
    return 'empower/pie_logo_vert.jpg';
  }
  if($slug === 'action-based-talent-development'){
    return 'empower/ALP_Badge_ActionBasedTalentDev'.$size.'.png';
  }
  if($slug === 'coaching-and-modeling'){
    return 'empower/ALP_Badge_SchoolBasedCoaching'.$size.'.png';
  }
  
  if($slug === 'learning-data'){
    return 'empower/ALP_Badge_LearningData'.$size.'.png';
  }
  if($slug === 'workplace-wellness'){
    return 'empower/ALP_Badge_WorkplaceWellness'.$size.'.png';
  }
 

  //INSPIRE
  if($slug === 'keynote'){
    return 'inspire/ALP_Badge_Keynote'.$size.'.png';
  }
   if($slug === 'visioning'){
    return 'inspire/ALP_Badge_DiscoveryDay'.$size.'.png';
  }
   if($slug === 'facilitated-sessions'){
    return 'inspire/ALP_Badge_LeadershipCons'.$size.'.png';
  }
   if($slug === 'institutes'){
    return 'inspire/ALP_Badge_TeachingLearningInst'.$size.'.png';
  }
   if($slug === 'leadership-consulting-inspire'){
    return 'inspire/ALP_Badge_LeadershipCons'.$size.'.png';
  }
   if($slug === 'cross-district-networking'){
    return 'inspire/ALP_Badge_CrossPartnerNetworking'.$size.'.png';
  }
  if($slug === 'generative-ai-executive-consulting'){
    return 'inspire/ALP_Badge_LeadershipCons'.$size.'.png';
  }
  //INSPIRE
  if($slug === 'cybersecurity-program'){
    return 'als/SolutionsBadge_CyberSec@4x.png';
  }
   if($slug === 'esports-program'){
    return 'als/SolutionsBadge_ESports@4x.png';
  }
   if($slug === 'girls-who-game'){
    return 'als/SolutionsBadge_GirlsWhoGame@4x.png';
  }
   if($slug === 'student-help-desk'){
    return 'als/SolutionsBadge_StudentHelp@4x.png';
  }
   
}


function get_the_sub_service_post($service){
  //global $post;
  $html = '';
  $service = sanitize_title($service);
            $args = array(
                      'posts_per_page' => 1,
                      'post_type'   => 'post', 
                      'post_status' => 'publish',
                      'tax_query' => array(
                          array(
                            'taxonomy' => 'service',
                            'field'    => 'slug',
                            'terms'    => $service,
                          ),
                        ),
                    );
                    $the_query = new WP_Query( $args );
                    if( $the_query->have_posts() ): 
                                          $html .= '<div class="col-md-12 sub-service-post-row"><div class="row">';                      

                      while ( $the_query->have_posts() ) : $the_query->the_post(); 
                        //$html .= '<div class="col-md-12 services-related-stories">Related Stories</div>';
                        $html .= '<div class="sub-service-img col-md-3">';
                        if ( has_post_thumbnail() ) {
                        $html .=  get_the_post_thumbnail(get_the_ID(),'medium', array('class' => 'sub-service-post-img', 'alt' => 'Sub Service Story image.'));
                        }  
                       $html .= '</div><div class="col-md-5"><a href="'.get_the_permalink().'"><h3 class="sub-service-post-title">';
                       $html .=  get_the_title(); ;                      
                       $html .= '</h3></a>'. strip_tags(get_the_story_lead()) .'</div>';
                       $html .= '<div class="col-md-4"><a class="btn btn-alp btn-dark" href="'.get_the_permalink().'">Read More</a></div>';          
                     endwhile;
                    $html .= '</div></div>';                  
                  endif;
            wp_reset_query();  // Restore global post data stomped by the_post().
  return $html;
}


//TEAM AGGREGATOR

function get_the_team_statements(){
    global $post;
    $html = "";
    if( have_rows('team_statements') ):
    while ( have_rows('team_statements') ) : the_row();
      $i = get_row_index();
      $html .= '<div class="col-md-4 team">';
        // Your loop code
      $html .= '<div class="team-img-circle"><img src="'. get_sub_field('statement_icon') .'"></div>'; //team_svg($i)
      $html .= '<h3 class="team-title">' . get_sub_field('statement_header') . '</h3>';
      $html .= '<p>' . get_sub_field('statement_description') . '</p>';
      $html .= '</div>';
    endwhile;

    else :

        // no rows found

    endif;
    return $html;

}


function team_svg($number){
  $svgs = ['Team_Innovative_animated','Team_Collaborate_animated','Team_Care_animated'];
  return file_get_contents(get_template_directory_uri() . '/imgs/'.$svgs[$number-1].'.svg'); 
}



function acf_fetch_team_photo(){
  global $post;
  $html = '';
  $team_photo = get_field('team_photo');
    if( $team_photo) {      
      $html = $team_photo;  
     return $html;    
    }

}

function get_leadership_bios(){
  // Check rows exists.
  if( have_rows('alp_leadership') ):
      $html = '';
      // Loop through rows.
      while( have_rows('alp_leadership') ) : the_row();
          // Load sub field value.
          $post_id = get_sub_field('person');
          // Do something...
          $link = get_the_permalink($post_id);
          $img = get_the_bio_img('faculty', $post_id);
          $title = get_the_title($post_id);
          $job_title = get_the_alp_title($post_id);
          $perma_link = get_the_permalink($post_id);
          $html .= "<div class='col-md-4 team-square leadership'>                                              
                        <a href='{$link}'><div class='card'>
                          <div class='card-body leadership'>
                            <img loading='lazy' src='{$img}' class='img-fluid team-bio-single'>
                            <div class='hover-faculty-view'>View Profile <i class='arrow-right'></i></div>
                              <h3 class='team-title'>
                                {$title}                     
                              </h3>
                            </a>
                          {$job_title}
                        </div>
                    <a class='team-read-more' href='{$perma_link}'>Read more<i class='arrow-right'></i></a>
                    </div></div>";

      // End loop.
      endwhile;
      echo $html;
  // No value.
  else :
      // Do something...
  endif;
}


function get_faculty_bios($cat){
  global $post;
  $html = '';
            $args = array(
                      'posts_per_page' => -1,
                      'post_type'   => 'faculty', 
                      'post_status' => 'publish',
                      'category_name' => $cat,
                      'orderby' => 'title',
                      'order' => 'ASC',
                    );
            if ($cat === 'leadership') {
              $col = '4';
              $level = 'leadership';
              $br = '';
            } else {
              $col = '3';
              $level = 'featured';
              $br = '<br>';
            }
                    $the_query = new WP_Query( $args );
                    if( $the_query->have_posts() ): 
                      while ( $the_query->have_posts() ) : $the_query->the_post(); 
                      $html .= '<div class="col-md-'.$col.' team-square ' . $level .'">';                                              
                      $html .= '<a href="'.get_the_permalink().'"><div class="card"><div class="card-body '.$cat.'">';
                        if ( get_the_bio_img('medium') ) {
                        $html .=  '<img loading="lazy" src="' . get_the_bio_img('faculty') . '" class="img-fluid team-bio-single">';
                        $html .= '<div class="hover-faculty-view">View Profile'.$br.'<i class="arrow-right"></i></div>';
                        }  
                       $html .= '<h3 class="team-title">';
                       $html .=  get_the_title(); ;                      
                       $html .= '</h3></a>';
                      if ($level === 'leadership'){
                           $html .= get_the_alp_title();                        
                        }
                         $html .= '</div>';  
                       if ($level === 'leadership'){
                           $html .= '<a class="team-read-more" href="'.get_the_permalink().'">Read more<i class="arrow-right"></i></a>';
                         }
                       $html .= '</div></div>';                               
                     endwhile;
                  endif;
            wp_reset_query();  // Restore global post data stomped by the_post().

  return $html;
}



function acf_fetch_team_button_area_title(){
  global $post;
  $html = '';
  $team_button_area_title = get_field('team_button_area_title');

    if( $team_button_area_title) {      
      $html = $team_button_area_title;  
     return $html;    
    }

}


function acf_fetch_team_button_area_statement(){
  global $post;
  $html = '';
  $team_button_area_statement = get_field('team_button_area_statement');

    if( $team_button_area_statement) {      
      $html = $team_button_area_statement;  
     return $html;    
    }

}







//SERVICES AGGREGATOR
function get_the_top_services(){
   global $post;
    $html = "";
    if( have_rows('service_summary') ):

      while ( have_rows('service_summary') ) : the_row();
        $colors = array(
          "Inspire" => "orange",
          "Design" => "green",
          "Empower" => "dark_blue",
          "Amplify" => "light_blue",
          "Additional Learning Solutions" => "red"
        );
        $title = get_sub_field('the_service')->name;
        $color = $colors[$title];
 

            // Your loop code
            $service = get_sub_field('the_service')->name;
            $service_clean = sanitize_title($service);
            $tag_line = '<div class="tag-line">'.get_sub_field('service_sub_title').'</div>';
            $descriptor = '<p>'.get_sub_field('service_sub_statement').'</p>';
            $html .= '<div class="row agg-service-box"><div class="col-md-2 services-left"><img src="'. get_template_directory_uri() .'/imgs/'.$color.'.svg" class="services-icon"></div>';
            $html .=  '<div class="col-md-6 services-mid"><a href="../service/' . $service_clean . '"><h3>' . $service . '</h3></a>'. $tag_line . $descriptor . '<a href="../service/' . $service_clean . '">Read about this service <i class="arrow-right"></i></a></div>';
            $html .= '<div class="col-md-4 services-right"><h3 class="sub-services">Services</h3><ul>' .get_sub_services_agg($service) . '</ul></div></div>';

        endwhile;

    else :

        // no rows found

    endif;

    return $html;

}


function acf_fetch_services_header_description(){
  global $post;
  $html = '';
  $services_header_description = get_field('services_header_description');

    if( $services_header_description) {      
      $html = $services_header_description;  
     return $html;    
    }

}




function get_sub_services_agg($cat_name){
  $term_id = get_term_by('name', $cat_name, 'service')->term_id;
  $taxonomy_name = 'service';
  $term_children = get_term_children( $term_id, $taxonomy_name );
  $html = '';
  foreach ( $term_children as $child ) {
     $term = get_term_by( 'id', $child, $taxonomy_name );
     $id = sanitize_title($term->name);
     $sanitize_name = sanitize_title($cat_name);
     $html .= '<li><a href="'. $sanitize_name .'#'.$id.'">' . $term->name . '</a></li>';
  }
  return $html;
}


function get_all_the_sub_services(){
  $top_services = ['Inspire','Amplify','Design','Empower',];//add 'Additional Learning Solutions' when ready
  $html = '';
  foreach ($top_services as $service){
    $html .= get_sub_services_grid($service);
  }
  return $html;
}

function get_sub_services_grid($cat_name){
  $clean_cat = sanitize_title($cat_name);
  $term_id = get_term_by('name', $cat_name, 'service')->term_id;
  $taxonomy_name = 'service';
  $term_children = get_term_children( $term_id, $taxonomy_name );
  $html = '';
  foreach ( $term_children as $child ) {
    $term = get_term_by( 'id', $child, $taxonomy_name );
    $clean_name = sanitize_title($term->name);
    //col-lg-2 col-md-4 col-6
     $html .= "
                <div class='services-grid' data-url='../{$clean_cat}#{$clean_name}' id='grid-{$clean_name}'>
                  <a href='{$clean_cat}#{$clean_name}'>
                    <div class='sub-service-icon icon-{$clean_cat}-subs'></div>
                      {$term->name}
                  </a>
                </div>";
  }
  return $html;
}


//STORIES AGG PAGE
function story_layout($title, $link, $img, $author, $lead){
   $html = '';
   $html .= '<div class="card story-agg-card"><img class="card-img-top story-agg-img" src="' . $img . '">';
   $html .= '<a href="'. $link .'"><h3>' . $title . '</h3></a>';
   $html .= '<div class="story-agg-author">by ' . $author . '</div><p>' . strip_tags($lead) . '</p>';
   $html .= '<a class="read-more" href="' . $link .' ">Read more <i class="arrow-right"></i></a></div>';
   return $html;
}

function most_recent(){
            $html = '';
            $args = array(
                      'posts_per_page' => 3,
                      'post_type'   => 'post', 
                      'post_status' => 'publish',
                    );
          
                    $the_query = new WP_Query( $args );
                    if( $the_query->have_posts() ): 
                      while ( $the_query->have_posts() ) : $the_query->the_post(); 
                        $title = get_the_title();
                        $link = get_the_permalink();
                        $img = get_the_post_thumbnail_url();
                        $id = get_the_ID();
                        $author = get_the_author();
                        $lead = get_the_story_lead();
                      $html .= story_layout($title, $link, $img, $author, $lead);
                     endwhile;
                  endif;
            wp_reset_query();  // Restore global post data stomped by the_post().

  return $html;
}

function featured_story($cat){
            $html = '';
            $args = array(
                      'posts_per_page' => 3,
                      'post_type'   => 'post', 
                      'post_status' => 'publish',
                      'category_name' => $cat,
                    );
          
                    $the_query = new WP_Query( $args );
                    if( $the_query->have_posts() ): 
                      while ( $the_query->have_posts() ) : $the_query->the_post(); 
                        $title = get_the_title();
                        $link = get_the_permalink();
                        $img = get_the_post_thumbnail_url();
                        $author = get_the_author();
                        $lead = get_the_story_lead();
                      $html .= story_layout($title, $link, $img, $author, $lead);
                     endwhile;
                  endif;
            wp_reset_query();  // Restore global post data stomped by the_post().

  return $html;
}
function spark_rss_getter(){
  $rss = 'https://paper.li/~api/papers/e1b56533-5db8-4e0b-bd3a-2cfa1aa7cc11/rss';
  $curl = file_get_contents($rss);
  $sparks = new SimpleXMLElement($curl);

  $html = '';
  for ($i=0; $i<=2; $i++) {
    $item = $sparks->channel->item[$i]; 
    //var_dump($item->children('media', True)->content->attributes()['url']);

    // if($item->getNamespaces(true)){
    //       $namespaces = $item->getNamespaces(true);
    // }
    $item_title = $item->title;
    $item_link = $item->link;
    $item_desc = $item->description;
    $item_desc = spark_link_maker($item_desc);
    $item_desc = wptuts_twitter_handles($item_desc);
    $item_desc = spark_cleaner($item_desc);
    $item_desc = spark_remove_lead($item_desc);
    $item_img =  $item->children('media', True)->content->attributes()['url'];

   $html .= spark_layout($item_title, $item_link, $item_desc, $item_img);
  }
  return $html;
}

function spark_layout($title, $link, $item_desc, $img){
   $html = '';
   $html .= '<div class="card story-agg-card">';
   $html .= '<img class="spark-img" src="' . $img . '">';
   $html .= '<a href="'. $link .'"><h3>' . $title . '</h3></a>';
   //$html .= '<p>' . $item_desc . '</p>';
   $link_out = parse_url($link, PHP_URL_HOST);
   $html .= '<a class="spark-link-out" href="http://'. $link_out .'"><i class="fa fa-link"></i>' . $link_out . '</a>';
   $html .= '<a class="read-more" href="' . $link .' ">Read more <i class="arrow-right"></i></a></div>';
   return $html;
}


//plugin reference https://dfactory.eu/docs/post-views-counter/developers-api/

function most_popular(){
    $html = '';
    $args = array(
        'order' => 'DESC',
        'posts_per_page' => 3,
        'suppress_filters' => false,
        'orderby' => 'post_views',
        'fields' => ''
      );
      $most_viewed = get_posts( $args );

      foreach ($most_viewed as $post) {
         $title = $post->post_title;
         $link = get_permalink($post->ID);
         $img = get_the_post_thumbnail_url($post->ID);
         $author = get_the_author_meta('display_name',$post->post_author);
         $lead = popular_get_the_story_lead($post->ID);
         $html .= story_layout($title, $link, $img, $author, $lead);
      }
    return $html;
}


function popular_get_the_story_lead($id){
    $html = "";
    $lead = get_field('lead_quote', $id);

    if( $lead) {      
      $html = $lead;
      return $html;      
    }
}


//SINGLE STORY

function story_social_links($author){
  $faculty_page = get_page_by_title( $author, OBJECT, 'faculty' );
  $id = $faculty_page->ID;
  $twitter = '<a class="story-soc" href="https://twitter.com/'.story_twitter_account($id).'"><i class="story-soc-icon twitter"></i>Follow on Twitter</a>';
  $linked = '<a class="story-soc" href="'.story_linked_account($id).'"><i class="story-soc-icon linkedin"></i>Connect on linkedin</a>';
  $html =  $linked;
  return $html;
}


function story_twitter_account ($id){
  if( have_rows('social_media', $id) ):
    while ( have_rows('social_media', $id) ) : the_row();  
      $service = strtolower(get_sub_field('social_media_service', $id));  
      if ($service === 'twitter'){
         $twitter_url = get_sub_field('social_media_url', $id);
         $account = basename($twitter_url);
        return $account;
      }
     endwhile;
  endif;   
}


function story_linked_account ($id){
  if( have_rows('social_media', $id) ):
    while ( have_rows('social_media', $id) ) : the_row();  
      $service = strtolower(get_sub_field('social_media_service', $id));  
      if ($service === 'linkedin'){
         $linkedin_url = get_sub_field('social_media_url', $id);
        return $linkedin_url;
      }
     endwhile;
  endif;   
}


//make facet link for stories in a particular service category
function single_story_tags($id){
  $url = get_site_url();
  $terms = get_the_terms( $id, 'service');  
  foreach($terms as $term){
    if($term->parent > 0){
      $facet_search = 'fwp_services';
    } else {
      $facet_search = 'fwp_parent_services';
    }
    echo '<div class="story-service-tag"><a href="' . $url.'/story-browser/?'.$facet_search.'='. $term->slug . '">' . $term->name . '</a></div>';
  }
}

function single_story_real_tags($id){
  $posttags = get_the_tags($id);
  if ($posttags) {
    foreach($posttags as $tag) {
      if ($tag->name != 'front'){
        echo '<div class="story-service-tag"><a href="'. get_tag_link($tag->term_id) . '">' . $tag->name . '</a></div>';
      }
    }
  }
}


//SOCIAL SHARING 
function story_social_sharing_buttons($post) {
    global $post;
    // Get current page URL 
    $socialURL = urlencode(get_the_permalink($post));
 
    // Get current page title
    $socialTitle = str_replace( ' ', '%20', get_the_title($post));

    // Get Post Thumbnail for pinterest
    $socialThumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID), 'full' );

    // Construct sharing URL without using any script
    $twitterURL = 'https://twitter.com/intent/tweet?text='.$socialTitle.'&amp;url='.$socialURL;
    $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$socialURL;
    $googleURL = 'https://plus.google.com/share?url='.$socialURL;
    $linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$socialURL.'&amp;title='.$socialTitle;
    $pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$socialURL.'&amp;media='.$socialThumbnail[0].'&amp;description='.$socialTitle;
    
    $content = '';
    // Add sharing button at the end of page/page content
    $content .= '<div id="story-social">';
    $content .= '<a class=" social-twitter" href="' . $twitterURL .'" target="_blank"><i class="story-soc-icon twitter"></i></a>';
    $content .= '<a class=" social-facebook" href="'. $facebookURL .'" target="_blank"><i class="story-soc-icon facebook"></i></a>';
    $content .= '<a class=" social-googleplus" href="'.$googleURL.'" target="_blank"><i class="story-soc-icon google"></i></a>';
    $content .= '<a class=" social-linkedin" href="'.$linkedInURL.'" target="_blank"><i class="story-soc-icon linkedin"></i></a>';
    //$content .= '<a class=" social-pinterest" href="'.$pinterestURL.'" target="_blank"><i class="fa fa-pinterest"></i></a>';
    $content .= '</div>';
    
    return $content;
 
};


//TWITTER STUFF
//$connection = new TwitterOAuth($CONSUMER_KEY, $CONSUMER_SECRET, $access_token, $access_token_secret);

//$content = $connection->get("account/verify_credentials");
//$alp_search = $connection->get("search/tweets", ["q" => "#alplearn"]);
//$user_tweets = $connection->get("statuses/user_timeline", ["screen_name" => "twoodwar", "count" => 1]);

function get_user_tweets($user){
  $html = '';
  $connection = new TwitterOAuth($GLOBALS['CONSUMER_KEY'], $GLOBALS['CONSUMER_SECRET'], $GLOBALS['access_token'], $GLOBALS['access_token_secret']);

  $user_tweets = $connection->get("statuses/user_timeline", ["screen_name" => $user, "count" => 35, "exclude_replies" => true]);
  //print("<pre>".print_r($user_tweets,true)."</pre>");
  $inc = 0;
  $html_a = '';

   foreach ($user_tweets as $tweet) { 
            $url = 'https://twitter.com/'. $user . '/status/' . $tweet->id;
            $html_a .= '<div class="col-md-4 the-tweet">' . wptuts_twitter_handles($tweet->text) .'<a class="tweet-author" href="https://twitter.com/'. $tweet->user->screen_name.'">@'.$tweet->user->screen_name.'</a></div>';  
            $inc++;
            if ($inc === 3 || $inc === 6 || $inc === 9 || $inc === 12){
              if ($inc === 3) {
                $active = 'active';
              } else {
                $active = '';
              }
              $html .= '<div class="carousel-item ' . $active . '"><div class="row tweet-slide">' . $html_a . '</div></div>';
              $html_a = '';
            }                           
    }
    return $html;
}


//TWEETZZZZZ
function get_alp_tweets(){
  $html = '';
  $connection = new TwitterOAuth($GLOBALS['CONSUMER_KEY'], $GLOBALS['CONSUMER_SECRET'], $GLOBALS['access_token'], $GLOBALS['access_token_secret']);
  $user_tweets = $connection->get("search/tweets", ["q" => "#alplearn", "count" => 30, "result_type" => "recent"]);//should be recent
  //print("<pre>".print_r($user_tweets,true)."</pre>");
  $inc = 0;
  $html_a = '';
  $temp = '';

   foreach ($user_tweets->statuses as $tweet) {  
    //print("<pre>".print_r($tweet,true)."</pre>");
    if($tweet->text){

         if ($tweet->entities->urls){         
         foreach($tweet->entities->urls as $e)//pulls out URLs 
          {
                  if ($e->indices[0] && isset($temp["start"])){
                    $temp["start"] = $e->indices[0];
                  }
                  if ($e->indices[1] && isset($temp["end"])){
                    $temp["end"] = $e->indices[1];
                    //$temp["replacement"] = "";
                  }
                 
                  $entities[] = $temp;
          }
        }
        if (isset($temp['replacement'])){
          $replace = $temp['replacement'];
        } else {
          $replace = '';
        }
        //var_dump($tweet->text);
            $html_a .= '<div class="col-md-4 the-tweet">'. $replace . wptuts_twitter_handles($tweet->text) . 
            '<a class="tweet-author" href="https://twitter.com/'. $tweet->user->screen_name .'" target="_blank">@'.$tweet->user->name.'</a></div>';  
            $inc++;
            if ($inc === 3 || $inc === 6 || $inc === 9 || $inc === 12){
              if ($inc === 3) {
                $active = 'active';
              } else {
                $active = '';
              }
              $html .= '<div class="carousel-item ' . $active . '"><div class="row tweet-slide">' . $html_a . '</div></div>';
              $html_a = '';
            }     
          }
      
   
    }
  return $html;
}


//make tweets link-y
function t_co_link_maker($content) {
  $pattern = '/https:\/\/t.co\/\w+/';
  $replace = '<a href="$0">$0</a>';
  $content = preg_replace($pattern, $replace, $content);
  return $content;
}

//makes twitter link into link in spark or now removes it
function spark_link_maker($content) {
  $pattern = '/https:\/\/twitter.com\/\S+/';
  //$replace = '<a href="$0">$0</a>';
  $replace ='';
  $content = preg_replace($pattern, $replace, $content);
  return $content;
}


//removes tweeted by in rss for spark
function spark_cleaner($content){
  $pattern = '/Tweeted by/';
  $replace = '';
  $content = preg_replace($pattern, $replace, $content);
  return $content;
}

function spark_remove_lead ($content){
  $find = strpos($content, '-');
  $content = substr($content, ($find+2), 2000);
  return $content;
}

//from https://code.tutsplus.com/articles/quick-tip-automatically-link-twitter-handles-with-a-content-filter--wp-26134
function wptuts_twitter_handles($content) {
    $pattern = '/(?<=^|(?<=[^a-zA-Z0-9-_\.]))@([A-Za-z]+[A-Za-z0-9_]+)/i';
    $replace = '<a href="http://www.twitter.com/$1">@$1</a>';
    $content = preg_replace($pattern, $replace, $content);
    $content = t_co_link_maker($content);
    return $content;
}
 
add_filter( "the_content", "wptuts_twitter_handles" );



//add svg upload
function add_svg_to_upload_mimes( $upload_mimes ) {
  $upload_mimes['svg'] = 'image/svg+xml';
  $upload_mimes['svgz'] = 'image/svg+xml';
  return $upload_mimes;
}
add_filter( 'upload_mimes', 'add_svg_to_upload_mimes', 10, 1 );


//allow custom field view despite acf

add_filter( 'acf/settings/remove_wp_meta_box', '__return_false' );


function footer_learn_more(){
  $html = '<h2>FOO</h2>';
  return $html;
}

//auto create tag on creation of story using the title of the story

function create_partner_tag( $post_id, $post, $update ) {
    $post_type = get_post_type($post_id);
    if ($post_type === 'post' && has_category('Our Stories')){
      $title = $post->post_title;
      wp_insert_term( $title, 'post_tag', null);
    }
}

add_action( 'save_post', 'create_partner_tag', 10, 3 );


//facet pagination change 
function my_facetwp_pager_html( $output, $params ) {
    $output = '';
    $page = $params['page'];
    $total_pages = $params['total_pages'];
    if ($total_pages > 1){
      $output .= '<a class="facetwp-page" data-page="' . ($page - 1) . '"><i class="angle-left"></i>Prev</a>';
      $output .= '<div class="facetwp-pages-list">' . facet_page_maker($total_pages) . '</div>';
      $output .= '<a class="facetwp-page" data-page="' . ($page + 1) . '">Next<i class="angle-right"></i></a>';
    }
    return $output;
}

add_filter( 'facetwp_pager_html', 'my_facetwp_pager_html', 10, 2 );

function facet_page_maker($total_pages){
  $pages = '';  
  $url = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
  for ($i = 1; $i < $total_pages+1; $i++){
    $pages .= '<a class="page_num" href="'. $url . '?fwp_paged=' . $i . '">' . $i . '</a>';
  }
  return $pages;
}

//facet count 
add_filter( 'facetwp_result_count', function( $output, $params ) {
    $output = 'Displaying ' . $params['lower'] . '-' . $params['upper'] . ' of ' . $params['total'] . ' stories';
    return $output;
}, 10, 2 );


//story browser include/exclude rules

add_filter( 'facetwp_index_row', function( $params, $class ) {
    if ( 'parent_services' == $params['facet_name'] ) {
        $included_terms = array( 'Inspire', 'Amplify', 'Design','Empower' );
         if ( ! in_array( $params['facet_display_value'], $included_terms ) ) {
            return false;
        }
    }
    if ( 'services' == $params['facet_name'] ) {
        $excluded_terms = array( 'Inspire', 'Amplify', 'Design','Empower' );
        if ( in_array( $params['facet_display_value'], $excluded_terms ) ) {
            return false;
        }
    }
    return $params;
}, 10, 2 );


//fix cut paste drama from https://jonathannicol.com/blog/2015/02/19/clean-pasted-text-in-wordpress/
add_filter('tiny_mce_before_init','configure_tinymce');

/**
 * Customize TinyMCE's configuration
 *
 * @param   array
 * @return  array
 */
function configure_tinymce($in) {
  $in['paste_preprocess'] = "function(plugin, args){
    // Strip all HTML tags except those we have whitelisted
    var whitelist = 'p,b,strong,i,em,h2,h3,h4,h5,h6,ul,li,ol,a,href';
    var stripped = jQuery('<div>' + args.content + '</div>');
    var els = stripped.find('*').not(whitelist);
    for (var i = els.length - 1; i >= 0; i--) {
      var e = els[i];
      jQuery(e).replaceWith(e.innerHTML);
    }
    // Strip all class and id attributes
    stripped.find('*').removeAttr('id').removeAttr('class').removeAttr('style');
    // Return the clean HTML
    args.content = stripped.html();
  }";
  return $in;
}


//add additional sizes to media embed
//when images don't get created at the right dimensions https://wordpress.stackexchange.com/questions/173271/use-exact-image-size-using-add-image-size
function img_update() {
    global $content_width;

    if ( isset( $content_width ) )
    {
        $content_width = 1300;//this thing is needed but super weird
    }

    if ( function_exists( 'add_image_size' ) ) {
      add_image_size( 'partner-thumb', 605); 
      add_image_size( 'very-grande', 1255); 
      add_image_size( 'story', 925); 
    }
}
add_action( 'after_setup_theme', 'img_update', 11 );

 
function alp_custom_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'story' => __( 'Story' ), 
        'partner-thumb' => __('Partner Thumb'),       
        'very-grande' => __('Grande'),       
    ) );
}

add_filter( 'image_size_names_choose', 'alp_custom_sizes' );

//NON FUNCTIONAL
function related_posts(){
  $orig_post = $post;
  global $post;
  $tags = wp_get_post_tags($post->ID);
  $tag_ids = array();
  foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id; 
    $args = array(
      'tag__in' => $tag_ids,
      'post__not_in' => array($post->ID),
      'posts_per_page'=>4, // Number of related posts to display.
      'caller_get_posts'=>1
    );
   
  $my_query = new wp_query( $args );
 
  while( $my_query->have_posts() ) {

  }
}


//secret google drive stuff

function alp_google_drive(){
  global $post;
    if( have_rows('folder') ):    
      $html = '<div class="accordion" id="accordionFiles">';
      while ( have_rows('folder') ) : the_row();         
          $index = get_row_index();
          $title = get_sub_field('title');
          $description = get_sub_field('description');
          $folder_url = get_sub_field('folder_id');
          $html .= '<div class="card"><div class="card-header" id="heading-' . $index . '"><h2><button class="btn btn-alp" type="button" data-toggle="collapse" data-target="#collapse-'.$index.'" aria-expanded="true" aria-controls="collapse'.$index.'">'. get_sub_field('title') .'</button></h2></div>';      
          // Your loop code
          $html .= '<div id="collapse-'.$index.'" class="collapse" aria-labelledby="heading-'.$index.'" data-parent="#accordionExample"><div class="card-body">' . get_sub_field('description');
          $html .= '</div><iframe src="https://drive.google.com/embeddedfolderview?id='.$folder_url.'#list" frameborder="0" width="100%" height="500px" scrolling="auto"></iframe></div>';
      endwhile;
    $html .= '</div>';
    else :
        // no rows found
    endif;  
  return $html;
}

//TRAINING LAND

function alp_training_blocks(){
  $x = 1;

  while($x <= 6) {
    echo alp_training_block_name($x);
    echo "<div id='accordion'><div id='collapse-{$x}' class='collapse' data-parent='#accordion'>" . alp_training_block_description($x);
    echo alp_training_block_month($x) . "</div>";
    $x++;
  }

}

function alp_training_block_name($number){
   $title = get_field('block_' . $number . '_title');
   return "<h2>  <a class='btn btn-dark btn-alp' data-toggle='collapse' href='#collapse-{$number}' role='button' aria-expanded='false' aria-controls='collapse-{$number}'>
{$title}</a></h2>";
}

function alp_training_block_description($number){
   $description = get_field('block_' . $number . '_description');
   return "<div class='block-description'>{$description}</div>";
}

function alp_training_block_month($number){
   $html = '';
   $x = 1;
  while($x <= 3) {
    $month = get_field('block_' . $number . '_month_' . $x);
   if(get_field('show_b'.$number.'m'.$x) != 'Hide'){
       $html .= "<h3 class='month'>{$month}</h3>";
       $html .= alp_offering_details_repeater($number, $x);
   }
    $x++;
  }
  return $html;
  
}


function alp_offering_details_repeater($number, $month_num){
  //table-sm if reduce padding
  $html = '<table class="table table-striped ">
  <thead class="thead-alp">
    <tr>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Date</th>
      <th scope="col">Time</th>
      <th scope="col">Link</th>
    </tr>
  </thead>';
  //b1m1_offering_details
  $field = 'b' . $number . 'm' . $month_num . '_offering_details';
  if( have_rows($field) ):

      // Loop through rows.
      while( have_rows($field) ) : the_row();
          // Load sub field value.
        if(get_sub_field('visible') != 'Hide'){
          $start = get_sub_field('start_time');
          $end = get_sub_field('end_time');
          $time = "<td class='time'>{$start}-{$end} CT</td>";
          $date = '<td class="date">' . get_sub_field('date') . '</td>';
          $title = get_sub_field('title');
          $title_block = '<td class="title">' . $title . '</td>';
          $description = '<td class="description">' .get_sub_field('description') . '</td>';
          $url = get_sub_field('registration_link');
          $link = "<td class='link'><a href='{$url}' aria-label='Register for {$title}'>Register</a></td>";
          $html .= "<tr class='event'>{$title_block}{$description}{$date}{$time}{$link}</tr>";
          // Do something...

        }
        
      // End loop.
      endwhile;
      return $html . '</table>';
    // No value.
    else :
        // Do something...
    endif;
  }


function alp_alliance_blocks(){
   $html = '';
   $types = array();
   $themes = array();
    if( have_rows('sessions') ):

        // Loop through rows.
        while( have_rows('sessions') ) : the_row();
            // Load sub field value.
            $title = get_sub_field('session_title');
            $type  = get_sub_field('session_type');
            array_push($types, $type);
            $theme = implode(', ',get_sub_field('session_theme'));
            //NEED TO ADD SINGLE ITEM LOOP HERE TO LOAD Array
            $themes = array_merge($themes, get_sub_field('session_theme'));
            $link  = get_sub_field('registration_link');
            $recording = get_sub_field('session_recording');
            if($recording){
              $tense = 'past';
              $description = get_sub_field('session_description');
              $date_block = "<div class='alliance-date'>                  
                </div> ";
             
            } else {
              $tense = 'future';
              $description = get_sub_field('session_description');
              $date = get_sub_field('date');
              $start_time = get_sub_field('start_time');
              $end_time = get_sub_field('end_time');
              $time_zone = get_sub_field('time_zone');
              $date_block = "<div class='alliance-date'>
                  <h3>{$date}</h3> 
                  <h4>{$start_time} to {$end_time} {$time_zone}</h4>
                </div> ";
            }
            if (!$recording){
              $action = "<a class='btn btn-alp btn-dark alliance-registration' href='{$link}' title='Register for {$title}'>Register</a>";
            } else {
              $action = "<a class='btn btn-alp btn-dark alliance-recording' href='{$recording}' title='See the archived recording for {$title}''>Archived Recording</a>";
            }
            $html .= "
            <div class='alliance-row row {$tense}'>
              <div class='col-md-12'><h2 class='first-home-header'>{$title}</h2></div>
              <div class='col-md-4 {$theme}'> 
                {$date_block}              
                <div class='alliance-details'>
                  <div class='alliance-type'>{$type}</div>
                  <div class='alliance-theme'>{$theme}</div>
                </div>
              </div>
              <div class='col-md-8 alliance-description'>
                {$description}
              </div>
              <div class='col-md-12 alliance-action'>
                {$action}
              </div>
            </div>
            ";
            // Do something...
        // End loop.
        endwhile;
        alp_alliance_types($types, 'Webinar Type');
        alp_alliance_types($themes, 'Theme');
        return $html;
      // No value.
      else :
          // Do something...
      endif;
}

function alp_alliance_types($array, $title){
  $unique = array_unique($array);
  $html = "<h2 class='first-home-header alliance-search'>{$title}</h2>";
  foreach ($unique as $type) {
    $clean = sanitize_title($type);
    $html .= "<button class='btn btn-search' id='{$clean}'>{$type}</button>";
  }
  echo $html;
}

add_filter('acf/load_field/name=sessions', 'make_it_collapse');
  function make_it_collapse($field) {
    $field['collapsed'] = 'sessions';
    return $field;
  }


// <table class="table">
//   <thead>
//     <tr>
//       <th scope="col">#</th>
//       <th scope="col">First</th>
//       <th scope="col">Last</th>
//       <th scope="col">Handle</th>
//     </tr>
//   </thead>


  //save acf json
    add_filter('acf/settings/save_json', 'alp_json_save_point');
     
    function alp_json_save_point( $path ) {
        
        // update path
        $path = get_stylesheet_directory() . '/acf-json'; //replace w get_stylesheet_directory() for theme
        
        
        // return
        return $path;
        
    }


    // load acf json
    add_filter('acf/settings/load_json', 'alp_json_load_point');

    function alp_json_load_point( $paths ) {
        
        // remove original path (optional)
        unset($paths[0]);
        
        
        // append path
        $paths[] = get_stylesheet_directory()  . '/acf-json';//replace w get_stylesheet_directory() for theme
        
        
        // return
        return $paths;
        
    }


//calendar work

function alp_facilitator_label($ids){
  if(count($ids) > 1){
    return "Facilitators";
  } else {
    return "Facilitator";
  }
}

function alp_event_registration(){
  global $post;
  $past = alp_tribe_is_past_event( $post->ID);
  if(get_field('registration_link') && $past != TRUE){
    $link = get_field('registration_link');
    return "<a class='btn btn-alp btn-learn btn-register-event' href='{$link}''>Register</a>";
  }
}

function alp_event_video(){
  global $post;
  if(get_field('archive_video_link', $post->ID)){
    $video = get_field('archive_video_link', $post->ID);
    return wp_oembed_get($video);
  }
}

//from https://theeventscalendar.com/support/forums/topic/check-if-event-has-passed/
 // Usage tribe_is_past_event( $event_id )
function alp_tribe_is_past_event( $event = null ){
  // date_default_timezone_set("America/New_York");
  // echo "The time is " . date("h:i:sa");
  if ( ! tribe_is_event( $event ) ){
    return false;
  }
  $event = tribe_events_get_event( $event );
  $event_time_zone = get_post_meta( $event->ID, '_EventTimezone', true );
  date_default_timezone_set($event_time_zone);
  // Grab the event End Date as UNIX time
  $end_date = tribe_get_end_date( $event, '', 'UTC');
  if(time() > $end_date){
    return TRUE;//has expired
  } else {
    return FALSE;//still live
  }
}

//change organizer to facilitator
add_filter( 'tribe_organizer_label_singular', function() { return 'Facilitator'; } );
add_filter( 'tribe_organizer_label_singular_lowercase', function() { return 'facilitator'; } );
add_filter( 'tribe_organizer_label_plural', function() { return 'Facilitators'; } );
add_filter( 'tribe_organizer_label_plural_lowercase', function() { return 'facilitators'; } );

//deals with non-function facet query that was pulling in events for some reason
add_filter( 'facetwp_is_main_query', function( $is_main_query, $query ) {
    if ( 'tribe_events' == $query->get( 'post_type' ) ) {
        $is_main_query = false;
    }
    return $is_main_query;
}, 10, 2 );


//video additions for services
function get_service_video(){
  global $post;
  if(get_field('service_video', $post->ID)){
    $video = get_field('service_video', $post->ID);
    return wp_oembed_get($video);
  }
}


//podcast tweaks
function alp_show_podcasts(){
  $html = '';
  if( have_rows('podcasts') ):

      // Loop through rows.
      while( have_rows('podcasts') ) : the_row();

          // Load sub field value.
          $title = get_sub_field('podcast_title');
          $description = get_sub_field('podcast_description');
          $image = get_sub_field('podcast_image');
          $slug = sanitize_title($title);
          $itunes = alp_podcast_service(get_sub_field_object('apple_podcast_url'));
          $spotify = alp_podcast_service(get_sub_field_object('spotify_podcast_url'));
          $youtube = alp_podcast_service(get_sub_field_object('youtube_podcast_url'));
          $spreaker = get_sub_field('spreaker_url');
          $html .= "
            <div class='row'>
              <div class='col-md-12'>
                <h2 id='{$slug}' class='lead trio-header'>{$title}</h2>
              </div>
              <div class='col-md-5'>
                <img src='{$image}' class='img-fluid' alt=''>
              </div>
              <div class='col-md-7'>
                {$description}
                <div class='subscriptions' style='display: flex; flex-wrap: wrap; justify-content: space-between;'>
                  {$itunes}{$spotify}{$youtube}
                  <div class='podcast-episodes' id='{$slug}-episodes' data-url='{$spreaker}'>
                  </div>
                </div>
              </div>
            </div>
          ";
          // Do something...
      // End loop.
      endwhile;
      return $html;
    // No value.
    else :
        // Do something...
    endif;
}


function alp_podcast_service($field){
  if($field['value'] !=''){
    //var_dump($field);
    $service = $field['label'];
    $url = $field['value'];
    $img = THEME_IMG_PATH . 'podcast/' . $field['_name'] .'.svg';
    return "<a href='{$url}' title='Listen on {$service}s.'><img src='$img' class='img-fluid podcast-icon' alt='{$service} icon.'></a>";
  }
}


function alp_remove_www($string){
  $string = strtolower($string);
  if(str_contains($string, 'www.')){
    $string = str_replace('www.', '', $string);
    return $string;
  }
  return $string;
}



//topic functions
function alp_topic_menu(){
  $menu_title = (get_field('menu_title') !='' ? get_field('menu_title') : 'Resources');
  if ( have_rows('content') ) {
    echo "<div class='menu-block'>
    <h2 class='trio-header'>{$menu_title}</h2>
    <ul class='sub-topic-list'>";
     while( have_rows('content') ) : the_row(); 
      if( get_row_layout() == 'sub_topic'){
        $title = get_sub_field('sub_topic_title');
        alp_topic_menu_title($title);
      }
      if( get_row_layout() == 'image'){
        $title = get_sub_field('title');
        alp_topic_menu_title($title);
      }
      if( get_row_layout() == 'full_block'){
        $title = get_sub_field('title');
        alp_topic_menu_title($title);
      }
      if( get_row_layout() == 'accordion'){
        $title = get_sub_field('accordion_title');
        alp_topic_menu_title($title);
      }
      if( get_row_layout() == 'posts'){
        $title = get_sub_field('title');
        alp_topic_menu_title($title);
      }
      if( get_row_layout() == 'people'){
        $title = get_sub_field('title');
        alp_topic_menu_title($title);
      }
        if( get_row_layout() == 'two_column'){
        $title = get_sub_field('title');
        alp_topic_menu_title($title);
      }
       if( get_row_layout() == 'resources'){
        $title = get_sub_field('title');
        alp_topic_menu_title($title);
      }
  
     endwhile;
  echo "</ul></div>";
  }
}
 
 function alp_topic_menu_title($title){
  if($title){
    $slug = sanitize_title($title);
        echo "      
          <li class='sub-topic'>
            <a href='#{$slug}'>{$title}</a>
          </li>
      ";
  }
 }

/*column size for topics - if has/doesn't have resources*/
function alp_topic_row_size($resources){
  if($resources !=''){
    return '6';
  } else {
    return '10 offset-md-1';
  }

}