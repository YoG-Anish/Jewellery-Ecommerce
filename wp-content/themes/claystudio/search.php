<?php get_header(); ?>

<main class="search-results-page">
    <div class="container-1600">

        <!-- Results Header -->
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
                <div class="mobile-sidebar-header">
                    <span>Filters</span>
                    <button type="button" class="close-sidebar">&times;</button>
                </div>
                <?php echo do_shortcode('[fe_widget]'); ?>
            </aside>

            <div class="product-loop-wrapper">
                <div class="shop-layout-controls">
                    <button type="button" class="mobile-filter-trigger">
                        <span class="filter-icon">☰</span> Filters
                    </button>

                    <div class="grid-switcher">
                        <button type="button" class="switch-btn" data-cols="2" title="2 Columns">
                            <span class="lines"><span></span><span></span></span>
                        </button>
                        <button type="button" class="switch-btn active" data-cols="3" title="3 Columns">
                            <span class="lines"><span></span><span></span><span></span></span>
                        </button>
                        <button type="button" class="switch-btn" data-cols="4" title="4 Columns">
                            <span class="lines"><span></span><span></span><span></span><span></span></span>
                        </button>
                    </div>
                </div>
                <?php
                if (woocommerce_product_loop()) {

                    /**
                     * Hook: woocommerce_before_shop_loop.
                     *
                     * @hooked woocommerce_output_all_notices - 10
                     * @hooked woocommerce_result_count - 20
                     * @hooked woocommerce_catalog_ordering - 30
                     */
                    do_action('woocommerce_before_shop_loop');

                    woocommerce_product_loop_start();

                    if (wc_get_loop_prop('total')) {
                        while (have_posts()) {
                            the_post();

                            /**
                             * Hook: woocommerce_shop_loop.
                             */
                            do_action('woocommerce_shop_loop');

                            wc_get_template_part('content', 'product');
                        }
                    }

                    woocommerce_product_loop_end();

                    /**
                     * Hook: woocommerce_after_shop_loop.
                     *
                     * @hooked woocommerce_pagination - 10
                     */
                    do_action('woocommerce_after_shop_loop');
                } else {
                    /**
                     * Hook: woocommerce_no_products_found.
                     *
                     * @hooked wc_no_products_found - 10
                     */
                    do_action('woocommerce_no_products_found');
                } ?>
            </div>
        </div>

    </div>
</main>

<?php get_footer(); ?>