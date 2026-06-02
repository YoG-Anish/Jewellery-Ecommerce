<?php 
//enqueue scripts
function claystudio_enqueue_scripts() {

    wp_enqueue_style('claystudio-style', get_stylesheet_uri(), array(), '1.0', 'all');
    wp_enqueue_style('claystudio-css2', get_template_directory_uri() . '/assets/css/css2.css', array(), filemtime(get_template_directory()), 'all');
    wp_enqueue_style('claystudio-splide-min', get_template_directory_uri() . '/assets/css/splide.min.css', array(), filemtime(get_template_directory()), 'all');
    wp_enqueue_style('claystudio-main', get_template_directory_uri() . '/assets/css/main.css', array(), filemtime(get_template_directory()), 'all');
    wp_enqueue_style('claystudio-inner-content', get_template_directory_uri() . '/assets/css/inner-content.css', array(), filemtime(get_template_directory()), 'all');
    wp_enqueue_style('claystudio-inner-content2', get_template_directory_uri() . '/assets/css/inner-content-2.css', array(), filemtime(get_template_directory()), 'all');
    wp_enqueue_style('claystudio-sub-page', get_template_directory_uri() . '/assets/css/sub-page.css', array(), filemtime(get_template_directory()), 'all');

    wp_enqueue_script('claystudio-splide-min', get_template_directory_uri() . '/assets/js/splide.min.js', array(), filemtime(get_template_directory()), true);
    wp_enqueue_script('claystudio-splide-extension-auto-scroll-min', get_template_directory_uri() . '/assets/js/splide-extension-auto-scroll.min.js', array(), filemtime(get_template_directory()), true);
    wp_enqueue_script('claystudio-js', get_template_directory_uri() . '/assets/js/main.js', array(), filemtime(get_template_directory()), true);
    wp_enqueue_script('claystudio-slider', get_template_directory_uri() . '/assets/js/slider.js', array(), filemtime(get_template_directory()), true);
    wp_enqueue_script('claystudio-tab', get_template_directory_uri() . '/assets/js/tab.js', array(), filemtime(get_template_directory()), true);
}
add_action('wp_enqueue_scripts', 'claystudio_enqueue_scripts');