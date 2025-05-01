<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Melissa_Portfolio
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'melissa-portfolio' ); ?></a>
    <?php
        $bg_header = get_theme_mod( 'melissa_portfolio_left_background', '#d8cec4' );
    ?>
    <section class="header d-flex align-content-center flex-column" style="<?php echo esc_attr(isset($bg_header) ? 'background-color: ' . $bg_header:''); ?>" >
        <div class="header__one mb-auto">
            <div class="container-xl">
                <div class="d-flex justify-content-between align-items-center">
                    <?php if ( has_custom_logo() ) : ?>
                        <div class="site-logo">
                            <?php the_custom_logo(); ?>
                        </div>
                    <?php else : ?>
                        <div class="site-identity">
                            <?php if ( is_front_page() || is_home() ) : ?>
                                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                            <?php else : ?>
                                <span class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span>
                            <?php endif;  ?>
                        </div>
                    <?php endif; ?>
                    <a class="toggle-menu" href="#">
                        <span class="fa-navicon__custom" data-viewport="to-bottom" data-delay="600"><i></i></span>
                    </a>
                </div>
            </div>
        </div>
        <div class="header__menu flex-column justify-content-center">
            <?php
            if ( has_nav_menu( 'primary' ) ) {
                wp_nav_menu(
                    array(
                        'theme_location' => 'primary',
                        'menu_class'     => 'header__navigation nav d-flex flex-column'
                    )
                );
            }
            ?>
            <?php $social = json_to_array(get_theme_mod( 'melissa_portfolio_left_social' )); ?>
            <?php if( !empty( $social ) ): ?>
            <ul class="social d-inline-flex justify-content-end">
                <?php foreach ( $social as $item ): ?>
                <li class="li-<?php echo esc_attr($item['icon_value']); ?>"> <a class="ms-1 ms-md-2" href="<?php echo esc_html($item['link']); ?>" target="_blank" rel="alternate" title="<?php echo esc_html($item['icon_value']); ?>"> <i class="fa <?php echo esc_html($item['icon_value']); ?>"></i></a></li>
                <?php endforeach; ?>
            </ul>
            <?php endif; ?>
        </div>
        <div class="mt-auto">
            <div class="container-xl">
                <?php
                  $introduction_text = get_theme_mod( 'melissa_portfolio_left_introduction_text', 'I Am' );
                  $introduction_featured_text = get_theme_mod( 'melissa_portfolio_left_featured_text', '"Joe Morgan.","Designer","Developer"' );
                  $introduction_second_text = get_theme_mod( 'melissa_portfolio_left_introduction_second_text', 'What I feel happy is a perfect product' );
                ?>
                <h3 class="header__name" data-viewport="to-top" data-delay="600" ><span><?php echo esc_html($introduction_text); ?> </span><span class="header__type--js" data-period="2000" data-type='[<?php echo esc_html($introduction_featured_text); ?>]'></span></h3>
                <p class="mb-0 header__position" data-viewport="to-top" data-delay="600"><?php echo esc_html($introduction_second_text); ?></p>
            </div>
        </div>
    </section>
