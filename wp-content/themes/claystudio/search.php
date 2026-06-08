<?php
get_header();
global $wp_query; // This line fixes the "undefined variable" error
?>

<main class="search-results-page">
    <div class="container-1600">

        <div class="section-header">
            <h1>SEARCH RESULTS</h1>
            <p>You searched for: "<?php echo esc_html(get_search_query()); ?>"</p>
        </div>
        <!-- Re-display the search form in case they want to search again -->
        <div class="search-box-wrapper" style="margin-bottom: 50px;">
            <form action="<?php echo esc_url(home_url('/')); ?>" method="get" class="search-form">
                <input type="text" name="s" value="<?php echo get_search_query(); ?>" placeholder="Search again..." />
                <input type="hidden" name="post_type" value="product" />
                <button type="submit">Search</button>
            </form>
        </div>

        <div class="container">
            <aside class="shop-filters-wrapper">
                <?php echo do_shortcode('[fe_widget]'); ?>
            </aside>

            <!-- THIS CLASS MUST MATCH YOUR PLUGIN SETTINGS -->
            <div class="product-loop-wrapper">

                <div class="shop-layout-controls">
                    <!-- Now $wp_query is defined and this will work -->
                    <p>Showing <?php echo $wp_query->found_posts; ?> results</p>
                </div>

                <?php if (have_posts()) : ?>
                    <?php
                    woocommerce_product_loop_start();

                    while (have_posts()) : the_post();
                        wc_get_template_part('content', 'product');
                    endwhile;

                    woocommerce_product_loop_end();
                    ?>

                    <div class="blog-pagination">
                        <?php echo paginate_links(); ?>
                    </div>

                <?php else : ?>
                    <p>No products found matching your search.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>