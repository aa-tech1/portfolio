<?php
/**
 * Blog Section
 *
 * @package Melissa_Portfolio
 */

$wp_customize->add_section(
	'melissa_portfolio_blog_section',
	array(
		'panel'    => 'melissa_portfolio_front_page_options',
		'title'    => esc_html__( 'Blog Section', 'melissa-portfolio' ),
		'priority' => priority_section('melissa_portfolio_blog_section'),
        'description' => esc_html__( 'Blog section options.', 'melissa-portfolio' ),
	)
);

// Project Section - Enable Section.
$wp_customize->add_setting(
	'melissa_portfolio_enable_blog_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'melissa_portfolio_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Melissa_Portfolio_Toggle_Switch_Custom_Control(
		$wp_customize,
		'melissa_portfolio_enable_blog_section',
		array(
			'label'    => esc_html__( 'Enable Blog Section', 'melissa-portfolio' ),
			'section'  => 'melissa_portfolio_blog_section',
			'settings' => 'melissa_portfolio_enable_blog_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'melissa_portfolio_enable_blog_section',
		array(
			'selector' => '#my-blog .section-link',
			'settings' => 'melissa_portfolio_enable_blog_section',
		)
	);
}

// Headline
$wp_customize->add_setting(
    'melissa_portfolio_blog_section_headline',
    array(
        'default'           => __( 'My Blog', 'melissa-portfolio' ),
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'melissa_portfolio_blog_section_headline',
    array(
        'label'           => esc_html__( 'Headline', 'melissa-portfolio' ),
        'section'         => 'melissa_portfolio_blog_section',
        'settings'        => 'melissa_portfolio_blog_section_headline',
        'type'            => 'text',
        'active_callback' => 'melissa_portfolio_is_blog_section_enabled',
    )
);

// List blog
$wp_customize->add_setting(
    'melissa_portfolio_blog_list',
    array(
        'sanitize_callback' => 'sanitize_array',
    )
);
$wp_customize->add_control(
    new Melissa_Portfolio_Customize_Select_Multiple(
        $wp_customize,
        'melissa_portfolio_blog_list',
        array(
            'label'           => esc_html__( 'Select List', 'melissa-portfolio' ),
            'description'           => esc_html__( 'Can you choosen multiple', 'melissa-portfolio' ),
            'section'         => 'melissa_portfolio_blog_section',
            'settings' => 'melissa_portfolio_blog_list',
            'choices' => melissa_portfolio_get_post_choices(),
            'height' => general_height_from_count_post(melissa_portfolio_get_post_choices()),
            'active_callback' => 'melissa_portfolio_is_blog_section_enabled',
        )
    )
);

// Button text
$wp_customize->add_setting(
    'melissa_portfolio_blog_section_button_text',
    array(
        'default'           => __( 'View All', 'melissa-portfolio' ),
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'melissa_portfolio_blog_section_button_text',
    array(
        'label'           => esc_html__( 'Button Text', 'melissa-portfolio' ),
        'section'         => 'melissa_portfolio_blog_section',
        'settings'        => 'melissa_portfolio_blog_section_button_text',
        'type'            => 'text',
        'active_callback' => 'melissa_portfolio_is_blog_section_enabled',
    )
);

// Button url
$wp_customize->add_setting(
    'melissa_portfolio_blog_section_button_url',
    array(
        'default'           => __( '#', 'melissa-portfolio' ),
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'melissa_portfolio_blog_section_button_url',
    array(
        'label'           => esc_html__( 'Button URL', 'melissa-portfolio' ),
        'section'         => 'melissa_portfolio_blog_section',
        'settings'        => 'melissa_portfolio_blog_section_button_url',
        'type'            => 'text',
        'active_callback' => 'melissa_portfolio_is_blog_section_enabled',
    )
);