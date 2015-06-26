<?php get_header(); ?> <!-- Search results page template -->
<?php
$post_id = get_the_ID();
$post_thumbnail_id = get_post_thumbnail_id( $post_id );
$attachment_url = wp_get_attachment_url( $post_thumbnail_id );

if (empty($attachment_url)) {
    $attachment_url = get_template_directory_uri().'/images/icon-image-pm.png';
} else {
    //nothing
}
?>

<div class="row">
    <div id="page-header" class="col-sm-10 col-sm-offset-1 flush">
        <h1 class="page-title"><?php printf( __( 'Search Results for: %s', '' ), get_search_query() ); ?></h1>
    </div>
</div> <!--row-->

<div class="row">
    <div id="main" class="col-sm-10 col-sm-offset-1 flush">
        <div id="content" class="col-sm-12">
           <?php
			// Start the loop.
			if (have_posts()) : while (have_posts()) : the_post();
			
				get_template_part( 'content', 'search' );
                
                

				// End the loop.
				endwhile;

				// Previous/next page navigation.
				the_posts_pagination( array(
					'prev_text'          => __( 'Previous page', '' ),
					'next_text'          => __( 'Next page', '' ),
					'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', '' ) . ' </span>',
				) );
	
				// If no content, include the "No posts found" template.
				else :
					get_template_part( 'content', 'none' );
		
			endif;
		?> 
        </div>
         
  </div><!--main-->  
</div><!--row-->
                
			
<?php get_footer() ?>				