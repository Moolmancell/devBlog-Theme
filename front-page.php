<?php get_header(); ?>
    <div id="carousel-front" class="carousel slide m-2" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li
                data-bs-target="#carousel-front"
                data-bs-slide-to="0"
                class="active"
                aria-current="true"
                aria-label="First slide"
            ></li>
            <li
                data-bs-target="#carousel-front"
                data-bs-slide-to="1"
                aria-label="Second slide"
            ></li>
            <li
                data-bs-target="#carousel-front"
                data-bs-slide-to="2"
                aria-label="Third slide"
            ></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <img
                    src="https://images.unsplash.com/photo-1557672172-298e090bd0f1?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                    class="w-100 d-block object-fit-cover"
                    alt="First slide"
                />
                <div class="carousel-content text-center">
                    <h5>Your Heading Here</h5>
                    <p>Your subheading goes here.</p>
                    <a
                    name=""
                    id=""
                    class="btn carousel-button-eLink"
                    href="#"
                    role="button"
                    >Learn More</a
                >
                </div>
            </div>
            <div class="carousel-item">
                <img
                    src="https://images.unsplash.com/photo-1533158326339-7f3cf2404354?q=80&w=1968&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                    class="w-100 d-block object-fit-cover"
                    alt="Second slide"
                />
                <div class="carousel-content text-center">
                    <h5>Your Heading Here</h5>
                    <p>Your subheading goes here.</p>
                    <a
                    name=""
                    id=""
                    class="btn carousel-button-eLink"
                    href="#"
                    role="button"
                    >Learn More</a
                >
                </div>
                
            </div>
            <div class="carousel-item">
                <img
                    src="https://media2.giphy.com/media/v1.Y2lkPTc5MGI3NjExZWRxZ2FlZXh2OHN0cGlqOXVtYjFxejhyMG1rcG4wOTR2c3B2MXQ3ayZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/26xByDTkJoIc4eAtq/giphy.webp"
                    class="w-100 d-block object-fit-cover"
                    alt="Third slide"
                />
                <div class="carousel-content text-center">
                    <h5>Your Heading Here</h5>
                    <p>Your subheading goes here.</p>
                    <a
                    name=""
                    id=""
                    class="btn carousel-button-eLink"
                    href="#"
                    role="button"
                    >Learn More</a
                >
                </div>
            </div>
        </div>
    </div>
    

    <?php
    $categories = get_categories();
    foreach($categories as $category) {
        $category_posts = new WP_Query( array(
            'category_name' => $category->slug, // Replace with your category slug
            'posts_per_page' => -1,             // Number of posts to display (-1 for all posts)
        ) );
            
        echo '<h2 class="post-category-frontpage text-white">';
        echo 'Latest ', $category->name;
        echo '</h2>';
        echo '<section class="splide category-research" aria-label="Splide Basic HTML Example">';
        echo '<div class="splide__track"><ul class="splide__list">';
        

        if ( $category_posts->have_posts() ) : ?>
            <?php $count = 0; ?>
            <?php while ( $category_posts->have_posts() and $count <= 6) : $category_posts->the_post(); ?>
            
            <li class="splide__slide">
                <a href= <?php the_permalink(); ?> >
                    <?php  echo get_the_post_thumbnail()  ?>
                    <div class="container h-100 d-flex flex-column justify-content-between text-white p-3">
                        <div class="categories-date d-flex">
                            <p class="slide-category m-0"><?php print_r(get_the_category()[0]->name); ?></p>
                            <p class="me-2 ms-2">•</p>
                            <p class="slide-date m-0"><?php echo get_the_date(); ?></p>
                        </div>
                        <p class="slide-title fs-5 m-0"><?php the_title(); ?></p>
                    </div> 
                </a>     
            </li>
            <?php $count++; 
            ?>
        <?php endwhile;
            wp_reset_postdata(); ?>
        <?php else : 
            echo 'No posts found in this category.';
        endif;

        echo '</ul>';
        echo '</div>';
        echo '</section>';
    }
    ?>
    <script>
        document.addEventListener( 'DOMContentLoaded', function() {
        let elms = document.getElementsByClassName( 'splide' );

        for ( var i = 0; i < elms.length; i++ ) {
            new Splide(elms[ i ], {
            autoWidth: true,
            type   : 'slide',
            drag   : 'free',
            arrows: false,
            pagination: false
            }).mount();
        }
});
    </script>
    <div class="newsletter-form p-4 p-md-5">
        <h1 class="newsletter-section text-white">Subscribe to our Newsletter</h1>
        <?php echo do_shortcode('[wpforms id="9"]'); ?>
    </div>
<?php get_footer(); ?>