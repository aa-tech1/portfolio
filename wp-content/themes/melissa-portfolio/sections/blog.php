<?php
if ( ! get_theme_mod( 'melissa_portfolio_enable_blog_section', false ) ) {
    return;
}

$section_content['section_blog_headline'] = get_theme_mod( 'melissa_portfolio_blog_section_headline', __( 'My Blog', 'melissa-portfolio' ) );
$section_content['section_blog_list'] = get_theme_mod( 'melissa_portfolio_blog_list');
$section_content['section_blog_button_text'] = get_theme_mod( 'melissa_portfolio_blog_section_button_text');
$section_content['section_blog_button_url'] = get_theme_mod( 'melissa_portfolio_blog_section_button_url');
$section_content = apply_filters( 'melissa_portfolio_blog_section_content', $section_content );
melissa_portfolio_render_blog_section( $section_content );

/**
 * Render Client Section
 */
function melissa_portfolio_render_blog_section($section_content) {
?>
    <section id="my-blog" class="my-blog px-50 w-50 offset-6">
        <?php
        if ( is_customize_preview() ) :
            melissa_portfolio_section_link( 'melissa_portfolio_blog_section' );
        endif;
        ?>
        <div class="container-xl">
            <div class="row">
                <div class="col-12">
                    <h2 class="heading-default" data-viewport="custom"><?php echo esc_html($section_content['section_blog_headline']); ?></h2>
                    <?php if( !empty( $section_content['section_blog_list'] ) ) { ?>
                    <div class="my-blog__list">
                        <?php foreach ( $section_content['section_blog_list'] as $post_id ) {
                            $post = get_post( $post_id );
                            $date = date('F d, Y', strtotime($post->post_date));
                            $get_permalink = get_post_permalink( $post );
                            $get_thumbnail_url = get_the_post_thumbnail_url( $post );
                        ?>
                        <!-- start item blog -->
                        <div class="col-12 my-blog__item" data-viewport="opacity">
                            <div class="row">
                                <div class="col-4 col-md-3">
                                    <a class="my-blog__detail" href="<?php echo esc_html($get_permalink); ?>">
                                        <figure class="m-0 ratio ratio-1x1 lazy bg-cover" data-src="<?php echo esc_html($get_thumbnail_url); ?>"></figure>
                                    </a>
                                </div>
                                <div class="col-8 col-md-9">
                                    <h3><a class="my-blog__detail" href="<?php echo esc_html($get_permalink); ?>"><?php echo esc_html($post->post_title); ?></a></h3>
                                    <div class="entry">
                                        <span class="entry__date"><?php echo esc_html($date); ?></span>
                                        <?php melissa_portfolio_entry( $post_id ); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end item blog -->
                        <?php } ?>
                    </div>
                    <?php } ?>

                    <?php if($section_content['section_blog_button_text']): ?>
                        <div class="my-blog__button mt-3 d-flex justify-content-center">
                            <a class="pointer-event" href="<?php echo esc_attr($section_content['section_blog_button_url']); ?>"><?php echo esc_html($section_content['section_blog_button_text']); ?></a>
                        </div>
                    <?php endif; ?>

                    <!-- start view detail -->
                    <div class="my-blog__popup">
                        <div class="my-blog__popup--close">
                            <a>X</a>
                        </div>
                        <div class="my-blog__popup--inner"></div>
                    </div>
                    <!-- end view detail -->
                </div>
            </div>
        </div>
    </section>
<?php } ?>
<script>
    // setting paginator for blog
    SETTING = {
        POST_PER_PAGE: <?php echo 3; ?>,
        LOAD_POST: <?php echo 2; ?>
    }
</script>