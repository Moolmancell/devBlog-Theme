<?php get_header(); ?>
<h1 class="text-center text-white mb-5">There are <?php
   global $wp_query;
   $not_singular = $wp_query->found_posts > 1 ? 'results' : 'result'; // if found posts is greater than one echo results(plural) else echo result (singular)
   echo $wp_query->found_posts . " $not_singular found";
?> posts with the search term "<?php echo get_search_query(); ?>"</h1>
<?php get_search_form(); ?>
<?php
if ( have_posts() ) :
    while ( have_posts() ) : the_post();
        if (is_search() && ($post->post_type=='page')) continue;
        get_template_part( 'template-parts/content', 'archive');
    endwhile;
endif;
?>

<?php get_footer(); ?>
