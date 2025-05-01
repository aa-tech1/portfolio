<?php
if ( ! get_theme_mod( 'melissa_portfolio_enable_custom_html_section', false ) ) {
    return;
}

$section_content['section_custom_html'] = get_theme_mod( 'melissa_portfolio_custom_html');
$section_content = apply_filters( 'melissa_portfolio_custom_html_section_content', $section_content );
melissa_portfolio_render_custom_html_section( $section_content );
/**
 * Render Custom HTML Section
 */
function melissa_portfolio_render_custom_html_section($section_content) {
?>
    <section id="custom-html" class="my-blog px-50 w-50 offset-6">
        <?php
        if ( is_customize_preview() ) :
            melissa_portfolio_section_link( 'melissa_portfolio_custom_html_section' );
        endif;
        ?>
        <div class="container-xl">
            <div class="row">
                <div class="col-12">
                    <?php echo wp_kses_post($section_content['section_custom_html']); ?>
                </div>
            </div>
        </div>
    </section>
<?php } ?>