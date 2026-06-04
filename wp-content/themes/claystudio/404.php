<?php
get_header(); ?>

<!-- 404 Main Content -->
<main class="error-page-wrapper">
    <div class="container">
        <div class="error-content">
            <span class="error-subtitle">Error 404</span>
            <h1>Page Not Found</h1>
            <p class="description">
                The page you are looking for might have been removed, had its name
                changed, or is temporarily unavailable. Let's get you back on track.
            </p>
            <div class="error-actions">
                <a href="<?php echo home_url(); ?>" class="btn btn-primary-hero">Back to Home</a>
                <a href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>" class="btn btn-outline-dark">Continue Shopping</a>
            </div>
        </div>
    </div>
</main>


<?php get_footer(); ?>