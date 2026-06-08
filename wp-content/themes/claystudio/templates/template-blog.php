<?php
/*
    Template Name: Blog
*/
get_header();
?>

<main class="blog-padding">
    <!-- Blog Header -->
    <section class="blog-hero">
        <div class="container">
            <span class="sub-heading">Journal</span>
            <h1>FROM THE STUDIO</h1>
            <p class="blog-intro">
                Insights into our creative process, styling tips, and the stories
                behind our handcrafted pieces.
            </p>
        </div>
    </section>

    <!-- Blog Grid -->
    <section class="blog-grid-section">
        <div class="container">
            <div class="blog-grid">
                <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                $args = array(
                    'post_type' => 'clay_blog',
                    'posts_per_page' => 3,
                    'paged'          => $paged,
                );
                $blog_query = new WP_Query($args);
                if ($blog_query->have_posts()) :
                    while ($blog_query->have_posts()) : $blog_query->the_post(); ?>
                        <article class="blog-card">
                            <div class="blog-image">
                                <a href="<?php the_permalink(); ?>">
                                    <?php if (has_post_thumbnail()) {
                                        the_post_thumbnail('large');
                                    }
                                    ?>
                                </a>
                                <?php
                                $categories = get_the_terms(get_the_ID(), 'blog_category');
                                if ($categories && !is_wp_error($categories)) {
                                    $category_names = wp_list_pluck($categories, 'name'); ?>
                                    <span class="blog-category"><?php echo implode(', ', $category_names); ?></span>
                                <?php } ?>
                            </div>
                            <div class="blog-content">
                                <span class="blog-date"><?php echo get_the_date(); ?></span>
                                <h3>
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>
                                <p>
                                    <?php echo get_the_excerpt(); ?>
                                </p>
                                <a href="<?php the_permalink(); ?>" class="btn-underline">Read More</a>
                            </div>
                        </article>
                    <?php endwhile; ?>

                    
                <?php
                    wp_reset_postdata();
                else : ?>
                    <p>No blog posts found.</p>
                <?php endif; ?>
            </div>
            <!-- Pagination -->
                    <div class="blog-pagination">
                        <?php
                        echo paginate_links([
                            'total'   => $blog_query->max_num_pages,
                            'current' => $paged,
                            'prev_text' => 'Previous',
                            'next_text' => 'Next &rarr;',

                        ]);
                        ?>
                    </div>
        </div>
    </section>
</main>


<?php get_footer(); ?>