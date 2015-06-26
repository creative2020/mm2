<?php get_header(); ?>

<?php
	$post_id = get_the_ID();
	$post_type = get_post_type( $post_id );
    $category = get_the_category();
    $cat_name = $category[0]->category_nicename;
?>

<?php get_header(); ?>

<div class="row">
<!--
    <div id="callout" class="col-sm-10 col-sm-offset-1 flush">
        <h3 class="callout-message">Climb higher!</h3>
    </div>
-->
</div> <!--row-->

<div class="row">
    <div id="main" class="col-sm-10 col-sm-offset-1">
        
           
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
            else if ( in_category( 'aha' ) ) {
                    get_template_part( 'content', 'aha' );
                }
			else if ( $post_type = 'Aha' ) {
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

         
                    
   

        
        
        
  </div><!--main-->  
</div><!--row-->

<?php get_footer() ?>