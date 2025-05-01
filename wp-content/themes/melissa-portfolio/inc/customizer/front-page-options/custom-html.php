<?php
/**
 * Custom HTML Section
 *
 * @package Minimal_Shop_Ecommerce
 */

$wp_customize->add_section(
	'melissa_portfolio_custom_html_section',
	array(
		'panel'    => 'melissa_portfolio_front_page_options',
		'title'    => esc_html__( 'Custom HTML', 'melissa-portfolio' ),
		'priority' => priority_section('melissa_portfolio_custom_html_section'),
	)
);

// About Section - Enable Section.
$wp_customize->add_setting(
	'melissa_portfolio_enable_custom_html_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'melissa_portfolio_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Melissa_Portfolio_Toggle_Switch_Custom_Control(
		$wp_customize,
		'melissa_portfolio_enable_custom_html_section',
		array(
			'label'    => esc_html__( 'Enable Custom HTML Section', 'melissa-portfolio' ),
			'section'  => 'melissa_portfolio_custom_html_section',
			'settings' => 'melissa_portfolio_enable_custom_html_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'melissa_portfolio_enable_custom_html_section',
		array(
			'selector' => '#custom-html .section-link',
			'settings' => 'melissa_portfolio_enable_custom_html_section',
		)
	);
}

$wp_customize->add_setting(
    'melissa_portfolio_custom_html',
    array(
        'sanitize_callback' => 'wp_kses_post',
    )
);
$wp_customize->add_control( new Melissa_Portfolio_WP_Customize_TinyMCE_Control(
    $wp_customize,
    'melissa_portfolio_custom_html', array(
    'label'           => esc_html__( 'Custom', 'melissa-portfolio' ),
    'description'           => esc_html__( 'Custom html', 'melissa-portfolio' ),
    'section'     => 'melissa_portfolio_custom_html_section',
    'settings'    => 'melissa_portfolio_custom_html',
    'type'        => 'textarea',
    'input_attrs' => [
//        'toolbar1'     => 'formatselect bold italic link bullist',
        'height'       => 300,
        'mediaButtons' => true,
    ],
    'active_callback' => 'melissa_portfolio_is_custom_html_section_enabled',
) ) );