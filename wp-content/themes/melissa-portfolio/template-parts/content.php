<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Melissa_Portfolio
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title heading-default-single"><a class="magic-hover magic-hover__square" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				melissa_portfolio_posted_on();
                melissa_portfolio_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php melissa_portfolio_post_thumbnail(); ?>

	<div class="entry-content archive-content">
		<?php the_excerpt(); ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php melissa_portfolio_entry_footer(); ?>
	</footer><!-- .entry-footer -->
    <div class="portfolio-button portfolio-button-noborder-noalternate">
        <a class="magic-hover magic-hover__square" href="<?php the_permalink(); ?>"><?php echo esc_html( get_theme_mod( 'melissa_portfolio_excerpt_more_text', __( 'Read More', 'melissa-portfolio' ) ) ); ?></a>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->
