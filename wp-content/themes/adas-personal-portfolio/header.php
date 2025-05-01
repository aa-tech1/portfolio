<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Adas Personal Portfolio
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


<?php
    $adas_header = get_theme_mod('adas_header', true);
?>


<!-- Start Page -->
<div id="page" class="site">

	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'adas-personal-portfolio' ); ?></a>


		<?php if ((is_front_page() && !empty($adas_header)) || (!is_front_page())) : ?>
		<!-- Header -->
		<header id="masthead" class="adas-personal-portfolio-header adas-personal-portfolio-header site-header">

			<div class="adas-personal-portfolio-header__inside">
				<?php if ( get_header_image() ) : ?>
				<div class="header-image">
					<img src="<?php header_image(); ?>" width="<?php echo absint( get_custom_header()->width ); ?>" height="<?php echo absint( get_custom_header()->height ); ?>">
				</div>
				<?php endif; ?>
				<div class="container">
					<div class="row">
						<div class="col-12">
							<div class="adas-personal-portfolio-header__middle">
								<div class="adas-personal-portfolio-logo">
									<?php if( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
										the_custom_logo();
									}else { ?>
										<div class="text-logo">
											<a class="site-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html(get_bloginfo('name'));?></a>
											<?php $adas_personal_portfolio_title_description = get_bloginfo( 'description', 'display' ); ?>
											<p class="site-description"><?php echo esc_html($adas_personal_portfolio_title_description); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
										</div>
									<?php } ?>
								</div>
								<div class="adas-personal-portfolio-header__menu">
									<!-- Main Nav -->
									<nav id="site-navigation" class="adas-personal-portfolio-header__nav navbar navbar-expand-lg" >
										<div class="navbar-collapse">
											<?php
											wp_nav_menu( array(
												'theme_location' => 'adas-primary',
												'menu_id'        => 'primary-menu',
												'menu_class'        => 'nav adas-personal-portfolio-menu navbar-nav',
											) );
											?>
										</div>
									</nav>
									<!--/ End Main Nav -->
								</div>	

							</div>
						</div>
					</div>
				</div>
			</div>
		</header>
		<!-- End Header -->
		<?php endif;?>

		<!-- Small Header -->
		<div class="adas-small-header">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<!-- Logo -->
						<div class="adas-small-header__inner">
							<div class="adas-small-header__logo">
								<?php if( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
									the_custom_logo();
								}else { ?>
									<div class="text-logo">
										<a class="site-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html(get_bloginfo('name'));?></a>
										<?php $adas_personal_portfolio_title_description = get_bloginfo( 'description', 'display' ); ?>
										<p class="site-description"><?php echo esc_html($adas_personal_portfolio_title_description); ?></p>
									</div>
								<?php } ?>
							</div>
							<div class="adas-personal-portfolio-header__right">
								<div class="adas-personal-portfolio-header__button adas-personal-portfolio-header__menu">
									<a href="#" class="adas-personal-portfolio-header__button--icon"  data-bs-toggle="modal" data-bs-target="#offcanvas-modal"><?php esc_html_e('Menu', 'adas-personal-portfolio');?> <i class="fa fa-bars"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>						
			</div>
							
		</div>
		<!-- End Small Header -->

		<!-- Mobile Menu Modal -->
		<div class="modal offcanvas-modal fade adas-small-header__mobile" id="offcanvas-modal">
			<div class="modal-dialog offcanvas-dialog">
				<div class="modal-content">
					<div class="modal-header offcanvas-header">
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
							<?php esc_html_e('Close','adas-personal-portfolio');?> <i class="fas fa-remove"></i>
						</button>
					</div>
					<?php if(!empty($mobile_header_logo_src) ) :?>
					<div class="offcanvas-logo">
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
							<img src="<?php echo esc_url($mobile_header_logo_src[0]); ?>">
						</a>
					</div>
					<?php endif;?>
					<nav id="offcanvas-menu" class="offcanvas-menu">
						<!-- Main Nav -->
						<div class="navbar-collapse">
							<?php
							wp_nav_menu( array(
								'theme_location' => 'adas-mobile',
								'menu_id'        => 'primary-menu',
								'menu_class'        => 'nav-menu menu navigation list-none',
							) );
							?>
						</div>
						<!--/ End Main Nav -->
					</nav>
				</div>
			</div>
		</div>
		<!-- End Mobile Menu Modal -->



		
		
	<div id="primary" class="adas-personal-portfolio-section-main">