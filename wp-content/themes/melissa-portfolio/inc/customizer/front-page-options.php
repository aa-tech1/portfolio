<?php
/**
 * Front Page Options
 *
 * @package Melissa_Portfolio
 */

$wp_customize->add_panel(
    'melissa_portfolio_front_page_options',
    array(
        'title'    => esc_html__( 'Front Page Sections', 'melissa-portfolio' ),
        'priority' => 130,
    )
);
require get_template_directory() . '/inc/customizer/front-page-options/left-options.php';
require get_template_directory() . '/inc/customizer/front-page-options/about.php';
require get_template_directory() . '/inc/customizer/front-page-options/resume.php';
require get_template_directory() . '/inc/customizer/front-page-options/project.php';
require get_template_directory() . '/inc/customizer/front-page-options/client.php';
require get_template_directory() . '/inc/customizer/front-page-options/price.php';
require get_template_directory() . '/inc/customizer/front-page-options/blog.php';
require get_template_directory() . '/inc/customizer/front-page-options/contact.php';
require get_template_directory() . '/inc/customizer/front-page-options/custom-html.php';
require get_template_directory() . '/inc/customizer/front-page-options/shortcode.php';
require get_template_directory() . '/inc/customizer/front-page-options/footer-options.php';
