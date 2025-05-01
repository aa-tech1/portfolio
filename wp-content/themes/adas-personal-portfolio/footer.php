<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Adas Personal Portfolio
 */

?>
</div>


	<footer id="colophon" class="adas-personal-portfolio-footer">
		<div class="adas-personal-portfolio-footer__bottom">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="adas-personal-portfolio-footer__branding text-center">
							<p><?php bloginfo('name'); ?> <?php esc_html_e('© All Rights Reserved', 'adas-personal-portfolio'); ?> | 
							<?php esc_html_e('Developed by PencilWp', 'adas-personal-portfolio'); ?>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	
</div><!-- End Page -->


<?php wp_footer(); ?>

</body>
</html>
