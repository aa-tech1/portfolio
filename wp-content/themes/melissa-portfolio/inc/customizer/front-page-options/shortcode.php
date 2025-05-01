<?php
/**
 * Shortcode Section
 *
 * @package Melissa_Portfolio
 */

$wp_customize->add_section(
	'melissa_portfolio_shortcode_section',
	array(
		'panel'    => 'melissa_portfolio_front_page_options',
		'title'    => esc_html__( 'Shortcode', 'melissa-portfolio' ),
		'priority' => priority_section('melissa_portfolio_shortcode_section'),
	)
);

// Shortcode Section - Enable Section.
$wp_customize->add_setting(
	'melissa_portfolio_enable_shortcode_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'melissa_portfolio_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Melissa_Portfolio_Toggle_Switch_Custom_Control(
		$wp_customize,
		'melissa_portfolio_enable_shortcode_section',
		array(
			'label'    => esc_html__( 'Enable Shortcode Section', 'melissa-portfolio' ),
			'section'  => 'melissa_portfolio_shortcode_section',
			'settings' => 'melissa_portfolio_enable_shortcode_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'melissa_portfolio_enable_shortcode_section',
		array(
			'selector' => '#shortcode .section-link',
			'settings' => 'melissa_portfolio_enable_shortcode_section',
		)
	);
}

$wp_customize->add_setting(
    'melissa_portfolio_shortcode_section_content',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'melissa_portfolio_shortcode_section_content',
    array(
        'label'           => esc_html__( 'Shortcode', 'melissa-portfolio' ),
        'section'         => 'melissa_portfolio_shortcode_section',
        'settings'        => 'melissa_portfolio_shortcode_section_content',
        'type'            => 'text',
        'active_callback' => 'melissa_portfolio_is_shortcode_section_enabled',
    )
);