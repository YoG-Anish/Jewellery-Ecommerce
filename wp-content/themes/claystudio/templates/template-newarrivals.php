<?php
/*
    Template Name: New Arrivals
*/
get_header(); ?>


<main class="new-arrivals-page">
    <h1>New Arrivals</h1>
    <!-- This calls your function directly without needing the editor -->
    <?php echo get_new_arrivals_products(); ?>
</main>


<?php get_footer(); ?>