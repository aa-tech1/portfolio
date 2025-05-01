<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Adas Personal Portfolio
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function adas_personal_portfolio_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) && ! is_active_sidebar( 'sidebar-2' )  ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'adas_personal_portfolio_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function adas_personal_portfolio_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'adas_personal_portfolio_pingback_header' );


// Define the function to check Elementor activation and usage
function adas_personal_portfolio_active() {
    // Check if Elementor is active
    if (defined('ELEMENTOR_PATH')) {
        // Check if the current page is built with Elementor
        $post_id = get_queried_object_id();
        if (\Elementor\Plugin::$instance->db->is_built_with_elementor($post_id)) {
            return 'container-elementor';
        }
    }
}
// Hook the function to an appropriate action (e.g., init)
add_action('init', 'adas_personal_portfolio_active');

// Post Excerpt Limit
function adas_personal_portfolio_wpdocs_custom_excerpt_length( $length ) {
    $excerptlength = absint(get_theme_mod('adas_personal_portfolio_post_excerpt',22));
    return $excerptlength;
}
add_filter( 'excerpt_length', 'adas_personal_portfolio_wpdocs_custom_excerpt_length', 999 );


// Dashboard Notice for Theme Setup

function adas_personal_portfolio_display_dashboard_notice() {
    $screen = get_current_screen();

    // Show only on Dashboard and Themes page
    if ( $screen && in_array( $screen->base, array( 'dashboard', 'themes' ) ) ) {
        ?>
        <div class="notice notice-info is-dismissible" style="font-size:16px; padding:25px;">
            <strong>
                <?php 
                printf( esc_html__( 'Welcome , %s — Thanks for using Adas Portfolio!', 'adas-personal-portfolio' ), esc_html( get_bloginfo( 'name' ) ) ); 
                ?>
            </strong>

            <h3 style="margin: 15px 0 10px;">
                <?php esc_html_e( 'Unlock the Full Power of Adas with the 🚀 Premium Version ', 'adas-personal-portfolio' ); ?>
            </h3>

            <p style="margin: 10px 0 10px; font-size:16px">
                <?php esc_html_e( 'Multiple ready-made demo websites, ⚡ One-click demo import for instant setup, 🌗 Dark & Light mode switcher, Custom Elementor widgets with full flexibility, 🎨 Advanced styling and layout controls.', 'adas-personal-portfolio' ); ?>
            </p>
            <p>
                <a href="<?php echo esc_url( 'https://pencilwp.com/product/adas-pro' ); ?>" class="button button-primary" style="margin-right:10px; padding:3px 15px; font-size:15px" target="_blank" rel="noopener noreferrer">
                    🚀 <?php esc_html_e( 'Upgrade to Pro', 'adas-personal-portfolio' ); ?>
                </a>
                <a href="<?php echo esc_url( 'https://demo.pencilwp.com/preview/adas-wp/' ); ?>" class="button button-secondary" style="margin-right:10px; padding:3px 15px; font-size:15px" target="_blank" rel="noopener noreferrer">
                    👀 <?php esc_html_e( 'View Pro Demos', 'adas-personal-portfolio' ); ?>
                </a>
                <a href="<?php echo esc_url( 'https://pencilwp.com/docs/adas-personal-setup/' ); ?>" class="button" style="margin-right:10px; padding:3px 15px; font-size:15px" target="_blank" rel="noopener noreferrer">
                    🛠️ <?php esc_html_e( 'Setup Free Version', 'adas-personal-portfolio' ); ?>
                </a>
                <a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button button-secondary" style="margin-right:10px; padding:3px 15px; font-size:15px">
                    🖌️ <?php esc_html_e( 'Theme Settings', 'adas-personal-portfolio' ); ?>
                </a>
            </p>
        </div>
        <?php
    }
}
add_action( 'admin_notices', 'adas_personal_portfolio_display_dashboard_notice' );

