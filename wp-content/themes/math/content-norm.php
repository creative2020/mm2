<?php 
    $post_id = get_the_ID();
    $tt_pre_title = '';
    $icon_size = '6.0em';
    $font_color = '#79A99C';
    $bg_color = '#F7F7F7';
    $size = 'thumbnail';
    $post_thumbnail_id = get_post_thumbnail_id( $post_id );
    $image_info = wp_get_attachment_image_src( $post_thumbnail_id, $size, $icon );

    // default icons
    if ( in_category('aha') ) {
        $tt_icon = 'bullhorn';
    }
    else if ( in_category('news') ) {
        $tt_icon = 'newspaper-o';
    }
    else  {
        $tt_icon = 'newspaper-o';
    }
    $tt_icon_name = get_post_meta( $post_id, 'tt_icon' );
        if ( $tt_icon_name[0] != null ) {
            $tt_icon = $tt_icon_name[0];
        }

?>        

<!--Single-->
    <?php if ( is_single() ) { ?>
     
        <div class="row">
    <div id="page-header" class="col-sm-12">
        <h1 class="page-title"><?php the_title(); ?></h1>
    </div>
</div> <!--row-->

<div id="content" class="col-sm-12">

	<div class="row"> <!--row-->
	    <div class="section clearfix">
	        
	        <div class="col-sm-12">
		        
		        <?php 
			        $cat_list = get_the_category_list();
			        
			        if ( empty($cat_list) ) {
			        
			        //do nothing
		        } else {
			        
			        print_r($cat_list);
	            
		            echo do_shortcode('[tt_rule]');
		            
		               echo '<div class=""><p>' . get_the_category_list() .'</p></div>';
		            
		            echo do_shortcode('[tt_rule]');
	            
	            } ?>
	            
	                <?php the_content(); ?> 
	            
	            <?php echo do_shortcode('[tt_rule]'); ?>
	            
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
                    
    <div class="row tt-search excerpt-<?php echo $cat_name ?>" style="background:<?php echo $bg_color; ?>;">
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
            <a class="btn btn-warning btn-sm" href="<?php echo get_the_permalink() ?>">Read full article</a>
        </div>
        
    </div>
</a>

<?php } ?> <!--post-->
