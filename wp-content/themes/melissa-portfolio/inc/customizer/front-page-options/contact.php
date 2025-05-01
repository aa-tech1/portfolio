<?php
/**
 * About Section
 *
 * @package Melissa_Portfolio
 */

$wp_customize->add_section(
	'melissa_portfolio_contact_section',
	array(
		'panel'    => 'melissa_portfolio_front_page_options',
		'title'    => esc_html__( 'Contact Section', 'melissa-portfolio' ),
		'priority' => priority_section('melissa_portfolio_contact_section'),
	)
);

// About Section - Enable Section.
$wp_customize->add_setting(
	'melissa_portfolio_enable_contact_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'melissa_portfolio_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Melissa_Portfolio_Toggle_Switch_Custom_Control(
		$wp_customize,
		'melissa_portfolio_enable_contact_section',
		array(
			'label'    => esc_html__( 'Enable About Section', 'melissa-portfolio' ),
			'section'  => 'melissa_portfolio_contact_section',
			'settings' => 'melissa_portfolio_enable_contact_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'melissa_portfolio_enable_contact_section',
		array(
			'selector' => '#contact .section-link',
			'settings' => 'melissa_portfolio_enable_contact_section',
		)
	);
}

// Headline
$wp_customize->add_setting(
    'melissa_portfolio_contact_section_headline',
    array(
        'default'           => __( 'Contact me', 'melissa-portfolio' ),
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'melissa_portfolio_contact_section_headline',
    array(
        'label'           => esc_html__( 'Headline', 'melissa-portfolio' ),
        'section'         => 'melissa_portfolio_contact_section',
        'settings'        => 'melissa_portfolio_contact_section_headline',
        'type'            => 'text',
        'active_callback' => 'melissa_portfolio_is_contact_section_enabled',
    )
);

// Fields
$wp_customize->add_setting(
    'melissa_portfolio_contact_section_list',
    array(
        'default'           => '',
        'sanitize_callback' => 'customizer_repeater_sanitize',
    )
);
$wp_customize->add_control(
    new Melissa_Portfolio_Customize_Field_Repeater(
        $wp_customize,
        'melissa_portfolio_contact_section_list',
        array(
            'label'   => esc_html__('Contact Item','melissa-portfolio'),
            'label_item'   => esc_html__('Contact Item','melissa-portfolio'),
            'section' => 'melissa_portfolio_contact_section',
            'custom_repeater_icon_control' => true,
            'custom_repeater_text_control' => true,
            'custom_repeater_text2_control' => true,
            'active_callback' => 'melissa_portfolio_is_contact_section_enabled',
        )
    )
);

$wp_customize->add_setting(
    'melissa_portfolio_contact_section_form',
    array(
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'melissa_portfolio_contact_section_form',
    array(
        'label'           => esc_html__( 'Form', 'melissa-portfolio' ),
        'section'         => 'melissa_portfolio_contact_section',
        'settings'        => 'melissa_portfolio_contact_section_form',
        'type'            => 'text',
        'active_callback' => 'melissa_portfolio_is_contact_section_enabled',
    )
);