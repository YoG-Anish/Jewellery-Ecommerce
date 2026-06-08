<?php get_header(); ?>

<main class="single-post-container">
    <div class="container">
        <?php
        if (have_posts()) {
            while (have_posts()) {
                the_post();
        ?>
                <article class="single-post">
                    <div class="single-post-image">
                        <?php if (has_post_thumbnail()) {
                            the_post_thumbnail('large');
                        }
                        ?>
                    </div>
                    <div class="single-post-content">
                        <span class="single-post-date"><?php echo get_the_date(); ?></span>
                        <h1 class="single-post-title"><?php the_title(); ?></h1>
                    </div>
                    <?php the_content(); ?>
                </article>
        <?php
            }
        }
        ?>
    </div>
</main>

<?php get_footer(); ?>