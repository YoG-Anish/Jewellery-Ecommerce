<?php
/*
Template Name: Contact
*/

get_header(); ?>
<main>
    <section class="questions-section">
        <div class="questions-grid">
            <div class="questions-left-image">
                <img
                    src="https://geminiclaystudio.com/cdn/shop/files/Square.png?v=1716558930&width=1512"
                    alt="earrings emerald" />
            </div>
            <div class="questions-right-content">
                <?php echo get_field('contact_section1_content'); ?>
            </div>
        </div>
    </section>

    <section class="e-contact-section">
        <div class="container">
            <div class="e-contact-wrapper">
                <div class="contact-e">
                    <i class="fa-regular fa-envelope-open"></i>
                    <div class="link-title">
                        <span class="web-title"><?php echo get_field('section1_email_text'); ?></span>
                        <a class="web-link" href="mailto:<?php echo get_field('section1_email'); ?>">
                            <?php echo get_field('section1_email'); ?>
                        </a>
                    </div>
                </div>
                <div class="contact-e">
                    <i class="fa-brands fa-instagram"></i>
                    <div class="link-title">
                        <span class="web-title"><?php echo get_field('section1_instagram_text'); ?></span>
                        <a class="web-link" href="<?php echo get_field('section1_instagram_url'); ?>" target="_blank">
                            <?php echo get_field('section1_instagram_handle'); ?>
                        </a>
                    </div>
                </div>
                <div class="contact-e">
                    <i class="fa-brands fa-facebook-f"></i>
                    <div class="link-title">
                        <span class="web-title"><?php echo get_field('section1_facebook_text'); ?></span>
                        <a class="web-link" href="<?php echo get_field('section1_facebook_url'); ?>" target="_blank">
                            <?php echo get_field('section1_facebook_handle'); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="question-contact-section">
        <div class="container">
            <div class="contact-heading">
                <?php echo get_field('contact_section2_content'); ?>
            </div>
            <?php echo do_shortcode('[contact-form-7 id="2e4f728" title="About Contact Form"]'); ?>
            <div class="terms-and-privacy-policy">
                <p>
                    This site is protected by reCAPTCHA and the Google
                    <a href="https://policies.google.com/privacy">Privacy Policy</a>
                    and
                    <a href="https://policies.google.com/terms"> Terms of Service</a>
                    apply.
                </p>
            </div>
        </div>
    </section>

    <section class="faq-section">
        <div class="container">
            <div class="contact-heading">
                <?php echo get_field('contact_section3_content'); ?>
            </div>
            <div class="accordion-container">
                <!-- Accordion Item 1 (Open by default) -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        HOW LONG WILL SHIPPING TAKE?
                        <span class="icon"></span>
                    </button>
                    <div class="accordion-content">
                        <p>All orders are shipped within 12-36 hours from the UK.</p>
                    </div>
                </div>

                <!-- Accordion Item 2 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        HOW LONG FOR A CUSTOM MADE ORDER?
                        <span class="icon"></span>
                    </button>
                    <div class="accordion-content">
                        <p>
                            Please allow up to 2-6 weeks for a custom order, and 4-12
                            weeks for custom made bridal orders. This all depends on
                            quantity and components required for the design, however all
                            information will be detailed on my reply once you have sent an
                            enquiry form through.
                        </p>
                    </div>
                </div>

                <!-- Accordion Item 3 -->
                <div class="accordion-item">
                    <button class="accordion-header">
                        CAN I ORDER A PAIR OF EARRINGS THAT ARE NO LONGER IN STOCK?
                        <span class="icon"></span>
                    </button>
                    <div class="accordion-content">
                        <p>
                            In most cases, yes! Please get in touch using the contact form
                            above and I can remake the earrings of choice for you.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="collection-grid-section">
        <!-- 1. DYNAMIC BACKGROUND IMAGES -->
        <div class="background-overlay-collection">
            <?php
            $uncategorized = get_term_by('slug', 'uncategorized', 'product_cat');
            $categories = get_terms([
                'taxonomy'   => 'product_cat',
                'hide_empty' => true,
                'number'     => 4,
                'exclude'    => [$uncategorized ? $uncategorized->term_id : 0]
            ]);

            $i = 0; // Counter for ID matching
            foreach ($categories as $cat) {
                $thumbnail_id = get_term_meta($cat->term_id, 'thumbnail_id', true);
                $image_url = $thumbnail_id ? wp_get_attachment_url($thumbnail_id) : 'DEFAULT_IMAGE_URL';
            ?>
                <img src="<?php echo esc_url($image_url); ?>"
                    id="img-<?php echo $i; ?>"
                    class="<?php echo ($i === 0) ? 'active' : ''; ?>" />
            <?php
                $i++;
            } ?>
            <div class="dark-tint"></div>
        </div>

        <!-- 2. DYNAMIC CONTENT GRID -->
        <div class="container collection-grid">
            <?php
            $i = 0; // Reset counter
            foreach ($categories as $cat) {
                $link = get_term_link($cat);
            ?>
                <div class="collection-grid-item" data-index="<?php echo $i; ?>">
                    <div class="collection-content">
                        <h2 class="collection-title"><?php echo esc_html($cat->name); ?></h2>
                        <a href="<?php echo esc_url($link); ?>" class="collection-view-btn">+ VIEW COLLECTION</a>
                    </div>
                </div>
            <?php
                $i++;
            } ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>