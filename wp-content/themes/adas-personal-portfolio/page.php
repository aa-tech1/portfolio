<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Adas Personal Portfolio
 */

get_header();
?>

	<div class="adas-personal-portfolio-bc">
		<div class="container">
			<div class="row">
				<div class="col-12">
				<h2 class="bc-title"><?php the_title() ?></h2>
					<div class="bc-list"></div>
				</div>
			</div>
		</div>
	</div>
	
	
	<section class="adas-personal-portfolio-page site-page <?php echo adas_personal_portfolio_active(); ?>">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="adas-personal-portfolio-page__inners  mt-0">
						<?php
						while ( have_posts() ) :
							the_post();

							get_template_part( 'template-parts/content', 'page' );

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

						endwhile; // End of the loop.
						?>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php
get_footer();
