<?php
/**
 * Project Section
 *
 * @package Melissa_Portfolio
 */

$default_args = array(
    'panel'    => 'melissa_portfolio_front_page_options',
    'title'    => esc_html__( 'Project Section', 'melissa-portfolio' ),
    'priority' => priority_section('melissa_portfolio_project_section'),
);

//$wp_customize->add_section(
//    'melissa_portfolio_project_section',
//    $default_args
//);

$wp_customize->add_section(
    new Melissa_Portfolio_Custom_Section(
        $wp_customize,
        'melissa_portfolio_project_section',
        array_merge(
            $default_args,
            array(
                'button_text'      => __( 'Buy Pre', 'melissa-portfolio' ),
                'url'              => MELISSA_PORTFOLIO_URL_DEMO,
            )
        )
    )
);


// Project Section - Enable Section.
$wp_customize->add_setting(
	'melissa_portfolio_enable_project_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'melissa_portfolio_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Melissa_Portfolio_Toggle_Switch_Custom_Control(
		$wp_customize,
		'melissa_portfolio_enable_project_section',
		array(
			'label'    => esc_html__( 'Enable Project Section', 'melissa-portfolio' ),
			'section'  => 'melissa_portfolio_project_section',
			'settings' => 'melissa_portfolio_enable_project_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'melissa_portfolio_enable_project_section',
		array(
			'selector' => '#my-project .section-link',
			'settings' => 'melissa_portfolio_enable_project_section',
		)
	);
}

// Headline
$wp_customize->add_setting(
    'melissa_portfolio_project_section_headline',
    array(
        'default'           => __( 'My Project', 'melissa-portfolio' ),
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'melissa_portfolio_project_section_headline',
    array(
        'label'           => esc_html__( 'Headline', 'melissa-portfolio' ),
        'section'         => 'melissa_portfolio_project_section',
        'settings'        => 'melissa_portfolio_project_section_headline',
        'type'            => 'text',
        'active_callback' => 'melissa_portfolio_is_project_section_enabled',
    )
);

// List Project
$wp_customize->add_setting(
    'melissa_portfolio_resume_section_project_list',
    array(
        'default'           => '',
        'sanitize_callback' => 'customizer_repeater_sanitize',
    )
);
$wp_customize->add_control(
    new Melissa_Portfolio_Customize_Field_Repeater(
        $wp_customize,
        'melissa_portfolio_resume_section_project_list',
        array(
            'label'   => esc_html__('Project','melissa-portfolio'),
            'label_item'   => esc_html__('Project Item','melissa-portfolio'),
            'section' => 'melissa_portfolio_project_section',
            'custom_repeater_title_control' => true,
            'custom_repeater_repeater_fields' => array(
                'label' => array('List','Add Row','Delete Row'),
                'key' => 'custom_repeater_repeater_fields',
                'fields' => array(
                    'project_name' => array('class' => 'trigger_field', 'type' => 'text', 'label' => 'Name Project'),
                    'project_category' => array('class' => 'trigger_field', 'type' => 'text', 'label' => 'Category'),
                    'project_image' => array('class' => 'trigger_field', 'type' => 'image', 'label' => 'Image'),
                    'project_url' => array('class' => 'trigger_field', 'type' => 'text','label' => 'URL', 'placeholder' => '#'),
                )
            ),
            'active_callback' => 'melissa_portfolio_is_project_section_enabled',
        )
    )
);
