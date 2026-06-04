<?php
get_header(); ?>

<!-- 404 Main Content -->
<main class="error-page-wrapper">
    <div class="container">
        <div class="error-content">
            <span class="error-subtitle">Error 404</span>
            <h1><?php echo get_theme_mod('error_404_title'); ?></h1>
            <p class="description">
                <?php echo get_theme_mod('error_404_description'); ?>
            </p>
            <div class="error-actions">
                <a href="<?php echo home_url(); ?>" class="btn btn-primary-hero">Back to Home</a>
                <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="btn btn-outline-dark">Continue Shopping</a>
            </div>
        </div>
    </div>
</main>


<?php get_footer(); ?>