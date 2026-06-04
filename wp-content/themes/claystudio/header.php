<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <!-- Announcement Bar -->
    <div class="announcement-bar">
        <section
            id="announcement-slider"
            class="splide"
            aria-label="Announcements">
            <div class="splide__track">
                <ul class="splide__list" id="splide-list">
                    <li class="splide__slide"><?php echo get_theme_mod('header_marquee_text1'); ?></li>
                    <li class="splide__slide dot">•</li>
                    <li class="splide__slide"><?php echo get_theme_mod('header_marquee_text2'); ?></li>
                    <li class="splide__slide dot">•</li>
                    <li class="splide__slide"><?php echo get_theme_mod('header_marquee_text3'); ?></li>
                    <li class="splide__slide dot">•</li>
                </ul>
            </div>
        </section>
    </div>


    <header class="site-header  <?php echo (is_front_page() || is_home()) ? 'transparent-header' : ''; ?>">
        <div class="container header-container">
            <div class="header-icons d-mobile-only">
                <a
                    href="/menu"
                    class="icon-link mobile-menu-toggle"
                    aria-label="Open Menu">
                    <svg
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.5">
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg>
                </a>
                <a href="#" class="icon-link search-trigger">
                    <svg
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.5">
                        <circle cx="10.5" cy="10.5" r="7.5" />
                        <path d="M21 21l-5.2-5.2" />
                    </svg>
                </a>
            </div>
            <div class="logo">
                <a href="<?php echo esc_url(home_url()); ?>">
                    <?php
                    $header_logo = get_theme_mod('header_logo');
                    $header_logo_url = $header_logo ? wp_get_attachment_url($header_logo) : '';
                    $header_logo_alt = get_post_meta($header_logo, '_wp_attachment_image_alt', true);
                    ?>
                    <img src="<?php echo esc_url($header_logo_url); ?>" alt="<?php echo esc_attr($header_logo_alt); ?>" />
                </a>
            </div>

            <nav class="main-nav">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'header-menu',
                ));
                ?>
            </nav>

            <div class="header-icons">
                <a href="#" class="icon-link search-trigger d-mobile-none">
                    <svg
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.5">
                        <circle cx="10.5" cy="10.5" r="7.5" />
                        <path d="M21 21l-5.2-5.2" />
                    </svg>
                </a>
                <a href="/wishlist" class="icon-link wishlist-icon">
                    <svg
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.5"
                        stroke-linecap="round"
                        stroke-linejoin="round">
                        <path
                            d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z" />
                    </svg>
                    <span class="cart-count">0</span>
                </a>

                <?php echo do_shortcode('[xoo_wsc_cart] '); ?>
            </div>
        </div>
    </header>