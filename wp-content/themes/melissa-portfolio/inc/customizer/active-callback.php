<?php
/**
 * Active Callbacks
 *
 * @package Melissa_Portfolio
 */

// Theme Options.
function melissa_portfolio_is_pagination_enabled( $control ) {
	return ( $control->manager->get_setting( 'melissa_portfolio_enable_pagination' )->value() );
}
function melissa_portfolio_is_breadcrumb_enabled( $control ) {
	return ( $control->manager->get_setting( 'melissa_portfolio_enable_breadcrumb' )->value() );
}

// About Section
function melissa_portfolio_is_skill_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'melissa_portfolio_enable_about_section' )->value() );
}

// Check if static home page is enabled.
function melissa_portfolio_is_static_homepage_enabled( $control ) {
	return ( 'page' === $control->manager->get_setting( 'show_on_front' )->value() );
}
function melissa_portfolio_is_about_section_enabled( $control ) {
    return ( $control->manager->get_setting( 'melissa_portfolio_enable_about_section' )->value() );
}
function melissa_portfolio_is_resume_section_enabled( $control ) {
    return ( $control->manager->get_setting( 'melissa_portfolio_enable_resume_section' )->value() );
}
function melissa_portfolio_is_project_section_enabled( $control ) {
    return ( $control->manager->get_setting( 'melissa_portfolio_enable_project_section' )->value() );
}
function melissa_portfolio_is_client_section_enabled( $control ) {
    return ( $control->manager->get_setting( 'melissa_portfolio_enable_client_section' )->value() );
}
function melissa_portfolio_is_price_section_enabled( $control ) {
    return ( $control->manager->get_setting( 'melissa_portfolio_enable_price_section' )->value() );
}
function melissa_portfolio_is_blog_section_enabled( $control ) {
    return ( $control->manager->get_setting( 'melissa_portfolio_enable_blog_section' )->value() );
}
function melissa_portfolio_is_contact_section_enabled( $control ) {
    return ( $control->manager->get_setting( 'melissa_portfolio_enable_contact_section' )->value() );
}
function melissa_portfolio_is_custom_html_section_enabled( $control ) {
    return ( $control->manager->get_setting( 'melissa_portfolio_enable_custom_html_section' )->value() );
}
function melissa_portfolio_is_shortcode_section_enabled( $control ) {
    return ( $control->manager->get_setting( 'melissa_portfolio_enable_shortcode_section' )->value() );
}
