<?php
/*
Author: 2020 Creative
URL: htp://2020creative.com
*/
//////////////////////////////////////////////////////////////////////////////////////////////////////////////// 2020 Shortcodes


//////////////////////////////////////////////////////// TT Post Content

add_shortcode( 'post_info', 'post_info' );
function post_info ( $atts ) {

    // Attributes
    extract( shortcode_atts(
        array(
            'name' => '',
            'id' => '',
        ), $atts )
    );
    
    $tt_post_content = get_post_field( 'post_content', $id );
    
// code
return $tt_post_content;    
}

////////////////////////////////////////////////////////

//////////////////////////////////////////////////////// TT Post Feed

add_shortcode( 'tt_posts', 'tt_posts' ); // echo do_shortcode('[tt_posts limit="-1" cat_name="home"]');
function tt_posts ( $atts ) {

    // Attributes
    extract( shortcode_atts(
        array(
            'name' => 'post',
            'cat' => '-1',
            'cat_name' => '',
            'limit' => '10',
            'type' => 'post',
        ), $atts )
    );
    
    /////////////////////////////////////// Variables
$user_ID = get_current_user_id();
$user_data = get_user_meta( $user_ID );
$user_photo_id = $user_data[photo][0];
$user_photo_url = wp_get_attachment_url( $user_photo_id );
$user_photo_img = '<img src="' . $user_photo_url . '">';

/////////////////////////////////////// All Query    
if ($name == 'post') {
    // The Query
$args = array(
    'post_type' => $type,
    'post_status' => 'publish',
    'order' => 'ASC',
    'posts_per_page' => $limit,
    'cat' => $cat,
    'category_name' => $cat_name,
);
$the_query = new WP_Query( $args );
} else { 
    //nothing
    }
    
global $post;

// pre loop
//$output = '<ul>';    

// The Loop
if ( $the_query->have_posts() ) {
    while ( $the_query->have_posts() ) {
        $the_query->the_post();
        // pull meta for each post
        $post_id = get_the_ID();
        $permalink = get_permalink( $id );
        $post = get_post();
        //$image = the_post_thumbnail( 'thumbnail' );
        $size = '250,125';
        $image = get_the_post_thumbnail( $post_id, $size, $attr );
        if (empty( $image )) {
            $image = '<img src="/wp-content/themes/math/images/img-fpo.png">';
        }
         
        
//HTML
        
    $output .= '<a href="'.$permalink.'"><div class="list-wrap"><div class="list-img col-xs-12 col-sm-4">';  
    $output .= $image .
                '</div>'.
                '<div class="row col-xs-12 col-sm-8">'. 
                    '<h2>'. $post->post_title .'</h2>'.
                    '<p>'. $post->excerpt .'</p>'.
                '</div></div>'.
                '</a>'.
                '<div class="clearfix"></div>';


    }
} else {
    // no posts found
    //echo '<h2>No ' . $type . ' found</h2>';
}
    // after loop
    //$output .= '</ul>';
    
/* Restore original Post Data */
wp_reset_postdata();
return $output;
}

////////////////////////////////////////////////////////

//////////////////////////////////////////////////////// TT Homepage Message 1

add_shortcode( 'tt_hp_message', 'tt_hp_message' ); // echo do_shortcode('[tt_shortcode limit="-1" cat_name="home"]');
function tt_hp_message ( $atts ) {

    // Attributes
    extract( shortcode_atts(
        array(
            'name' => 'post',
            'cat' => '-1',
            'cat_name' => 'message',
            'limit' => '1',
            'type' => 'post',
            'click' => 'y',
        ), $atts )
    );
    
    /////////////////////////////////////// Variables
$user_ID = get_current_user_id();
$user_data = get_user_meta( $user_ID );
$user_photo_id = $user_data[photo][0];
$user_photo_url = wp_get_attachment_url( $user_photo_id );
$user_photo_img = '<img src="' . $user_photo_url . '">';

/////////////////////////////////////// All Query    
if ($name == 'post') {
    // The Query
$args = array(
    'post_type' => $type,
    'post_status' => 'publish',
    'order' => 'ASC',
    'posts_per_page' => $limit,
    'cat' => $cat,
    'category_name' => $cat_name,
);
$the_query = new WP_Query( $args );
} else { 
    //nothing
    }
    
global $post;

// pre loop
//$output = '<ul>';    

// The Loop
if ( $the_query->have_posts() ) {
    while ( $the_query->have_posts() ) {
        $the_query->the_post();
        // pull meta for each post
        $post_id = get_the_ID();
        $permalink = get_permalink( $id );
        $post = get_post();
        //$image = the_post_thumbnail( 'thumbnail' );
        $size = '250,125';
        $has_feature_img = has_post_thumbnail( $post_id );
        $message_link = get_post_meta( $post_id, 'message_link' );
        $message_link_show = get_post_meta( $post_id, 'message_link_show' );

        //HTML
        if ( $has_feature_img == 'true') {
        
            $post_thumbnail_id = get_post_thumbnail_id( $post_id );
            $image = get_the_post_thumbnail( $post_id, $size, $attr );
            $img_url = wp_get_attachment_image_src( $post_thumbnail_id );
            $img = '<img class="" src="'.$img_url[0].'"/> ';
            
        } else {
            
            $img = '';
            $style = 'text-align:center;';
            
        }
        if ( $message_link_show[0] == 'y' ) {
            
            $output .= '<div class="hp-message">
                    '.$img.'<span class="message"> '. $post->post_title.' <a class="btn btn-success btn-xs" href="'.$message_link[0].'">click for details</a></span>
                </div>';
            
        } else {  
    
        $output .= '<div class="hp-message">
                    '.$img.'<span class="message"> '. $post->post_title.'</span>
                </div>';
          }

    }
} else {
    // no posts found
    
}
    // after loop
    //$output .= '</ul>';
    
/* Restore original Post Data */
wp_reset_postdata();
return $output;
}

