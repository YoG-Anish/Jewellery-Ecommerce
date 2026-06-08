<footer class="site-footer">
    <div class="container footer-grid">
        <div class="footer-col">
            <?php
            $footer_logo_id = get_theme_mod('footer_logo');
            $footer_logo_url = $footer_logo_id ? wp_get_attachment_url($footer_logo_id) : '';
            $footer_logo_alt = get_post_meta($footer_logo_id, '_wp_attachment_image_alt', true);
            ?>
            <a href="<?php echo esc_url(home_url()); ?>">
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
            <p>Web Design by <span class="text-underline " style="color: gold;">Anish Maka</span> & <span class="text-underline " style="color: gold;">Sabin Prajapati</span></p>
        </div>
    </div>
</footer>
<!-- Scroll to Top Button with Progress Circle -->
<div class="progress-wrap" id="backToTop">
    <svg
        class="progress-circle svg-content"
        width="100%"
        height="100%"
        viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
    <div class="arrow-icon">↑</div>
</div>

<!-- Sidebar Overlay -->
<div class="sidebar-overlay" id="sidebarOverlay"></div>

<!-- Sidebar Menu -->
<aside class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <button class="close-sidebar" id="closeSidebar" aria-label="Close Menu">
            <svg
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </button>
    </div>
    <nav class="sidebar-nav">
        <?php
        wp_nav_menu(array(
            'theme_location' => 'header-menu', // Same menu location
            'container'      => false,
            'menu_class'     => 'nav-list-phone',
            'menu_id'        => 'footer-phone-list' // Different unique ID
        ));
        ?>
    </nav>
</aside>

<!-- Search Popup Modal -->
<div class="search-popup" id="searchPopup">
    <div class="search-popup-container">
        <div class="search-header">
            <span class="search-label">WHAT ARE YOU LOOKING FOR?</span>
            <button class="close-search" id="closeSearch">&times;</button>
        </div>
        <div class="search-body">
            <form action="<?php echo esc_url(home_url('/')); ?>" method="get" class="search-form">
                <input
                    type="text"
                    name="s"
                    value="<?php echo get_search_query(); ?>"
                    placeholder="Search Products..."
                    class="search-input search-input-field"
                    autofocus />
                <input type="hidden" name="post_type" value="product" />

                <div id="search-results-container"></div>


                <button type="submit" class="search-submit-btn">
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
                </button>
            </form>
        </div>

        <div class="search-quick-links">
            <span class="search-label">MAIN MENU</span>
            <nav class="footer-nav-window">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'search-menu', // Your menu location
                    'container'      => false,
                    'menu_class'     => 'nav-list-window',
                    'menu_id'        => 'footer-window-list' // Unique ID
                ));
                ?>
            </nav>

        </div>
    </div>
</div>
<?php wp_footer(); ?>
</body>

</html>