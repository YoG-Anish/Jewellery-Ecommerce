<?php

/**
 * Template Name: Custom Bridal
 *  */
get_header();
?>

<main>
    <section class="bridal-video-hero">
        <!-- The Background Video -->

        <div class="video-bg-container">
            <div class="bridal-video">
                <?php
                $bridal_section1_video1 = get_field('bridal_section1_video1');
                if ($bridal_section1_video1) { ?>
                    <video
                        id="bridal-hero-video"
                        autoplay
                        muted
                        loop
                        playsinline
                        src="<?php echo esc_url($bridal_section1_video1['url']); ?>"></video>
                <?php } ?>
            </div>

            <!-- The Content Overlay -->
            <div class="container">
                <div class="text-box">
                    <?php echo get_field('bridal_section1_content'); ?>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-gradient-pink">
        <div class="container">
            <?php echo get_field('bridal_section2_description'); ?>
        </div>
    </section>
    <section class="how-to-order">
        <div class="container">
            <div class="how-to-order-grid">
                <div class="bridegroom-img">
                    <?php
                    $bridal_section2_image = get_field('bridal_section2_image');
                    if ($bridal_section2_image) { ?>
                        <img
                            src="<?php echo esc_url($bridal_section2_image['url']); ?>"
                            alt="<?php echo esc_attr($bridal_section2_image['alt']); ?>" />
                    <?php } ?>
                </div>
                <div class="bridegroom-content">
                    <?php echo get_field('bridal_section2_content'); ?>
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part('template-parts/content', 'testimonial'); ?>

</main>

<?php get_footer(); ?>