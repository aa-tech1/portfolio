<?php
/**
 * Front Page Left Options
 *
 * @package Melissa_Portfolio
 */

$wp_customize->add_section(
    'melissa_portfolio_left_options',
    array(
        'title'    => esc_html__( 'Front Page Left', 'melissa-portfolio' ),
    )
);

$wp_customize->add_setting(
    'melissa_portfolio_left_introduction_text',
    array(
        'default'           => __( 'I am', 'melissa-portfolio' ),
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    'melissa_portfolio_left_introduction_text',
    array(
        'label'           => esc_html__( 'Introduction Text', 'melissa-portfolio' ),
        'section'         => 'melissa_portfolio_left_options',
        'settings'        => 'melissa_portfolio_left_introduction_text',
        'type'            => 'text',
    )
);

$wp_customize->add_setting(
    'melissa_portfolio_left_featured_text',
    array(
        'default'           => '"Joe Morgan.","Designer","Developer"',
        'sanitize_callback' => 'wp_kses',
    )
);

$wp_customize->add_control(
    new Melissa_Portfolio_Multi_Input_Custom_control(
        $wp_customize,
        'melissa_portfolio_left_featured_text',
        array(
            'label'           => esc_html__( 'Featured Text List', 'melissa-portfolio' ),
            'section'         => 'melissa_portfolio_left_options',
            'settings'        => 'melissa_portfolio_left_featured_text',
        )
    )
);

$wp_customize->add_setting(
    'melissa_portfolio_left_introduction_second_text',
    array(
        'default'           => __( 'What I feel happy is a perfect product', 'melissa-portfolio' ),
        'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control(
    'melissa_portfolio_left_introduction_second_text',
    array(
        'label'           => esc_html__( 'Introduction Text Below', 'melissa-portfolio' ),
        'section'         => 'melissa_portfolio_left_options',
        'settings'        => 'melissa_portfolio_left_introduction_second_text',
        'type'            => 'text',
    )
);

// Skill & List Skill
$wp_customize->add_setting(
    'melissa_portfolio_left_social',
    array(
        'default'           => '',
        'sanitize_callback' => 'customizer_repeater_sanitize',
    )
);
$wp_customize->add_control(
    new Melissa_Portfolio_Customize_Field_Repeater(
        $wp_customize,
        'melissa_portfolio_left_social',
        array(
            'label'   => esc_html__('Social','melissa-portfolio'),
            'intro'   => esc_html__('List social show in navigation','melissa-portfolio'),
            'label_item'   => esc_html__('Social Item','melissa-portfolio'),
            'section' => 'melissa_portfolio_left_options',
            'custom_repeater_link_control' => true,
            'custom_repeater_icon_control' => true,
            'active_callback' => 'melissa_portfolio_is_resume_section_enabled',
        )
    )
);

// Button url
$wp_customize->add_setting(
    'melissa_portfolio_left_background',
    array(
        'default'           => '#d8cec4',
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'melissa_portfolio_left_background',
    array(
        'label'           => esc_html__( 'Background color', 'melissa-portfolio' ),
        'section'         => 'melissa_portfolio_left_options',
        'settings'        => 'melissa_portfolio_left_background',
        'type'            => 'select',
        'active_callback' => 'melissa_portfolio_is_resume_section_enabled',
        'choices'  => array(
            '#d8cec4' => '#d8cec4',
            '#c4d8ce' => '#c4d8ce',
            '#d8c4c4' => '#d8c4c4',
            '#d0d8c4' => '#d0d8c4',
            '#c4d6d8' => '#c4d6d8',
            '#c6c4d8' => '#c6c4d8',
            '#d1c4d8' => '#d1c4d8',
            '#d8c4c7' => '#d8c4c7',
        )
    )
);