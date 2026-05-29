<?php 
//enqueue scripts
function claystudio_enqueue_scripts() {

    wp_enqueue_style('claystudio-style', get_stylesheet_uri(), array(), '1.0', 'all');

    wp_enqueue_script('claystudio-js', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0', true);
}
add_action('wp_enqueue_scripts', 'claystudio_enqueue_scripts');