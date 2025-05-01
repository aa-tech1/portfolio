<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Melissa_Portfolio
 */

get_header();
?>

<main id="content" class="site-main">
    <section class="w-50 offset-6">
        <?php melissa_portfolio_post_thumbnail(); ?>
    </section>
    <section class="px-50 w-50 offset-6">
    <div class="container-xl">
        <div class="row">
            <div class="col-12">
                <?php
                while ( have_posts() ) :
                    the_post();

                    get_template_part( 'template-parts/content', 'single' );

                    do_action( 'melissa_portfolio_post_navigation' );

                    if ( is_singular( 'post' ) ) {
                        $related_posts_label = get_theme_mod( 'melissa_portfolio_post_related_post_label', __( 'Related Posts', 'melissa-portfolio' ) );
                        $cat_content_id      = get_the_category( $post->ID )[0]->term_id;
                        $args                = array(
                            'cat'            => $cat_content_id,
                            'posts_per_page' => 3,
                            'post__not_in'   => array( $post->ID ),
                            'orderby'        => 'rand',
                        );
                        $query               = new WP_Query( $args );

                        if ( $query->have_posts() ) :
                            ?>
                            <div class="related-posts">
                                <?php
                                if ( get_theme_mod( 'melissa_portfolio_post_hide_related_posts', false ) === false ) :
                                    ?>
                                    <h2><?php echo esc_html( $related_posts_label ); ?></h2>
                                    <div class="my-blog__list">
                                        <?php
                                        while ( $query->have_posts() ) :
                                            $query->the_post();
                                        ?>
                                        <div class="col-12 my-blog__item">
                                            <div class="row">
                                                <div class="col-4 col-md-3">
                                                    <a class="my-blog__detail" data-id="3">
                                                        <?php melissa_portfolio_post_thumbnail(); ?>
                                                    </a>
                                                </div>
                                                <div class="col-8 col-md-9">
                                                    <?php the_title( '<h5 class="my-blog__detail entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h5>' ); ?>
                                                    <?php
                                                    if ( 'post' === get_post_type() ) :
                                                        setup_postdata( get_post() );
                                                        ?>
                                                        <div class="related_entry-meta">
                                                            <?php
                                                            melissa_portfolio_posted_on();
                                                            melissa_portfolio_posted_by();
                                                            ?>
                                                        </div><!-- .entry-meta -->
                                                    <?php
                                                    endif;
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                            endwhile;
                                            wp_reset_postdata();
                                        ?>
                                    </div>
                                    <?php
                                endif;
                                ?>
                            </div>
                            <?php
                        endif;
                    }

                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;

                endwhile; // End of the loop.
                ?>

            </div>
        </div>
    </div>
</section>
</main><!-- #main -->

<?php
get_footer();
