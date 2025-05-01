<?php
if ( ! get_theme_mod( 'melissa_portfolio_enable_shortcode_section', false ) ) {
    return;
}

$section_content = array();
$section_content['section_shortcode'] = get_theme_mod( 'melissa_portfolio_shortcode_section_content' );
$section_content = apply_filters( 'melissa_portfolio_shortcode_section_content', $section_content );

melissa_portfolio_render_shortcode_section( $section_content );
/**
 * Render Shortcode Section
 */
function melissa_portfolio_render_shortcode_section($section_content) {
?>
<section id="shortcode" class="shortcode px-50 w-50 offset-6">
    <?php
    if ( is_customize_preview() ) :
        melissa_portfolio_section_link( 'melissa_portfolio_shortcode_section' );
    endif;
    ?>
    <div class="container-xl">
        <div class="row">
            <div class="col-12">
                <?php echo do_shortcode($section_content['section_shortcode']);?>
            </div>
        </div>
    </div>
</section>
<?php
}
?>
