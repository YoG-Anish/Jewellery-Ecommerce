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

<!-- Search Popup Modal -->
<div class="search-popup" id="searchPopup">
      <div class="search-popup-container">
        <div class="search-header">
          <span class="search-label">WHAT ARE YOU LOOKING FOR?</span>
          <button class="close-search" id="closeSearch">&times;</button>
        </div>
        <div class="search-body">
          <form action="/search" method="get" class="search-form">
            <input
              type="text"
              name="q"
              placeholder="Search Products..."
              class="search-input"
              autofocus
            />
            <button type="submit" class="search-submit-btn">
              <svg
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="1.5"
              >
                <circle cx="10.5" cy="10.5" r="7.5" />
                <path d="M21 21l-5.2-5.2" />
              </svg>
            </button>
          </form>
        </div>

        <div class="search-quick-links">
          <span class="search-label">MAIN MENU</span>
          <ul>
            <li><a href="./index.html">Home</a></li>
            <li><a href="./shop.html">Shop</a></li>
            <li><a href="./custom-bridal.html">Custom Bridal</a></li>
            <li><a href="./about.html">About</a></li>
          </ul>
        </div>
      </div>
    </div>
<?php wp_footer(); ?>
</body>

</html>