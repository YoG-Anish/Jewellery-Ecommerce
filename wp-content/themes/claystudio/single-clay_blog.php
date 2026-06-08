<?php get_header(); ?>

<main class="single-post-container">
    <div class="container">
        <?php
        if (have_posts()) {
            while (have_posts()) {
                the_post();
        ?>
                <article class="single-post">
                    <?php the_content(); ?>
                </article>
        <?php
            }
        }
        ?>
    </div>
</main>

<?php get_footer(); ?>