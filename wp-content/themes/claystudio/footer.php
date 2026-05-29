<footer class="site-footer">
    <div class="container footer-grid">
        <div class="footer-col">
            <?php
            $footer_logo_id = get_theme_mod('footer_logo');
            $footer_logo_url = $footer_logo_id ? wp_get_attachment_url($footer_logo_id) : '';
            $footer_logo_alt = get_post_meta($footer_logo_id, '_wp_attachment_image_alt', true);
            ?>
            <img src="<?php echo esc_url($footer_logo_url); ?>" alt="<?php echo esc_attr($footer_logo_alt); ?>" class="footer-logo" />
        </div>
        <div class="footer-col">
            <h4>Quick Links</h4>
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'footer-menu1',
                )
            );
            ?>
        </div>
        <div class="footer-col">
            <h4>Support</h4>
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'footer-menu2',
                )
            );
            ?>
        </div>
        <div class="footer-col">
            <h4><?php echo get_theme_mod('footer_about_title'); ?></h4>
            <?php echo get_theme_mod('footer_about_description'); ?>
            <p><br>© <?php echo date('Y'); ?> - <?php echo get_bloginfo('name'); ?></p>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container footer-bot-container">
            <p>Web Design by <span class="text-underline " style="color: gold;">Anish Maka</span></p>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>