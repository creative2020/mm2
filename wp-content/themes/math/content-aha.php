<?php 
    $post_id = get_the_ID();
    $post_type = get_post_type( $post_id );
    $tt_pre_title = 'Aha: ';
    $icon_size = '4.0em';
    $font_color = '#cccccc';
    $bg_color = '#ffffff';
    $accent_color = '#007BC4';
    $hover_color = '';
    $size = 'thumbnail';
    $post_thumbnail_id = get_post_thumbnail_id( $post_id );
    $image_info = wp_get_attachment_image_src( $post_thumbnail_id, $size, $icon );

    // default icons
    if ( in_category('aha') ) {
        $tt_icon = 'lightbulb-o';
    }
    else if ( in_category('news') ) {
        $tt_icon = 'newspaper-o';
    }
    else  {
        $tt_icon = 'lightbulb-o';
    }
    $tt_icon_name = get_post_meta( $post_id, 'tt_icon' );
        if ( $tt_icon_name[0] != null ) {
            $tt_icon = $tt_icon_name[0];
        }

?>        

<!--Single-->
    <?php if ( is_single() ) { ?>
     
        <div class="row">
    <div id="page-header" style="background-color:<?php echo $accent_color; ?>;" class="col-sm-12">
        <h1 class="page-title"><i class="fa fa-<?php echo $tt_icon; ?>" style="color:<?php echo $font_color; ?>;font-size:2.0em;"></i> <?php the_title(); ?></h1>
    </div>
</div> <!--row-->

<div id="content" class="col-sm-12">

	

	<div class="row tt-single"> <!--row-->
	    <div class="section clearfix">
	        
	        <div class="col-sm-12">
		        
		        <?php 
			        $cat_list = get_the_category_list();
			        
			        if ( empty($cat_list) ) {
			        
			        //do nothing
		        } else {
		            
		            echo '<div class="row tt-category-wrap" style="border-bottom:1px solid #cccccc;">' . get_the_category_list() . '</div>';
	            
	            } ?>
	            	<div class="row tt-content-wrap">
	                	<?php the_content(); ?> 
	            	</div>
	            
	            <div class="col-sm-12">
	<!-- 	            <button onclick="goBack()">Go Back</button> -->
						<script>
						function goBack() {
						    window.history.back();
						}
						</script>
	                <a onclick="goBack()" class="btn btn-primary btn-md pull-right" style="margin-bottom:1.0em;" href=""><i class="fa fa-arrow-circle-right"></i> Back</a>
	            </div>
	            
	        </div>
	    </div>
	</div> <!--row-->

        
</div> <!-- content -->

        <?php } else { ?>
            
<!--Single-->            

            
<!--post-->
<a href="<?php echo get_the_permalink() ?>">
                    
    <div class="row tt-loop excerpt-<?php echo $cat_name ?>" style="background:<?php echo $bg_color; ?>;">
	    
	    <style>
			.tt-loop:hover {background-color: <?php echo $hover_color ?>;}
		</style>
	    
        <div class="col-sm-2">
            <?php if ( has_post_thumbnail() ) { ?>
            
                <img src="<?php echo $image_info[0]; ?>" class="img-responsive">
            
            <?php } else { ?>
            
                <i class="fa fa-<?php echo $tt_icon; ?>" style="color:<?php echo $font_color; ?>;font-size:<?php echo $icon_size; ?>;"></i>
            
            
            <?php } ?>
        </div>

        <div class="col-sm-10">
            <h2><?php echo $tt_pre_title; ?> <?php the_title(); ?></h2>
            <div class="clearfix"><p><?php echo get_the_category_list(); ?></p></div>
            
                <p><?php the_excerpt(); ?></p>
            <a class="btn btn-warning btn-sm" href="<?php echo get_the_permalink() ?>">Read more</a>
        </div>
        
    </div>
</a>

<?php } ?> <!--post-->
