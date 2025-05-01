<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Adas Personal Portfolio
 */
	$idd = get_the_ID();

?>
<div class="col-lg-4 col-md-6 adas-personal-portfolio-masonry-item">
	<article id="post-<?php echo $idd;?>" <?php post_class(); ?>>
		<div class="adas-personal-portfolio-single-post">
			<?php if(has_post_thumbnail()) : ?>	
			<div class="adas-personal-portfolio-single-post__head">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('adas-personal-portfolio-blog-thumb'); ?></a>
				<?php if (!empty($adas_personal_portfolio_categories)) :?>
				<div class="adas-personal-portfolio-single-post__cat">
					<?php foreach ($adas_personal_portfolio_categories as $adas_personal_portfolio_category) :?>
						<a href="<?php echo esc_url(get_category_link($adas_personal_portfolio_category->term_id));?>"><?php echo esc_html($adas_personal_portfolio_category->name); ?></a>
					<?php endforeach;?>	
				</div>
				<?php endif;?>
			</div>
			<?php endif; ?>
			<div class="adas-personal-portfolio-single-post__body">
				<!-- Post Meta -->
				<ul class="adas-personal-portfolio-post-meta">					
					<li><i class="fa fa-comments"></i><?php echo esc_html(get_comments_number());?> <?php esc_html_e('Çomment','adas-personal-portfolio');?></li>
					<li><i class="fa fa-pencil"></i><?php adas_personal_portfolio_posted_on(); ?></li>
				</ul>
				<h2 class="adas-personal-portfolio-single-post__title">
				<?php if( is_sticky()) :?><span class="adas-personal-portfolio-sticky"><i class="fa-regular fa-note-sticky"></i></span><?php endif;?>
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<div class="adas-personal-portfolio-single-post__content"><?php the_excerpt();?></div>
				<div class="adas-personal-portfolio-single-post__button">
					<a href="<?php the_permalink(); ?>" class="adas-personal-portfolio-btn adas-personal-portfolio-btn__secondary"><?php esc_html_e('View Article','adas-personal-portfolio');?></a>
				</div>
			</div>
		</div>
	</article> <!-- #post-<?php the_ID(); ?> -->
</div>
