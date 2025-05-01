<?php
/**
 * Client Section
 *
 * @package Melissa_Portfolio
 */

$wp_customize->add_section(
	'melissa_portfolio_client_section',
	array(
		'panel'    => 'melissa_portfolio_front_page_options',
		'title'    => esc_html__( 'Client Section', 'melissa-portfolio' ),
		'priority' => priority_section('melissa_portfolio_client_section'),
	)
);

// Project Section - Enable Section.
$wp_customize->add_setting(
	'melissa_portfolio_enable_client_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'melissa_portfolio_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Melissa_Portfolio_Toggle_Switch_Custom_Control(
		$wp_customize,
		'melissa_portfolio_enable_client_section',
		array(
			'label'    => esc_html__( 'Enable Client Section', 'melissa-portfolio' ),
			'section'  => 'melissa_portfolio_client_section',
			'settings' => 'melissa_portfolio_enable_client_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'melissa_portfolio_enable_client_section',
		array(
			'selector' => '#my-client .section-link',
			'settings' => 'melissa_portfolio_enable_client_section',
		)
	);
}

// Headline
$wp_customize->add_setting(
    'melissa_portfolio_client_section_headline',
    array(
        'default'           => __( 'My Client', 'melissa-portfolio' ),
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'melissa_portfolio_client_section_headline',
    array(
        'label'           => esc_html__( 'Headline', 'melissa-portfolio' ),
        'section'         => 'melissa_portfolio_client_section',
        'settings'        => 'melissa_portfolio_client_section_headline',
        'type'            => 'text',
        'active_callback' => 'melissa_portfolio_is_client_section_enabled',
    )
);

// List Client
$wp_customize->add_setting(
    'melissa_portfolio_resume_section_client_list',
    array(
        'default'           => '',
        'sanitize_callback' => 'customizer_repeater_sanitize',
    )
);
$wp_customize->add_control(
    new Melissa_Portfolio_Customize_Field_Repeater(
        $wp_customize,
        'melissa_portfolio_resume_section_client_list',
        array(
            'label'   => esc_html__('Client','melissa-portfolio'),
            'label_item'   => esc_html__('Client Item','melissa-portfolio'),
            'section' => 'melissa_portfolio_client_section',
            'custom_repeater_repeater_fields' => array(
                'label' => array('List','Add Row','Delete Row'),
                'key' => 'custom_repeater_repeater_fields',
                'fields' => array(
                    'client_image' => array('class' => 'trigger_field', 'type' => 'image', 'label' => 'Avatar'),
                    'client_content' => array('class' => 'trigger_field', 'type' => 'textarea', 'label' => 'Content'),
                    'client_name' => array('class' => 'trigger_field', 'type' => 'text','label' => 'Name'),
                    'client_job' => array('class' => 'trigger_field', 'type' => 'text','label' => 'Job position'),
                )
            ),
            'active_callback' => 'melissa_portfolio_is_client_section_enabled',
        )
    )
);