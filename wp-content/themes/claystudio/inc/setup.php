<?php 

//register menu
function register_my_menus() {
    register_nav_menus(
        array(
            'header-menu' => __( 'Header Menu' ),
            'search-menu' => __( 'Search Menu' ),
            'footer-menu1' => __( 'Footer Menu 1' ),
            'footer-menu2' => __( 'Footer Menu 2' ),
        )
    );
}
add_action( 'init', 'register_my_menus' );


//theme support
function claystudio_theme_support() {
    add_theme_support( 'post-thumbnails' );
    //woocommerce
    add_theme_support( 'woocommerce' );
    
}
add_action( 'after_setup_theme', 'claystudio_theme_support' );

// create custom post type 
function create_slider_post_type() {
    // slider banner cpt
    register_post_type( 'slider_banner',
        array(
            'labels' => array(
                'name' => __( 'Slider Banners' ),
                'singular_name' => __( 'Slider Banner' )
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array( 'title', 'editor', 'thumbnail' ),
            'show_in_rest' => true,
            'menu_icon' => 'dashicons-format-gallery'
        )
    );

    // Testimonial cpt
    register_post_type( 'testimonial',
        array(
            'labels' => array(
                'name' => __( 'Testimonials' ),
                'singular_name' => __( 'Testimonial' )
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array( 'title', 'editor', 'thumbnail' ),
            'show_in_rest' => true,
            'menu_icon' => 'dashicons-testimonial'
        )
    );

    //claystudio partners cpt
    register_post_type( 'partner',
        array(
            'labels' => array(
                'name' => __( 'Partners' ),
                'singular_name' => __( 'Partner' )
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array( 'title', 'editor', 'thumbnail' ),
            'show_in_rest' => true,
            'menu_icon' => 'dashicons-groups'
        )
    );

    //claystudio blog cpt
    register_post_type( 'clay_blog',
        array(
            'labels' => array(
                'name' => __( 'Blogs' ),
                'singular_name' => __( 'Blog' )
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
            'show_in_rest' => true,
            'menu_icon' => 'dashicons-welcome-write-blog'
        )
    );

    //blog category taxonomy
    register_taxonomy(
        'blog_category',
        'clay_blog',
        array(
            'label' => __( 'Blog Categories' ),
            'rewrite' => array( 'slug' => 'blog-category' ),
            'hierarchical' => true,
            'show_in_rest' => true,
        )
    );

}
add_action( 'init', 'create_slider_post_type' );

// Register the blocks
function claystudio_register_custom_blocks() {
    // 1. Parent: Hero Slider
    register_block_type('claystudio/hero-slider', array(
        'render_callback' => 'render_hero_slider',
    ));
    
    // 2. Child: Hero Slide
    register_block_type('claystudio/hero-slide', array(
        'render_callback' => 'render_hero_slide',
    ));
}
add_action('init', 'claystudio_register_custom_blocks');

// HTML for Parent
function render_hero_slider($attributes, $content) {
    return '<div class="splide hero-slider" aria-label="Hero Carousel">
              <div class="splide__track">
                <ul class="splide__list">' . $content . '</ul>
              </div>
            </div>';
}

// HTML for Child (We use InnerBlocks to let you drop content inside)
function render_hero_slide($attributes, $content) {
    return '<li class="splide__slide">' . $content . '</li>';
}

// content blog reading time function
function get_reading_time($post_id) {
    // Get the post content
    $content = get_post_field('post_content', $post_id);
    
    // Count the words
    $word_count = str_word_count(strip_tags($content));
    
    // Average reading speed: 200 words per minute
    $minutes = ceil($word_count / 200);
    
    return $minutes . ' min read';
}