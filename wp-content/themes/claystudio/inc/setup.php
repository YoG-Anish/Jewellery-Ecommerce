<?php 

//register menu
function register_my_menus() {
    register_nav_menus(
        array(
            'header-menu' => __( 'Header Menu' ),
            'footer-menu' => __( 'Footer Menu' ),
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

