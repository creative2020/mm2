<?php
/*
Template Name: Page
*/
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
    <div id="page-header" class="col-sm-10 col-sm-offset-1 flush">
        <h1 class="page-title"><?php the_title(); ?></h1>
    </div>
</div> <!--row-->

<div class="row">
    <div id="main" class="col-sm-10 col-sm-offset-1 flush">
        <div id="content" class="col-sm-8">
           <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
      <?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
    <?php endwhile; endif; ?> 
        </div>
            
   
<?php get_template_part( 'tt', 'sidebar-main' ); ?>
        
        
        
  </div><!--main-->  
</div><!--row-->


<?php get_template_part( 'what', 'we-do' ); ?>

<?php get_footer() ?>