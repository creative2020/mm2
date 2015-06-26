<?php get_header(); ?> <!-- Archive page template -->

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
<!--
    <div id="callout" class="col-sm-10 col-sm-offset-1 flush">
        <h3 class="callout-message">Climb higher!</h3>
    </div>
-->
</div> <!--row-->

<div class="row">
    <div id="page-header" class="col-sm-10 col-sm-offset-1 flush">
        <h1 class="page-title"><?php the_title(); ?></h1>
    </div>
</div> <!--row-->

<div class="row">
    <div id="main" class="col-sm-10 col-sm-offset-1 flush">
        <div id="content" class="col-sm-8">
           <?php if ( have_posts() ) : ?>
     
			<?php
			// Start the loop.
			while ( have_posts() ) : the_post(); 
            
                        $category = get_the_category();
                        $cat_name = $category[0]->category_nicename; 
            
				/*
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */

            //check for custom content style    
            if ( in_category( 'testimonial' ) ) {
                    get_template_part( 'content', 'testimonial' );
                }
            else if ( in_category( 'Aha' ) ) {
                    get_template_part( 'content', 'aha' );
                }

            else {
                    get_template_part( 'content', 'norm' );

                    }
                
                

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
            
   
<?php get_template_part( 'tt', 'sidebar-main' ); ?>
        
        
        
  </div><!--main-->  
</div><!--row-->


<?php get_template_part( 'what', 'we-do' ); ?>

<?php get_footer() ?>