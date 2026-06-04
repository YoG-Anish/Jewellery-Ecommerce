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

    //header text1 marquee
    $wp_customize->add_setting('header_marquee_text1'); // Add a setting for the header_marquee_text1
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'header_marquee_text1', array(
        'label' => __('Header Marquee Text 1', 'claystudio'),
        'section' => 'header',
        'settings' => 'header_marquee_text1',
    )));
    //header text2 marquee
    $wp_customize->add_setting('header_marquee_text2'); // Add a setting for the header_marquee_text2
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'header_marquee_text2', array(
        'label' => __('Header Marquee Text 2', 'claystudio'),
        'section' => 'header',
        'settings' => 'header_marquee_text2',
    )));
    //header text3 marquee
    $wp_customize->add_setting('header_marquee_text3'); // Add a setting for the header_marquee_text3
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'header_marquee_text3', array(
        'label' => __('Header Marquee Text 3', 'claystudio'),
        'section' => 'header',
        'settings' => 'header_marquee_text3',
    )));

    // 404 section dynamic
    $wp_customize->add_section('error_404', array(
        'title' => __('404 Page Settings', 'claystudio'),
        'priority' => 30,
    ));
    // 404 title
    $wp_customize->add_setting('error_404_title');
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'error_404_title', array(
        'label' => __('404 Page Title', 'claystudio'),
        'section' => 'error_404',
        'settings' => 'error_404_title',
    )));
    // 404 description
    $wp_customize->add_setting('error_404_description');
    $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'error_404_description', array(
        'label' => __('404 Page Description', 'claystudio'),
        'section' => 'error_404',
        'settings' => 'error_404_description',
        'type' => 'textarea',
    )));
}
add_action('customize_register', 'customizer_section_header');