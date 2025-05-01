<?php
/**
 * Resume Section
 *
 * @package Melissa_Portfolio
 */

$default_args = array(
    'panel'    => 'melissa_portfolio_front_page_options',
    'title'    => esc_html__( 'Resume Section', 'melissa-portfolio' ),
    'priority' => priority_section('melissa_portfolio_resume_section'),
);

//$wp_customize->add_section(
//    'melissa_portfolio_resume_section',
//    $default_args
//);

$wp_customize->add_section(
    new Melissa_Portfolio_Custom_Section(
        $wp_customize,
        'melissa_portfolio_resume_section',
        array_merge(
            $default_args,
            array(
                'button_text'      => __( 'Buy Pre', 'melissa-portfolio' ),
                'url'              => MELISSA_PORTFOLIO_URL_DEMO,
            )
        )
    )
);

// Skill Section - Enable Section.
$wp_customize->add_setting(
	'melissa_portfolio_enable_resume_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'melissa_portfolio_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Melissa_Portfolio_Toggle_Switch_Custom_Control(
		$wp_customize,
		'melissa_portfolio_enable_resume_section',
		array(
			'label'    => esc_html__( 'Enable Resume Section', 'melissa-portfolio' ),
			'section'  => 'melissa_portfolio_resume_section',
			'settings' => 'melissa_portfolio_enable_resume_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'melissa_portfolio_enable_resume_section',
		array(
			'selector' => '#my-resume .section-link',
			'settings' => 'melissa_portfolio_enable_resume_section',
		)
	);
}


// Headline
$wp_customize->add_setting(
    'melissa_portfolio_resume_section_headline',
    array(
        'default'           => __( 'My Resume', 'melissa-portfolio' ),
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'melissa_portfolio_resume_section_headline',
    array(
        'label'           => esc_html__( 'Headline', 'melissa-portfolio' ),
        'section'         => 'melissa_portfolio_resume_section',
        'settings'        => 'melissa_portfolio_resume_section_headline',
        'type'            => 'text',
        'active_callback' => 'melissa_portfolio_is_resume_section_enabled',
    )
);

// Skill & List Skill
$wp_customize->add_setting(
    'melissa_portfolio_resume_section_skill_list',
    array(
        'default'           => '',
        'sanitize_callback' => 'customizer_repeater_sanitize',
    )
);
$wp_customize->add_control(
    new Melissa_Portfolio_Customize_Field_Repeater(
        $wp_customize,
        'melissa_portfolio_resume_section_skill_list',
        array(
            'label'   => esc_html__('Resume','melissa-portfolio'),
            'label_item'   => esc_html__('Resume Item','melissa-portfolio'),
            'section' => 'melissa_portfolio_resume_section',
            'custom_repeater_title_control' => true,
            'custom_repeater_radio_control' => array(
                'name' => 'radio_type',
                'id' => 'radio_type',
                'label' => esc_html__( 'Type', 'melissa-portfolio' ),
                'description' => esc_html__( 'This is a custom radio input.', 'melissa-portfolio' ),
                'choices' => array(
                    'type_1' => esc_html__( 'Type 1 (for Precent)', 'melissa-portfolio' ),
                    'type_2' => esc_html__( 'Type 2 (for Content)', 'melissa-portfolio' ),
                ),
            ),
            'custom_repeater_repeater_fields' => array(
                'label' => array('List','Add Row','Delete Row'),
                'key' => 'custom_repeater_repeater_fields',
                'fields' => array(
                    'skill_title' => array('class' => 'trigger_field', 'type' => 'text', 'label' => 'Label'),
                    'skill_precent' => array('class' => 'trigger_field', 'type' => 'text','label' => 'Precent', 'placeholder' => '1-10'),
                    'skill_content' => array('class' => 'trigger_field', 'type' => 'textarea','label' => 'Content'),
                )
            ),
            'active_callback' => 'melissa_portfolio_is_resume_section_enabled',
        )
    )
);

