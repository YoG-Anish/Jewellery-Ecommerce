<?php
/*
Template Name: Home
*/
get_header(); ?>

<main>
    <!-- Hero Section -->
    <div class="splide hero-slider" aria-label="Hero Carousel">
        <div class="splide__track">
            <ul class="splide__list">
                <?php
                // Hero Slider
                $args = array(
                    'post_type' => 'slider_banner',
                    'posts_per_page' => -1,
                );
                $slider_query = new WP_Query($args);
                if ($slider_query->have_posts()) :
                    while ($slider_query->have_posts()) : $slider_query->the_post();
                ?>
                        <li class="splide__slide">
                            <section class="hero-split">
                                <div class="hero-images">
                                    <?php
                                    $image_left = get_field('image_left');
                                    $image_right = get_field('image_right');
                                    ?>
                                    <div
                                        class="hero-img-left"
                                        style="
                          background-image: url('<?php echo esc_url($image_left['url']); ?>');
                        "></div>
                                    <div
                                        class="hero-img-right"
                                        style="
                          background-image: url('<?php echo esc_url($image_right['url']); ?>');
                        "></div>
                                </div>
                                <div class="hero-content">
                                    <p class="sub-title"><?php the_field('small_title'); ?></p>
                                    <h1 class="main-title"><?php the_field('big_title'); ?></h1>
                                    <p class="description"><?php the_field('tagline'); ?></p>
                                    <div class="hero-btns">
                                        <a href="<?php echo get_field('left_link'); ?>" class="btn btn-primary-hero"><?php echo get_field('left_button_text'); ?></a>
                                        <a href="<?php echo get_field('right_link'); ?>" class="btn btn-outline"><?php echo get_field('right_button_text'); ?></a>
                                    </div>
                                </div>
                            </section>
                        </li>
                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </ul>
        </div>
    </div>

    <!-- Variation slider  -->
    <div class="variation-bar">
        <section id="variation-slider" class="splide" aria-label="Variations">
            <div class="splide__track">
                <ul class="splide__list" id="splide-list">
                    <li class="splide__slide"><?php echo get_field('section1_marquee_text1'); ?></li>
                    <li class="splide__slide"><?php echo get_field('section1_marquee_text2'); ?></li>
                    <li class="splide__slide"><?php echo get_field('section1_marquee_text3'); ?></li>
                    <li class="splide__slide"><?php echo get_field('section1_marquee_text4'); ?></li>
                    <li class="splide__slide"><?php echo get_field('section1_marquee_text5'); ?></li>
                </ul>
            </div>
        </section>
    </div>

    <!-- Featured Collections -->
    <section class="container collections-grid">

        <!-- 1. STATIC: New Arrivals (ACF) -->
        <?php if (get_field('section2_item1_image')):
            $acf_image = get_field('section2_item1_image');
            $acf_link  = get_field('section2_item1_link');
            $acf_title = get_field('section2_item1_title');
        ?>
            <div class="collection-item">
                <a href="<?php echo esc_url($acf_link); ?>">
                    <img src="<?php echo esc_url($acf_image['url']); ?>" alt="<?php echo esc_attr($acf_image['alt']); ?>" />
                    <div class="overlay">
                        <h3><?php echo esc_html($acf_title); ?></h3>
                    </div>
                </a>
            </div>
        <?php endif; ?>

        <!-- 2. DYNAMIC: Product Categories (Limited to 3) -->
        <?php
        $uncategorized_term = get_term_by('slug', 'uncategorized', 'product_cat');
        $exclude_id = $uncategorized_term ? $uncategorized_term->term_id : 0;
        $categories = get_terms([
            'taxonomy'   => 'product_cat',
            'hide_empty' => true,
            'number'     => 4, // We take 3 categories, + 1 ACF = 4 items total
            'exclude'    => [$exclude_id] // Change 15 to your 'Uncategorized' ID
        ]);

        foreach ($categories as $cat) {
            $link = get_term_link($cat);
            // Get WC Thumbnail
            $thumbnail_id = get_term_meta($cat->term_id, 'thumbnail_id', true);
            $image_url = $thumbnail_id ? wp_get_attachment_url($thumbnail_id) : '';
        ?>

            <div class="collection-item">
                <a href="<?php echo esc_url($link); ?>">
                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($cat->name); ?>" />
                    <div class="overlay">
                        <h3><?php echo esc_html($cat->name); ?></h3>
                    </div>
                </a>
            </div>

        <?php } ?>

    </section>

    <!-- Gemini Clay Studio Brief Overview  -->
    <!-- Main Section -->
    <section class="about-section">
        <div class="container">
            <div class="content-wrapper">
                <!-- Left side: Overlapping Images -->
                <div class="image-grid">
                    <div class="image-bg">
                        <?php
                        $section3_image_back = get_field('section3_image_back');
                        if ($section3_image_back) {
                            echo '<img src="' . esc_url($section3_image_back['url']) . '" alt="' . esc_attr($section3_image_back['alt']) . '"/>';
                        }
                        ?>
                    </div>
                    <div class="image-fg">
                        <?php
                        $section3_image_front = get_field('section3_image_front');
                        if ($section3_image_front) {
                            echo '<img src="' . esc_url($section3_image_front['url']) . '" alt="' . esc_attr($section3_image_front['alt']) . '"/>';
                        }
                        ?>
                    </div>
                </div>

                <!-- Right side: Text Content -->
                <div class="text-content">
                    <div class="text-content-wrap">
                        <?php echo get_field('section3_content'); ?>
                        <a href="<?php echo get_field('section3_link'); ?>" class="btn-primary"><?php echo get_field('section3_button_text'); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-herovideo-section">
        <div class="hero-video">
            <video
                id="bg-video-1"
                class="lazyloaded"
                src="https://cdn.shopify.com/videos/c/o/v/25502298f50a4ec1973e70b908c27e58.mov"
                loop=""
                muted=""
                playsinline=""
                autoplay=""></video>
        </div>

        <div class="container">
            <div class="video-text">
                <?php echo get_field('section4_content'); ?>

                <div class="">
                    <div class="">
                        <a href="<?php echo get_field('section4_button_link'); ?>" class="btn-white">
                            <?php echo get_field('section4_button_text'); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="trusted-section">
        <div class="container">
            <span class="sub-heading trusted-heading">TRUSTED BY THE BEST</span>

            <div class="trusted-grid">
                <?php
                $args = array(
                    'post_type' => 'partner',
                    'posts_per_page' => -1,
                );
                $partners = new WP_Query($args);
                if ($partners->have_posts()) :
                    while ($partners->have_posts()) : $partners->the_post();   ?>
                        <div class="trusted-item">
                            <?php
                            $partner_logo = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                            if ($partner_logo) : ?>
                                <div class="trusted-logo">
                                    <img src="<?php echo esc_url($partner_logo); ?>" alt="<?php the_title(); ?>" />
                                </div>
                            <?php endif; ?>
                            <p class="trusted-text">
                                <?php the_content(); ?>
                            </p>
                        </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>
        </div>
    </section>

    <section class="best-sellers">
        <div class="container-1600">

            <div class="section-header">
                <?php echo get_field('section6_content'); ?>
            </div>

            <div class="tab-container">
                <button class="tab-btn active" data-target="popular">MOST POPULAR</button>
                <button class="tab-btn" data-target="new-in">NEW IN</button>
            </div>

            <div class="product-grid" id="product-container">

                <?php
                // 1. QUERY: MOST POPULAR
                $popular_query = new WP_Query([
                    'post_type' => 'product',
                    'meta_key' => 'total_sales',
                    'orderby' => 'meta_value_num',
                    'order' => 'DESC',
                    'posts_per_page' => 4
                ]);

                while ($popular_query->have_posts()) : $popular_query->the_post();
                    global $product;
                ?>
                    <div class="product-card popular">
                        <div class="product-image">
                            <?php if (!$product->is_in_stock()) : ?>
                                <span class="badge sold-out">SOLD OUT</span>
                            <?php endif; ?>
                            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>" alt="<?php the_title(); ?>" />
                        </div>
                        <div class="product-info">
                            <h3 class="product-title"><?php the_title(); ?></h3>
                            <div class="price">
                                <?php if ($product->is_on_sale()) : ?>
                                    <span class="current-price"><?php echo $product->get_sale_price(); ?></span>
                                    <span class="old-price"><?php echo $product->get_regular_price(); ?></span>
                                <?php else : ?>
                                    <span class="current-price"><?php echo $product->get_price(); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile;
                wp_reset_postdata(); ?>

                <?php
                // 2. QUERY: NEW IN
                $new_query = new WP_Query([
                    'post_type' => 'product',
                    'orderby' => 'date',
                    'order' => 'DESC',
                    'posts_per_page' => 4
                ]);

                while ($new_query->have_posts()) : $new_query->the_post();
                    global $product;
                ?>
                    <div class="product-card new-in">
                        <div class="product-image">
                            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>" alt="<?php the_title(); ?>" />
                        </div>
                        <div class="product-info">
                            <h3 class="product-title"><?php the_title(); ?></h3>
                            <div class="price">
                                <span class="current-price"><?php echo $product->get_price(); ?></span>
                            </div>
                        </div>
                    </div>
                <?php endwhile;
                wp_reset_postdata(); ?>

            </div>

            <a href="<?php echo get_field('section6_button_link'); ?>" class="btn-primary mt-90"><?php echo get_field('section6_button_text'); ?></a>
        </div>
    </section>

    <?php get_template_part('template-parts/content', 'testimonial'); ?>


    <section class="bridal-section">
        <div class="container">
            <div class="bridal-grid">
                <div class="left-bridal-section">
                    <div class="bridal-content-wrapper">
                        <?php echo get_field('section8_item1');
                        $section8_image_1 = get_field('section8_image_1');
                        if ($section8_image_1) {
                            echo '<img src="' . esc_url($section8_image_1['url']) . '" alt="' . esc_attr($section8_image_1['alt']) . '"/>';
                        }
                        ?>
                        <a href="<?php echo get_field('section8_link'); ?>" class="btn-primary"><?php echo get_field('section8_link_text'); ?></a>
                    </div>
                </div>
                <div class="right-bridal-section">
                    <div class="bridal-content-wrapper">
                        <?php
                        $section8_image_2 = get_field('section8_image_2');
                        if ($section8_image_2) {
                            echo '<img src="' . esc_url($section8_image_2['url']) . '" alt="' . esc_attr($section8_image_2['alt']) . '"/>';
                        }
                        ?>
                        <?php echo get_field('section8_item2'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="instagram-posts">
        <div class="container">
            <span class="sub-heading insta-text-center">
                follow us on the 'gram 🡺
            </span>
            <div class="instagram-image-posts">
                <img
                    src="https://scontent.cdninstagram.com/v/t51.82787-15/703890813_18008078030877092_8983308537958157078_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=103&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0FST1VTRUxfSVRFTS5iZXN0X2ltYWdlX3VybGdlbi5DMyJ9&_nc_ohc=rWpc6amF0tAQ7kNvwEMno5G&_nc_oc=AdpxQTcxp2IbCmcxX2DdBvw-4EJUWGaoyIlpjYO11JzT5KSWIMG7J-oPi5JIKdYVCns&_nc_zt=23&_nc_ht=scontent.cdninstagram.com&edm=ANo9K5cEAAAA&_nc_gid=YxsLvNS3Hs-eyCOGfnGZvA&_nc_tpa=Q5bMBQEf9pluoh2YoizUBDewh01boa0UtxBd_uhjfCTXnzL6IGCy2-rSFJte7PLusSeqGl-fNFTG2wFF&oh=00_Af7zJa_vQhi4Tn351o2RYaap4EXA2vIbg66EcAXj_e68eA&oe=6A1F25A4"
                    alt="" /><img
                    src="https://scontent.cdninstagram.com/v/t51.82787-15/703503419_18008187932877092_4311261171078377716_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=109&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_ohc=603e2gU6t7wQ7kNvwEIJuKk&_nc_oc=AdpmM3mPihbx8bB9bhE7m9fRioz9E6cFLBS_XJKQdgzluN-OEVS3MWTMcwk5SWCWTQI&_nc_zt=23&_nc_ht=scontent.cdninstagram.com&edm=ANo9K5cEAAAA&_nc_gid=YxsLvNS3Hs-eyCOGfnGZvA&_nc_tpa=Q5bMBQFGNDwQu2I5ypTBdwac1mvYX3WMPrTpQbco4CADitVouQWtSDl1IR5JnueUA1PROPfvhhsHqm6l&oh=00_Af51vifQCCiGC_O4xVP2bfoRKAal629ODLUuWynTe3dtqg&oe=6A1F0FA8"
                    alt="" /><img
                    src="https://scontent.cdninstagram.com/v/t51.82787-15/703001725_18008118161877092_4578032661778996555_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=107&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0FST1VTRUxfSVRFTS5iZXN0X2ltYWdlX3VybGdlbi5DMyJ9&_nc_ohc=1yq8YZrphwgQ7kNvwEjMwhj&_nc_oc=AdqNHxr8f0ICbwJy5iBnzRUxi52q76sW7thu7XTx1sDF_X78cZLiMrSwjxG5Rz-gJpc&_nc_zt=23&_nc_ht=scontent.cdninstagram.com&edm=ANo9K5cEAAAA&_nc_gid=YxsLvNS3Hs-eyCOGfnGZvA&_nc_tpa=Q5bMBQEsYdD-U_xlCVf1DD5u7OrxHo9WDVqZgHck-QOG_yXyAuYRlMm34cq7vq3pEynJtVhSujlilXFy&oh=00_Af531qvpEi0IyVZYtixmN8Lb60SxHaGKCEvu41vq7rEuBA&oe=6A1F315C"
                    alt="" /><img
                    src="https://scontent.cdninstagram.com/v/t51.82787-15/702696504_18008006540877092_2198533988480741184_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=108&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_ohc=inQEwN47OeMQ7kNvwFCxQz0&_nc_oc=AdoI-q_jffyPlEIj8kgB_scx5jUM3pOFqOLA58kVgHn3gg4LNM8ARLV9H8iKE6H1Pdk&_nc_zt=23&_nc_ht=scontent.cdninstagram.com&edm=ANo9K5cEAAAA&_nc_gid=YxsLvNS3Hs-eyCOGfnGZvA&_nc_tpa=Q5bMBQHN1mj4EI4URTUvwMYVkkboRnqATTxop0sRtqYY_PZ9X8WpqLyvNMW5IPo0rlM_jf40Y8JWurq4&oh=00_Af46Q_dLvXsgBRQgU7aaYGLkWw_EtwLxtlBtLkw24gz-6A&oe=6A1F1B15"
                    alt="" /><img
                    src="https://scontent.cdninstagram.com/v/t51.82787-15/702703506_18007752323877092_561106893383955059_n.jpg?stp=dst-jpg_e35_tt6&_nc_cat=108&ccb=7-5&_nc_sid=18de74&efg=eyJlZmdfdGFnIjoiQ0xJUFMuYmVzdF9pbWFnZV91cmxnZW4uQzMifQ%3D%3D&_nc_ohc=Vc9enJbCFlsQ7kNvwHWrqfx&_nc_oc=AdpOQKLc56ez67oCWgE69FnrAaYj5BoaM_JDh9nnqH8q46hDOY7-ON7iPgulmT9bM4I&_nc_zt=23&_nc_ht=scontent.cdninstagram.com&edm=ANo9K5cEAAAA&_nc_gid=YxsLvNS3Hs-eyCOGfnGZvA&_nc_tpa=Q5bMBQE8ECbXaywPwJcRI18LcFTLuVGalUmOHoa7oB-NrzmYlhSi6FToNZZfsE6pqhVcDVLiDag8aO27&oh=00_Af6n8X0AqJWJAMAXcSUZVm1ID8Z8WyaOcC-G0LHcG2HLHA&oe=6A1F0C9A"
                    alt="" />
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>