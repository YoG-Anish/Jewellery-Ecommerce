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
    <section class="bridal-testimonials">
        <div class="container">
            <section class="sophie-slider-wrapper">
                <div id="sophie-hero-carousel" class="splide">
                    <div class="splide__track">
                        <ul class="splide__list">
                            <!-- Slide 1 -->
                            <li class="splide__slide">
                                <div class="sophie-slide-flex">
                                    <div class="sophie-content-col">
                                        <div class="sophie-text-box">
                                            <blockquote class="sophie-quote">
                                                "I WAS IN LOVE WITH THESE EARRINGS. THANK YOU SO SO
                                                MUCH SOPHIE. I GOT SO MANY COMPLIMENTS AND FELT THEY
                                                COMPLETED THE LOOK SO WELL. YOU HAVE AN AMAZING
                                                TALENT."
                                            </blockquote>
                                        </div>
                                    </div>

                                    <div class="sophie-image-col">
                                        <img
                                            src="https://geminiclaystudio.com/cdn/shop/files/2.png?v=1716661766&width=1296"
                                            alt="Sophie Jewelry Review"
                                            class="sophie-main-img" />
                                    </div>
                                </div>
                            </li>
                            <li class="splide__slide">
                                <div class="sophie-slide-flex">
                                    <div class="sophie-content-col">
                                        <div class="sophie-text-box">
                                            <blockquote class="sophie-quote">
                                                "I WAS IN LOVE WITH THESE EARRINGS. THANK YOU SO SO
                                                MUCH SOPHIE. I GOT SO MANY COMPLIMENTS AND FELT THEY
                                                COMPLETED THE LOOK SO WELL. YOU HAVE AN AMAZING
                                                TALENT."
                                            </blockquote>
                                        </div>
                                    </div>

                                    <div class="sophie-image-col">
                                        <img
                                            src="https://geminiclaystudio.com/cdn/shop/files/1_61d8b664-d4b1-405f-80bb-e0516b41c5c8.png?v=1716661794&width=1296"
                                            alt="Sophie Jewelry Review"
                                            class="sophie-main-img" />
                                    </div>
                                </div>
                            </li>
                            <li class="splide__slide">
                                <div class="sophie-slide-flex">
                                    <div class="sophie-content-col">
                                        <div class="sophie-text-box">
                                            <blockquote class="sophie-quote">
                                                "I WAS IN LOVE WITH THESE EARRINGS. THANK YOU SO SO
                                                MUCH SOPHIE. I GOT SO MANY COMPLIMENTS AND FELT THEY
                                                COMPLETED THE LOOK SO WELL. YOU HAVE AN AMAZING
                                                TALENT."
                                            </blockquote>
                                        </div>
                                    </div>

                                    <div class="sophie-image-col">
                                        <img
                                            src="https://geminiclaystudio.com/cdn/shop/files/4.png?v=1716661794&width=1296"
                                            alt="Sophie Jewelry Review"
                                            class="sophie-main-img" />
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <!-- Custom Arrows positioned in the bottom left -->
                    <div class="splide__arrows custom-arrows">
                        <!-- PREV ARROW (Points Left) -->
                        <button
                            class="splide__arrow splide__arrow--prev"
                            type="button"
                            aria-label="Previous slide">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="16"
                                height="16"
                                fill="currentColor"
                                class="bi bi-chevron-left"
                                viewBox="0 0 16 16">
                                <path
                                    fill-rule="evenodd"
                                    d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0" />
                            </svg>
                        </button>

                        <!-- NEXT ARROW (Points Right) -->
                        <button
                            class="splide__arrow splide__arrow--next"
                            type="button"
                            aria-label="Next slide">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="16"
                                height="16"
                                fill="currentColor"
                                class="bi bi-chevron-left"
                                viewBox="0 0 16 16">
                                <path
                                    fill-rule="evenodd"
                                    d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0" />
                            </svg>
                        </button>
                    </div>
                </div>
            </section>
        </div>
    </section>
</main>

<?php get_footer(); ?>