<?php get_header(); ?>
<h1 class="text-center text-white mb-5">Blog</h1>
<?php get_search_form(); ?>
<?php
if ( have_posts() ) :
    while ( have_posts() ) : the_post();
        get_template_part( 'template-parts/content', 'archive');
    endwhile;
endif;
?>
<?php the_posts_pagination();?>
<style>
</style>
<?php get_footer(); ?>
