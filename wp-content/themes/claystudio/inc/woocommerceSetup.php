<?php
// --- 1. ADD ORDER NOTE TO SIDE CART ---
add_action('xoo_wsc_before_checkout_btn', 'add_side_cart_order_note');
function add_side_cart_order_note()
{
    $note = WC()->session->get('customer_note');
    echo '<div class="side-cart-note-container" style="margin-bottom: 15px;">
            <label style="font-size: 12px; font-weight: bold; display: block; margin-bottom: 5px;">Order Note</label>
            <textarea name="side_cart_note" placeholder="Add special instructions here..." style="width: 100%; border: 1px solid #ddd; padding: 10px; font-size: 13px;">' . esc_textarea($note) . '</textarea>
          </div>';
}

// --- 2. SAVE ORDER NOTE TO CHECKOUT ---
add_action('woocommerce_checkout_update_order_review', 'save_side_cart_note_to_session');
function save_side_cart_note_to_session($post_data)
{
    parse_str($post_data, $data);
    if (isset($data['side_cart_note'])) {
        WC()->session->set('customer_note', sanitize_textarea_field($data['side_cart_note']));
    }
}

// --- 3. ADD "YOU MAY ALSO LIKE" (UPSELLS) ---
add_action('xoo_wsc_after_cart_items', 'add_side_cart_upsells');
function add_side_cart_upsells()
{
    // Only show if items are in the cart
    if (WC()->cart->is_empty()) return;

    echo '<div class="side-cart-upsells" style="margin-top: 20px; border-top: 1px solid #eee; padding-top: 20px;">
            <h3 style="font-size: 14px; text-transform: uppercase; margin-bottom: 15px;">You May Also Like</h3>';

    // Displays products you have linked as Cross-sells
    echo do_shortcode('[cross_sells limit="2" columns="2"]');

    echo '</div>';
}

function get_new_arrivals_products()
{
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
        $shop_url = function_exists('wc_get_page_permalink') ? esc_url(wc_get_page_permalink('shop')) : home_url('/shop');

        return '
    <div class="no-arrivals-container">
        <div class="no-arrivals-content">
            <p>No new arrivals at this time.</p>
            <a href="' . $shop_url . '" class="btn btn-outline-dark">Return to Shop</a>
        </div>
    </div>';
    }
}
add_shortcode('new_arrivals', 'get_new_arrivals_products');

// Force search results to always use search.php, never the shop page
add_filter('template_include', 'force_search_template', 99);
function force_search_template($template)
{
    if (is_search()) {
        $new_template = locate_template(['search.php']);
        if ($new_template) return $new_template;
    }
    return $template;
}
