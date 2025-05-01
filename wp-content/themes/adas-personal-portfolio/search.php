<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Adas Personal Portfolio
 */

get_header();

?>
	
	<div class="adas-personal-portfolio-bc">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h2 class="bc-title">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results: %s', 'adas-personal-portfolio' ), '<span>' . get_search_query() . '</span>' );
					?></h2>
				</div>
			</div>
		</div>
	</div>

	
	<section class="adas-personal-portfolio-search-page search-page">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<?php if ( have_posts() ) : ?>
						<div class="row adas-personal-portfolio-masonry">
							<?php
							/* Start the Loop */
							while ( have_posts() ) :
								the_post();

								/**
								 * Run the loop for the search to output the results.
								 * If you want to overload this in a child theme then include a file
								 * called content-search.php and that will be used instead.
								 */
								get_template_part( 'template-parts/content', 'search' );

							endwhile;
							?>
						</div>
					<?php else :?>
						<?php get_template_part( 'template-parts/content', 'none' ); ?>
					<?php endif;?>
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
	</section>

<?php
get_footer();
