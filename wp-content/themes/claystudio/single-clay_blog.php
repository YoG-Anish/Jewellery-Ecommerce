<?php get_header(); ?>

<main class="single-post-container">
    <div class="container">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                
                <!-- 1. Categories (Using your custom taxonomy) -->
                <div class="post-meta">
                    <?php
                    $categories = get_the_terms(get_the_ID(), 'blog_category');
                    if ($categories && !is_wp_error($categories)) {
                        foreach ($categories as $cat) {
                            echo '<a href="' . esc_url(get_term_link($cat)) . '" class="blog-category">' . esc_html($cat->name) . '</a> ';
                        }
                    }
                    ?>
                    <!-- 2. Date -->
                    <span class="blog-date"><?php echo get_the_date(); ?></span>
                </div>

                <!-- 3. Title -->
                <h1 class="post-title"><?php the_title(); ?></h1>

                <!-- 4. Featured Image -->
                <?php if (has_post_thumbnail()) : ?>
                    <div class="post-featured-image">
                        <?php the_post_thumbnail('full'); ?>
                    </div>
                <?php endif; ?>

                <!-- 5. Content -->
                <div class="post-content">
                    <?php the_content(); ?>
                </div>

                <!-- 6. Post Navigation -->
                <nav class="post-navigation">
                    <div class="prev-post"><?php previous_post_link('%link', '&larr; Previous Post'); ?></div>
                    <div class="next-post"><?php next_post_link('%link', 'Next Post &rarr;'); ?></div>
                </nav>

            </article>

        <?php endwhile; endif; ?>
    </div>
</main>

<?php get_footer(); ?>