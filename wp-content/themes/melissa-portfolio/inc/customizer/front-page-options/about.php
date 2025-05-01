<?php
/**
 * About Section
 *
 * @package Melissa_Portfolio
 */

$wp_customize->add_section(
	'melissa_portfolio_about_section',
	array(
		'panel'    => 'melissa_portfolio_front_page_options',
		'title'    => esc_html__( 'About Section', 'melissa-portfolio' ),
		'priority' => priority_section('melissa_portfolio_about_section'),
	)
);

// About Section - Enable Section.
$wp_customize->add_setting(
	'melissa_portfolio_enable_about_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'melissa_portfolio_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Melissa_Portfolio_Toggle_Switch_Custom_Control(
		$wp_customize,
		'melissa_portfolio_enable_about_section',
		array(
			'label'    => esc_html__( 'Enable About Section', 'melissa-portfolio' ),
			'section'  => 'melissa_portfolio_about_section',
			'settings' => 'melissa_portfolio_enable_about_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'melissa_portfolio_enable_about_section',
		array(
			'selector' => '#about-me .section-link',
			'settings' => 'melissa_portfolio_enable_about_section',
		)
	);
}

// Headline
$wp_customize->add_setting(
    'melissa_portfolio_about_section_headline',
    array(
        'default'           => __( 'About me', 'melissa-portfolio' ),
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'melissa_portfolio_about_section_headline',
    array(
        'label'           => esc_html__( 'Headline', 'melissa-portfolio' ),
        'section'         => 'melissa_portfolio_about_section',
        'settings'        => 'melissa_portfolio_about_section_headline',
        'type'            => 'text',
        'active_callback' => 'melissa_portfolio_is_about_section_enabled',
    )
);

// Avatar
$wp_customize->add_setting(
    'melissa_portfolio_about_avatar',
    array(
        'sanitize_callback' => 'melissa_portfolio_sanitize_image',
    )
);
$wp_customize->add_control(
    new WP_Customize_Image_Control(
        $wp_customize,
        'melissa_portfolio_about_avatar',
        array(
            'label'           => esc_html__( 'Avatar Image', 'melissa-portfolio' ),
            'section'         => 'melissa_portfolio_about_section',
            'settings'        => 'melissa_portfolio_about_avatar',
            'active_callback' => 'melissa_portfolio_is_about_section_enabled',
        )
    )
);

// Name
$wp_customize->add_setting(
    'melissa_portfolio_about_section_name',
    array(
        'default'           => __( 'I Am Melissa Anderson.', 'melissa-portfolio' ),
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'melissa_portfolio_about_section_name',
    array(
        'label'           => esc_html__( 'Full Name', 'melissa-portfolio' ),
        'section'         => 'melissa_portfolio_about_section',
        'settings'        => 'melissa_portfolio_about_section_name',
        'type'            => 'text',
        'active_callback' => 'melissa_portfolio_is_about_section_enabled',
    )
);

// Short Job
$wp_customize->add_setting(
    'melissa_portfolio_about_section_short_job',
    array(
        'default'           => __( 'UI/UX Designer & Developer', 'melissa-portfolio' ),
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'melissa_portfolio_about_section_short_job',
    array(
        'label'           => esc_html__( 'Short Job', 'melissa-portfolio' ),
        'section'         => 'melissa_portfolio_about_section',
        'settings'        => 'melissa_portfolio_about_section_short_job',
        'type'            => 'text',
        'active_callback' => 'melissa_portfolio_is_about_section_enabled',
    )
);

// Residence & Residence Value
$wp_customize->add_setting(
    'melissa_portfolio_about_section_residence',
    array(
        'default'           => __( 'Residence', 'melissa-portfolio' ),
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'melissa_portfolio_about_section_residence',
    array(
        'label'           => esc_html__( 'Residence', 'melissa-portfolio' ),
        'section'         => 'melissa_portfolio_about_section',
        'settings'        => 'melissa_portfolio_about_section_residence',
        'type'            => 'text',
        'active_callback' => 'melissa_portfolio_is_about_section_enabled',
    )
);
$wp_customize->add_setting(
    'melissa_portfolio_about_section_residence_value',
    array(
        'default'           => __( 'Singapore', 'melissa-portfolio' ),
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'melissa_portfolio_about_section_residence_value',
    array(
        'label'           => esc_html__( 'Residence Value', 'melissa-portfolio' ),
        'section'         => 'melissa_portfolio_about_section',
        'settings'        => 'melissa_portfolio_about_section_residence_value',
        'type'            => 'text',
        'active_callback' => 'melissa_portfolio_is_about_section_enabled',
    )
);

// Experience & Experience Value
$wp_customize->add_setting(
    'melissa_portfolio_about_section_experience',
    array(
        'default'           => __( 'Experience', 'melissa-portfolio' ),
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'melissa_portfolio_about_section_experience',
    array(
        'label'           => esc_html__( 'Experience Title', 'melissa-portfolio' ),
        'section'         => 'melissa_portfolio_about_section',
        'settings'        => 'melissa_portfolio_about_section_experience',
        'type'            => 'text',
        'active_callback' => 'melissa_portfolio_is_about_section_enabled',
    )
);
$wp_customize->add_setting(
    'melissa_portfolio_about_section_experience_value',
    array(
        'default'           => __( '7+ Years', 'melissa-portfolio' ),
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'melissa_portfolio_about_section_experience_value',
    array(
        'label'           => esc_html__( 'Experience Value', 'melissa-portfolio' ),
        'section'         => 'melissa_portfolio_about_section',
        'settings'        => 'melissa_portfolio_about_section_experience_value',
        'type'            => 'text',
        'active_callback' => 'melissa_portfolio_is_about_section_enabled',
    )
);

// Date of Birth & Date of Birth Value
$wp_customize->add_setting(
    'melissa_portfolio_about_section_birthday',
    array(
        'default'           => __( 'Date of Birth', 'melissa-portfolio' ),
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'melissa_portfolio_about_section_birthday',
    array(
        'label'           => esc_html__( 'Date of Birth', 'melissa-portfolio' ),
        'section'         => 'melissa_portfolio_about_section',
        'settings'        => 'melissa_portfolio_about_section_birthday',
        'type'            => 'text',
        'active_callback' => 'melissa_portfolio_is_about_section_enabled',
    )
);
$wp_customize->add_setting(
    'melissa_portfolio_about_section_birthday_value',
    array(
        'default'           => __( '01 July 1990', 'melissa-portfolio' ),
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'melissa_portfolio_about_section_birthday_value',
    array(
        'label'           => esc_html__( 'Date of Birth Value', 'melissa-portfolio' ),
        'section'         => 'melissa_portfolio_about_section',
        'settings'        => 'melissa_portfolio_about_section_birthday_value',
        'type'            => 'text',
        'active_callback' => 'melissa_portfolio_is_about_section_enabled',
    )
);

// Banner Section - Short Description.
$wp_customize->add_setting(
    'melissa_portfolio_about_section_description',
    array(
        'default'           => '<p>Senior UX designer with 7+years experience and specialization in complex web application design.</p>
                                <p>Achieved 15% increase in user satisfaction and 20% increase in conversions through the creation of interactively tested, data-driven, and user-centered design.</p>',
        'sanitize_callback' => 'wp_kses_post',
    )
);
$wp_customize->add_control(
    'melissa_portfolio_about_section_description',
    array(
        'label'           => esc_html__( 'Description', 'melissa-portfolio' ),
        'section'         => 'melissa_portfolio_about_section',
        'settings'        => 'melissa_portfolio_about_section_description',
        'type'            => 'textarea',
        'active_callback' => 'melissa_portfolio_is_about_section_enabled',
    )
);