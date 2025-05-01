<?php
/**
 * Price Section
 *
 * @package Melissa_Portfolio
 */

$default_args = array(
    'panel'    => 'melissa_portfolio_front_page_options',
    'title'    => esc_html__( 'Price Section', 'melissa-portfolio' ),
    'priority' => priority_section('melissa_portfolio_price_section'),
);
$wp_customize->add_section(
    'melissa_portfolio_price_section',
    $default_args
);

// Project Section - Enable Section.
$wp_customize->add_setting(
	'melissa_portfolio_enable_price_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'melissa_portfolio_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Melissa_Portfolio_Toggle_Switch_Custom_Control(
		$wp_customize,
		'melissa_portfolio_enable_price_section',
		array(
			'label'    => esc_html__( 'Enable Price Section', 'melissa-portfolio' ),
			'section'  => 'melissa_portfolio_price_section',
			'settings' => 'melissa_portfolio_enable_price_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'melissa_portfolio_enable_price_section',
		array(
			'selector' => '#price .section-link',
			'settings' => 'melissa_portfolio_enable_price_section',
		)
	);
}

// Headline
$wp_customize->add_setting(
    'melissa_portfolio_price_section_headline',
    array(
        'default'           => __( 'Price', 'melissa-portfolio' ),
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'melissa_portfolio_price_section_headline',
    array(
        'label'           => esc_html__( 'Headline', 'melissa-portfolio' ),
        'section'         => 'melissa_portfolio_price_section',
        'settings'        => 'melissa_portfolio_price_section_headline',
        'type'            => 'text',
        'active_callback' => 'melissa_portfolio_is_price_section_enabled',
    )
);

// List Client
$wp_customize->add_setting(
    'melissa_portfolio_resume_section_price_list',
    array(
        'default'           => '',
        'sanitize_callback' => 'customizer_repeater_sanitize',
    )
);
$wp_customize->add_control(
    new Melissa_Portfolio_Customize_Field_Repeater(
        $wp_customize,
        'melissa_portfolio_resume_section_price_list',
        array(
            'label'   => esc_html__('Price Item','melissa-portfolio'),
            'label_item'   => esc_html__('Price Item','melissa-portfolio'),
            'section' => 'melissa_portfolio_price_section',
            'custom_repeater_repeater_fields' => array(
                'label' => array('List','Add Row','Delete Row'),
                'key' => 'custom_repeater_repeater_fields',
                'fields' => array(
                    'price_title' => array('class' => 'trigger_field', 'type' => 'text','label' => 'Title'),
                    'price_value' => array('class' => 'trigger_field', 'type' => 'text', 'label' => 'Price'),
                    'price_description' => array('class' => 'trigger_field', 'type' => 'textarea','label' => 'Description'),
                    'price_button_text' => array('class' => 'trigger_field', 'type' => 'text','label' => 'Button Text'),
                    'price_button_url' => array('class' => 'trigger_field', 'type' => 'text','label' => 'Button URL'),
                )
            ),
            'active_callback' => 'melissa_portfolio_is_price_section_enabled',
        )
    )
);