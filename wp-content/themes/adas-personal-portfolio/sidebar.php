<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Adas Personal Portfolio
 */

if ( ! is_active_sidebar( 'sidebar' ) ) {
	return;
}
?>
<div class="adas-personal-portfolio-sidebar">
	<aside id="adas-personal-portfolio-primary-sidebar" class="widget-area">
		<?php dynamic_sidebar( 'sidebar' ); ?>
	</aside>
</div>
