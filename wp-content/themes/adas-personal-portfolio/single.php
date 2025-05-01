<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Adas Personal Portfolio
 */


get_header(); ?>


	<!-- Blog Sinlge -->
	<section class="adas-personal-portfolio-blog-single">
		<div class="container">
			<div class="row">

				<div class="<?php if(is_active_sidebar('sidebar')) : ?> col-lg-8 col-md-8 <?php else :?> col-12 <?php endif;?>">
					<div class="row">
						<div class="col-12">
						<?php
							while ( have_posts() ) :
								the_post();
								get_template_part( 'template-parts/content', 'single' );
								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;
								endwhile; // End of the loop.
							?>
						</div>
					</div>
				</div>

				<?php if(is_active_sidebar('sidebar')) : ?>
				<div class="col-lg-4 col-md-4 col-12">
					<div class="adas-personal-portfolio-sidebar adas-personal-portfolio-sidebar__single">
						<aside id="adas-personal-portfolio-secondary-sidebar" class="widget-area">
							<?php dynamic_sidebar('sidebar'); ?>
						</aside>
					</div>
				</div>
				<?php endif;?>

			</div>

		</div>
	</section>
	<!--/ End Single -->
	<?php
get_footer();