<article class="post-article text-white m-auto">
<?php the_post_thumbnail('thumbnail', array('class' => 'post-thumbnail img-fluid rounded')); ?>
<div class="d-flex mt-3" style="font-size: 14px">
    <p class=""><?php print_r(get_the_category()[0]->name); ?></p>
    <p class="ms-2 me-2">•</p>
    <p class=""><?php echo get_the_date(); ?></p>
</div>
<h1 class="mt-4 mb-4"><?php the_title();?></h1>

<p class="">By <?php /*the_author()*/ echo 'Richmond Claude Bodot';?></p>

<?php the_content(); ?>
</article>