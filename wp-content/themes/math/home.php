<?php
/*
Template Name: Home
*/
?>
<?php get_header(); ?>

<div class="row">
    <div id="callout" class="col-sm-10 col-sm-offset-1 flush">
        <?php echo do_shortcode('[tt_hp_message]'); ?>
    </div>
</div> <!--row-->

<div id="slider-wrap" class="row">
    <div id="slider" class="col-sm-10 col-sm-offset-1 flush">
        <?php echo do_shortcode('[metaslider id=1220]'); ?>
        
	</div>
</div> <!--row-->

<div class="row">
    <div id="quicklink-wrap" class="col-sm-10 col-sm-offset-1">
        <div class="row">
            <a href="#">
                <div class="quicklink col-sm-12">
                    <p class="bucket-text">Math Monkey is unlike any other math enrichment program. Our program is designed to get students excited about math. Combining game-based lessons with savvy, mental strategies gives our students the confidence they need to succeed.</p>
                </div>
            </a>
        </div>
    </div>
</div>


<div class="row">
    <div id="main" class="col-sm-10 col-sm-offset-1 flush">
        <div id="content" class="col-sm-8">
            <img class="flush" src="<?php echo get_stylesheet_directory_uri(); ?>/images/front.png" width="100%">
            <p>At Math Monkey of Leawood we want our student to think rather than just memorize. While in class, students learn more than one way to solve a problem. By showing students multiple ways to solve a problem their understanding of how numbers work will grow. These mental strategies will help build confidence, speed, problem solving and reasoning skills. Math Monkey does not simply teach rote memorization. 

We place each student in classes based on where they ARE, rather than age or grade. This makes our program a great fit for students that may have lost confidence to those that are gifted and need to be challenged.</p>
        </div>
            
   
<?php get_template_part( 'tt', 'sidebar-main' ); ?>
        
        
        
  </div><!--main-->  
</div><!--row-->

<?php get_template_part( 'what', 'we-do' ); ?>

<?php get_footer() ?>
