<?php

add_action( 'init', 'adas_kirki_customizer_setup' );
function adas_kirki_customizer_setup() {

    // Configure Kirki
    Kirki::add_config('adas_personal_portfolio_config', [
        'capability'  => 'edit_theme_options',
        'option_type' => 'theme_mod',
    ]);

    // Create Main Panel for Theme Options
    new \Kirki\Panel('adas_personal_portfolio_panel', [
        'priority'    => 1,
        'title'       => esc_html__('Adas: Theme Options', 'adas-personal-portfolio'),
        'description' => esc_html__('Customize your theme settings.', 'adas-personal-portfolio'),
    ]);


    // ========================
    // Theme Settings Section
    // ========================
    new \Kirki\Section('adas_personal_portfolio_theme', [
        'title'       => esc_html__('Theme Settings', 'adas-personal-portfolio'),
        'description' => esc_html__('Customize Global Options.', 'adas-personal-portfolio'),
        'panel'       => 'adas_personal_portfolio_panel',
        'priority'    => 10,
    ]);


    // Container Width Option
    new \Kirki\Field\Dimensions([
        'settings'    => 'adas_container_width',
        'label'       => esc_html__('Container Width', 'adas-personal-portfolio'),
        'section'     => 'adas_personal_portfolio_theme',
        'default'     => [
            'width' => '1200',
        ],
        'priority'    => 6,
        'transport'   => 'auto',
        'output'      => [
            [
                'element'     => '.container',
                'property'    => 'max-width',
                'choice'      => 'width',      // This tells Kirki to use only the width part
                'value_pattern' => '$px',      // 👈 This is the key to adding "px" at the end
            ],
        ],
    ]);
    

    // Typography
    new \Kirki\Field\Typography([
        'settings'  => 'adas_typography',
        'label'     => esc_html__('Body Typography', 'adas-personal-portfolio'),
        'section'   => 'adas_personal_portfolio_theme',
        'default'   => [
            'font-family'    => 'Poppins',
            'variant'        => '400',
            'font-size'      => '16px',
            'line-height'    => '28px',
            'letter-spacing' => '0',
            'text-transform' => 'none',
        ],
        'priority'  => 7,
        'transport' => 'auto',
        'output'    => [
            [
                'element' => 'body',
            ],
        ],
    ]);

    // Separator
    new \Kirki\Field\Custom([
        'settings' => 'adas_theme_separator',
        'section'  => 'adas_personal_portfolio_theme',
        'default'  => '<hr />',
        'priority' => 8,
    ]);

    // Main Color
    new \Kirki\Field\Color([
        'settings'  => 'adas_main_color',
        'label'     => esc_html__('Main Color', 'adas-personal-portfolio'),
        'section'   => 'adas_personal_portfolio_theme',
        'default'   => '#ef644c',
        'priority'  => 1,
        'transport' => 'auto',
        'output'    => [
            [
                'element'  => ':root',
                'property' => '--adas-personal-portfolio-primary',
            ],
        ],
    ]);

    // Heading Color
    new \Kirki\Field\Color([
        'settings'  => 'adas_heading_color',
        'label'     => esc_html__('Heading Color', 'adas-personal-portfolio'),
        'section'   => 'adas_personal_portfolio_theme',
        'default'   => '#273e62',
        'priority'  => 2,
        'transport' => 'auto',
        'output'    => [
            [
                'element'  => 'body',
                'property' => '--adas-personal-portfolio-heading',
            ],
        ],
    ]);

    // Paragraph Color
    new \Kirki\Field\Color([
        'settings'  => 'adas_paragraph_color',
        'label'     => esc_html__('Paragraph Color', 'adas-personal-portfolio'),
        'section'   => 'adas_personal_portfolio_theme',
        'default'   => '#555',
        'priority'  => 3,
        'transport' => 'auto',
        'output'    => [
            [
                'element'  => 'body p',
                'property' => 'color',
            ],
        ],
    ]);



    new \Kirki\Field\Checkbox_Switch([
        'settings' => 'adas_header',
        'type'     => 'switch',
        'label'    => esc_html__( 'Front Page Header ON/OFF', 'adas-personal-portfolio' ),
        'section'  => 'adas_personal_portfolio_theme',
        'default'  => 'on',
        'priority' => 10,
        'choices'  => [
            'on'  => esc_html__( 'Enable', 'adas-personal-portfolio' ),
            'off' => esc_html__( 'Disable', 'adas-personal-portfolio' ),
        ],
    ]);


}