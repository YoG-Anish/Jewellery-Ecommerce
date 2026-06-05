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

        <!-- Dynamic Product Grid -->
        <?php if (have_posts()) : ?>
            <div class="product-grid">
                <?php
                woocommerce_product_loop_start(); // Standard Woo wrapper
                while (have_posts()) : the_post();
                    wc_get_template_part('content', 'product'); // Loads your standard product card
                endwhile;
                woocommerce_product_loop_end();
                ?>
            </div>
            
            <!-- Simple Pagination -->
            <div class="blog-pagination">
                <?php echo paginate_links(); ?>
            </div>

        <?php else : ?>
            <div class="no-results">
                <p>Sorry, we couldn't find any products matching your search.</p>
                <a href="<?php echo wc_get_page_permalink('shop'); ?>" class="btn-primary">Back to Shop</a>
            </div>
        <?php endif; ?>
        
    </div>
</main>

<?php get_footer(); ?>