<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Adas Personal Portfolio
 */
 

?>
	<div class="blog-content-main adas-inner-blocks">
		<div class="blog-content-header">
			<h1 class="blog-heading"><?php the_title(); ?></h1>
			<div class="blog-meta">
				<ul class="list">
					<li><i class="fa fa-user"></i><?php 
					adas_personal_portfolio_posted_by(); ?></li>
					<li><i class="fas fa-calendar"></i><?php echo esc_html(get_the_date());?> </li>
					<li><i class="fa fa-comments"></i><?php echo esc_html(get_comments_number());?> <?php esc_html_e('comments', 'adas-personal-portfolio'); ?></li>
				</ul>
			</div>

		</div>
		<div class="blog-body">
			<?php the_content(); ?>
		</div>
	</div>