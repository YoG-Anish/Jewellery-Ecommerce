<?php

/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.6.0
 */

defined('ABSPATH') || exit;

get_header('shop');

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action('woocommerce_before_main_content');

/**
 * Hook: woocommerce_shop_loop_header.
 *
 * @since 8.6.0
 *
 * @hooked woocommerce_product_taxonomy_archive_header - 10
 */
do_action('woocommerce_shop_loop_header'); ?>

<div class="sidebar-overlay"></div>

<section class="shop-section-woo">
	<h2 class="shop-header">All Product</h2>
	<div class="container">
		<aside class="shop-filters-wrapper">
			<div class="mobile-sidebar-header">
				<span>Filters</span>
				<button type="button" class="close-sidebar">&times;</button>
			</div>
			<?php echo do_shortcode('[fe_widget]'); ?>
		</aside>

		<div class="product-loop-wrapper">
			<div class="shop-layout-controls">
				<button type="button" class="mobile-filter-trigger">
					<span class="filter-icon">☰</span> Filters
				</button>

				<div class="grid-switcher">
					<button type="button" class="switch-btn" data-cols="2" title="2 Columns">
						<span class="lines"><span></span><span></span></span>
					</button>
					<button type="button" class="switch-btn active" data-cols="3" title="3 Columns">
						<span class="lines"><span></span><span></span><span></span></span>
					</button>
					<button type="button" class="switch-btn" data-cols="4" title="4 Columns">
						<span class="lines"><span></span><span></span><span></span><span></span></span>
					</button>
				</div>
			</div>
			<?php
			if (woocommerce_product_loop()) {

				/**
				 * Hook: woocommerce_before_shop_loop.
				 *
				 * @hooked woocommerce_output_all_notices - 10
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
				do_action('woocommerce_before_shop_loop');

				woocommerce_product_loop_start();

				if (wc_get_loop_prop('total')) {
					while (have_posts()) {
						the_post();

						/**
						 * Hook: woocommerce_shop_loop.
						 */
						do_action('woocommerce_shop_loop');

						wc_get_template_part('content', 'product');
					}
				}

				woocommerce_product_loop_end();

				/**
				 * Hook: woocommerce_after_shop_loop.
				 *
				 * @hooked woocommerce_pagination - 10
				 */
				do_action('woocommerce_after_shop_loop');
			} else {
				/**
				 * Hook: woocommerce_no_products_found.
				 *
				 * @hooked wc_no_products_found - 10
				 */
				do_action('woocommerce_no_products_found');
			} ?>
		</div>
	</div>
</section>

<?php
/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action('woocommerce_after_main_content');


get_footer('shop');
