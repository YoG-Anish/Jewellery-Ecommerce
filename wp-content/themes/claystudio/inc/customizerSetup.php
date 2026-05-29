<?php
// customizer section for header
function customizer_section_header($wp_customize) {
    $wp_customize->add_section('header', array(
        'title' => __('Header Settings', 'claystudio'),
        'priority' => 30,
    ));
    // header logo
    $wp_customize->add_setting('header_logo');
    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'header_logo', array(
        'label' => __('Header Logo', 'claystudio'),
        'section' => 'header',
        'settings' => 'header_logo',
    )));

    //footer settings   
    $wp_customize->add_section('footer', array(
        'title' => __('Footer Settings', 'claystudio'),
        'priority' => 30,
    ));
    // footer logo
    $wp_customize->add_setting('footer_logo');
    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'footer_logo', array(
        'label' => __('Footer Logo', 'claystudio'),
        'section' => 'footer',
        'settings' => 'footer_logo',
    )));

    //Footer About Title
    $wp_customize->add_setting('footer_about_title');
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'footer_about_title', array(
        'label' => __('Footer About Title', 'claystudio'),
        'section' => 'footer',
        'settings' => 'footer_about_title',
    )));

    //footer about description  
    $wp_customize->add_setting('footer_about_description');
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'footer_about_description', array(
        'label' => __('Footer About Description', 'claystudio'),
        'section' => 'footer',
        'settings' => 'footer_about_description',
        'type' => 'textarea',
    )));
    
}
add_action('customize_register', 'customizer_section_header');