/////////////////////////////////////////////////////////////////////////

//////////////////////////////////////////////////////// TT rule
add_shortcode( 'tt_rule', 'tt_rule' ); //line
function tt_rule($atts, $content = null) {
    extract(shortcode_atts(array(
        'size'   => '1px',
        'color'  => '#ccc',
        'classes'  => 'col-sm-12 rule',
    ), $atts ) );
    return '<div class="' . $classes . '" style="border-top:' . $size . ' solid ' . $color .';padding:1.0em 0;"></div>';
}

////////////////////////////////////////////////////////


//////////////////////////////////////////////////////// Login check

add_shortcode( 'tt_login_check', 'tt_login_check' );
function tt_login_check ( $atts ) {
    // Attributes
    extract(shortcode_atts(
        array(
            'allow_user' => '',
            'allow_role' => '',
            'allow_meta' => '',
            'allow_meta_key' => '',
        ), $atts )
    );
    
    $current_user = wp_get_current_user();
    $current_user_data = get_userdata( $current_user->ID );
    $sub = get_user_meta($current_user->ID, 'ue_sub');
    $user_roles = $current_user->roles;
    $user_role = array_shift($user_roles);
    
    if ( is_user_logged_in() ) { 
        return '<p>you are logged in as '.$current_user_data->user_login.'</p>';
    } else {
        return '<p>You must be logged in to view this content, please <a class="btn btn-small" href="/login">login</a> here.</p>';
    }
}

////////////////////////////////////////////////////////


//////////////////////////////////////////////////////// Login content
add_shortcode( 'tt_login_content', 'tt_login_content' );
function tt_login_content ( $atts, $content = null ) {
    // Attributes
    extract( shortcode_atts(
        array(
            'allow_user' => '',
            'allow_role' => '',
            'allow_meta' => '',
            'allow_meta_key' => '',
            'logged_in' => '',
            'logged_out' => '',
        ), $atts )
    );
    
    $current_user = wp_get_current_user();
    $current_user_data = get_userdata( $current_user->ID );
    $tt_user_id = get_user_meta($current_user->ID, 'tt_user_id', true);
    $user_roles = $current_user->roles;
    $user_role = array_shift($user_roles);
    $user_meta_custom = get_user_meta($current_user->ID, $allow_meta_key, true);
    
    if ( is_user_logged_in() ) { 
        $tt_logged_in = 'y';    
    } else {
        $tt_logged_in = 'n';
    }    
    
    if ($allow_role == $user_role ||
        $allow_meta == $user_meta_custom ||
        $allow_user == $current_user_data->user_login ) { 
        
        return '<p>'.$content.'</p>';   
        
    } elseif ( $logged_out == 'show' && $tt_logged_in == 'n' )  {
        
        return '<p>'.$content.'</p>';   
        
    } elseif ( $logged_in == 'show' && $tt_logged_in == 'y' )  {
        
        return '<p>'.$content.'</p>';   
        
    } else {
        //nothing
    }
        
        
       
}
////////////////////////////////////////////////////////
//////////////////////////////////////////////////////// Login content
add_shortcode( 'tt_sub_reg', 'tt_sub_reg' );
function tt_sub_reg ( $atts ) {
    // Attributes
    extract( shortcode_atts(
        array(
            'name' => '',
            
        ), $atts )
    );
    
    $current_user = wp_get_current_user();
    $current_user_data = get_userdata( $current_user->ID );
    $sub = get_user_meta($current_user->ID, 'ue_sub', true);
    $user_roles = $current_user->roles;
    $user_role = array_shift($user_roles);
    $user_meta_custom = get_user_meta($current_user->ID, $allow_meta_key, true);
    
    if ( $sub == 'sub' || $current_user_data->user_login == '2020' || $current_user_data->user_login == 'estimating' || $user_role == 'administrator' ) { 
        
        // opportunities go here
        return do_shortcode('[tt_estimates]');
    }
}

////////////////////////////////////////////////////////

//////////////////////////////////////////////////////// Login content
add_shortcode( 'tt_login_form', 'tt_login_form' );
function tt_login_form ( $atts ) {
    // Attributes
    extract( shortcode_atts(
        array(
            'name' => '',
        ), $atts )
    );
    
    if ( !is_user_logged_in() ) { 
        $pass_link = wp_lostpassword_url( get_permalink() );    
        return wp_login_form( array( 'echo' => false ) ).
        '<a class="btn btn-sm" href="'.$pass_link.'" title="Lost Password">Forgot Password?</a>';
    } 
}
    
    
////////////////////////////////////////////////////////
