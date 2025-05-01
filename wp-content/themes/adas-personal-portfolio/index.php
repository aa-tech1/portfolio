<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Adas Personal Portfolio
 */

if(have_posts()){
	$blog_row_resize = 'grid';
} else {
	$blog_row_resize = 'no-grid';
}

get_header();
?>

	<section class="adas-personal-portfolio-main-content">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="adas-personal-portfolio-main-area">
						<div class="row">
							<?php if(is_active_sidebar('sidebar')): ?>
							<div class="col-lg-9 col-12 adas-personal-portfolio-main-area__with-side">
							<?php else : ?>
							<div class="col-12">
							<?php endif;?>
								<div class="adas-personal-portfolio-post-content">
									<div class="row <?php echo $blog_row_resize; ?>">
										<div class="col-12">
											<div class="adas-personal-portfolio-home-layout">
												<div class="row adas-personal-portfolio-masonry">
													<?php
													if ( have_posts() ) :
														if ( is_home() && ! is_front_page() ) :
															?>
															<header>
																<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
															</header>
															<?php
														endif;
														/* Start the Loop */
														while ( have_posts() ) :
															the_post();

															/*
															* Include the Post-Type-specific template for the content.
															* If you want to override this in a child theme, then include a file
															* called content-___.php (where ___ is the Post Type name) and that will be used instead.
															*/
															get_template_part( 'template-parts/content', get_post_type() );
														endwhile;
													else :
														get_template_part( 'template-parts/content', 'none' );
													endif;
													?>
												</div>	
											</div>	
										</div>	
									</div>
									<div class="row">
										<div class="col-12">
											<!-- Start Pagination -->
											<div class="pagination-main">
												<?php if (function_exists("adas_personal_portfolio_pagination"))
													{
														adas_personal_portfolio_pagination();
													}  
												?>
											</div>
											<!-- End Pagination -->
										</div>
									</div>	
								</div>
							</div>
							
							<?php if(is_active_sidebar('sidebar')) : ?>
							<div class="col-lg-3 col-12 adas-personal-portfolio-main-area__sidebar">
								<div class="adas-personal-portfolio-sidebar__right">
									<?php get_sidebar(); ?>
								</div>
							</div>
							<?php endif;?>
						
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Blog Layout -->
<?php get_footer();