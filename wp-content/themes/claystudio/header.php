<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div class="announcement-bar">
        <section
            id="announcement-slider"
            class="splide"
            aria-label="Announcements">
            <div class="splide__track">
                <ul class="splide__list" id="splide-list">
                    <li class="splide__slide">FREE STANDARD SHIPPING ON UK ORDERS</li>
                    <li class="splide__slide dot">•</li>
                    <li class="splide__slide">HANDCRAFTED IN SCOTLAND</li>
                    <li class="splide__slide dot">•</li>
                    <li class="splide__slide">BESPOKE BRIDAL JEWELLERY</li>
                    <li class="splide__slide dot">•</li>
                </ul>
            </div>
        </section>
    </div>

    <header class="site-header">
        <div class="container header-container">
            <div class="logo">
                <a href="<?php echo esc_url( home_url() ); ?>">
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
                wp_nav_menu(
                    array(
                        'theme_location' => 'header-menu',
                    )
                );
                ?>
            </nav>

            <div class="header-icons">
                <a href="/search" class="icon-link">
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

                <a href="/cart" class="icon-link cart-icon">
                    <svg
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.5">
                        <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z" />
                        <line x1="3" y1="6" x2="21" y2="6" />
                        <path d="M16 10a4 4 0 0 1-8 0" />
                    </svg>
                    <span class="cart-count">0</span>
                </a>
            </div>
        </div>
    </header>