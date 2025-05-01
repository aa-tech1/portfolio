<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Adas Personal Portfolio
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<div class="adas-single-page-content adas-inner-blocks">

		<?php
		the_content();

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'adas-personal-portfolio' ),
				'after'  => '</div>',
			)
		);
		?>

	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
