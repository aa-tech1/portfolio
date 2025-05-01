<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Adas Personal Portfolio
 */

get_header();
?>

	<!-- Error 404 -->
	<section class="adas-personal-portfolio-404 not-found">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12">
					<div class="adas-personal-portfolio-404__content">
						<h1 class="adas-personal-portfolio-404__title">
							<span class="adas-personal-portfolio-404__label">
								<span><?php esc_html_e( 'Oops!', 'adas-personal-portfolio' ); ?></span>
							</span>
						</h1>
						<div class="adas-personal-portfolio-404__inner">
							<h4 class="adas-personal-portfolio-404__inside"><?php esc_html_e( 'We couldn\'t find that page.', 'adas-personal-portfolio' ); ?></h4>
							<p class="adas-personal-portfolio-404__text"><?php esc_html_e( 'It seems the page you\'re looking for is missing or has been moved. Try going back to the homepage or use the search to find what you\'re looking for.', 'adas-personal-portfolio' ); ?></p>
							<div class="adas-personal-portfolio-404__button">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="adas-personal-portfolio-btn adas-personal-portfolio-btn__secondary"><?php esc_html_e( 'Return Back', 'adas-personal-portfolio' ); ?></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Error 404 -->


<?php
get_footer();