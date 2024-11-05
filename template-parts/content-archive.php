<article class="post-archive-article text-white m-auto mb-5">
<a class="d-flex flex-column justify-content-between h-100" href= <?php the_permalink(); ?>>
<?php the_post_thumbnail('thumbnail', array('class' => 'post-archive-thumbnail img-fluid rounded')); ?>
<div class="d-flex mt-3 me-3 ms-3" style="font-size: 14px">
    <p class=""><?php print_r(get_the_category()[0]->name); ?></p>
    <p class="ms-3 me-3">•</p>
    <p class=""><?php echo get_the_date(); ?></p>
</div>
<div class="post-archive-info me-3 ms-3">
    <h1 class="mt-3 m3-4"><?php the_title();?></h1>

    <p class="">By <?php /*the_author()*/ echo 'Richmond Claude Bodot';?></p>
</div>
</a>
</article>

<style>

.post-archive-article {
    height: 400px;
    max-width: 800px;
    overflow: hidden;
    position: relative;
    border-radius: 10px;
}

.post-archive-article a {
    text-decoration: none;
    color: white;
}

.post-archive-article a:hover img {
    transform: scale(1.1);
}

.post-archive-thumbnail {
    position: absolute;
    width: 100%;
    height: 100%;
    z-index: -1;
    object-fit: cover;
    filter: brightness(0.8);
    transition: transform 800ms;
}
</style>