<?php
// --- 1. ADD ORDER NOTE TO SIDE CART ---
add_action('xoo_wsc_before_checkout_btn', 'add_side_cart_order_note');
function add_side_cart_order_note() {
    $note = WC()->session->get('customer_note');
    echo '<div class="side-cart-note-container" style="margin-bottom: 15px;">
            <label style="font-size: 12px; font-weight: bold; display: block; margin-bottom: 5px;">Order Note</label>
            <textarea name="side_cart_note" placeholder="Add special instructions here..." style="width: 100%; border: 1px solid #ddd; padding: 10px; font-size: 13px;">' . esc_textarea($note) . '</textarea>
          </div>';
}

// --- 2. SAVE ORDER NOTE TO CHECKOUT ---
add_action('woocommerce_checkout_update_order_review', 'save_side_cart_note_to_session');
function save_side_cart_note_to_session($post_data) {
    parse_str($post_data, $data);
    if (isset($data['side_cart_note'])) {
        WC()->session->set('customer_note', sanitize_textarea_field($data['side_cart_note']));
    }
}

// --- 3. ADD "YOU MAY ALSO LIKE" (UPSELLS) ---
add_action('xoo_wsc_after_cart_items', 'add_side_cart_upsells');
function add_side_cart_upsells() {
    // Only show if items are in the cart
    if ( WC()->cart->is_empty() ) return;
    
    echo '<div class="side-cart-upsells" style="margin-top: 20px; border-top: 1px solid #eee; padding-top: 20px;">
            <h3 style="font-size: 14px; text-transform: uppercase; margin-bottom: 15px;">You May Also Like</h3>';
    
    // Displays products you have linked as Cross-sells
    echo do_shortcode('[cross_sells limit="2" columns="2"]'); 
    
    echo '</div>';
}

function get_new_arrivals_products() {
    $args = array(
        'post_type'      => 'product',
        'posts_per_page' => -1,
        'orderby'        => 'date',
        'order'          => 'DESC',
        'date_query'     => array(
            array(
                'after' => '7 days ago' // Automatically defines "New" as within 30 days
            ),
        ),
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        ob_start();
        echo '<ul class="products">';
        while ($query->have_posts()) {
            $query->the_post();
            wc_get_template_part('content', 'product');
        }
        echo '</ul>';
        wp_reset_postdata();
        return ob_get_clean();
    } else {
        return '<p>No new arrivals at this time.</p>';
    }
}
add_shortcode('new_arrivals', 'get_new_arrivals_products');    



/**
 * 1. THE AJAX HANDLER
 */
add_action( 'wp_ajax_update_wishlist_number', 'claystudio_update_wishlist_number' );
add_action( 'wp_ajax_nopriv_update_wishlist_number', 'claystudio_update_wishlist_number' );
function claystudio_update_wishlist_number() {
    nocache_headers(); 
    if ( function_exists( 'yith_wcwl_count_all_products' ) ) {
        echo yith_wcwl_count_all_products();
    } else {
        echo '0';
    }
    wp_die();
}

/**
 * 2. THE ULTIMATE INLINE SCRIPT (Fixed for your specific classes)
 */
add_action('wp_footer', 'claystudio_wishlist_force_sync', 99);
function claystudio_wishlist_force_sync() {
    ?>
    <script type="text/javascript">
    (function($) {
        'use strict';

        function update_header_wishlist() {
            console.log("Wishlist Sync: Requesting new count...");
            $.post('<?php echo admin_url('admin-ajax.php'); ?>', {
                action: 'update_wishlist_number'
            }, function(response) { 
                console.log("Wishlist Sync: New count is " + response);
                $('.wishlist-count').text(response); 
            });
        }

        // A. Listen for the standard YITH events
        $(document).on('added_to_wishlist removed_from_wishlist', function() {
            console.log("YITH Event detected!");
            setTimeout(update_header_wishlist, 1000);
        });

        // B. Watch for clicks on YOUR specific button classes from the inspector
        $(document).on('click', '.yith-wcwl-add-to-wishlist-button, .yith-wcwl-add-button a, .yith-wcwl-remove-button a', function() {
            console.log("Heart button click detected!");
            // We check multiple times because YITH can be slow to update the database
            setTimeout(update_header_wishlist, 1000);
            setTimeout(update_header_wishlist, 2500);
        });

        // C. The "Hammer": Catch any AJAX that looks like YITH
        $(document).ajaxComplete(function(event, xhr, settings) {
            if (settings.data && settings.data.includes('yith_wcwl')) {
                console.log("YITH AJAX detected!");
                setTimeout(update_header_wishlist, 1000);
            }
        });

    })(jQuery);
    </script>
    <?php
}