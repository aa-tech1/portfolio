<?php
if ( ! get_theme_mod( 'melissa_portfolio_enable_contact_section', false ) ) {
    return;
}
$form = get_theme_mod( 'melissa_portfolio_contact_section_form', false );

$section_content = array();
$section_content['section_contact_headline'] = get_theme_mod( 'melissa_portfolio_contact_section_headline', __( 'Contact Me', 'melissa-portfolio' ) );
$section_content['section_contacts'] = json_to_array(get_theme_mod( 'melissa_portfolio_contact_section_list' ));
$section_content['section_contact_form'] = get_theme_mod( 'melissa_portfolio_contact_section_form' );
$section_content = apply_filters( 'melissa_portfolio_contact_section_content', $section_content );
melissa_portfolio_render_contact_section( $section_content );

/**
 * Render Contact Section
 */
function melissa_portfolio_render_contact_section($section_content) {
    $form = $section_content['section_contact_form'];
    $contacts = $section_content['section_contacts'];
?>
<section id="contact" class="contact px-50 w-50 offset-6">
    <?php
    if ( is_customize_preview() ) :
        melissa_portfolio_section_link( 'melissa_portfolio_contact_section' );
    endif;
    ?>
    <div class="container-xl">
        <div class="row">
            <div class="col-12">
                <h2 class="heading-default" data-viewport="custom"><?php echo esc_html($section_content['section_contact_headline']); ?></h2>
                <div class="contact__list mb-2 d-flex justify-content-between flex-column flex-md-row flex-lg-column flex-xxl-row">
                    <?php if(!empty($contacts) && count($contacts) > 1): ?>
                    <?php foreach ($contacts as $item): ?>
                    <div class="contact__item mb-3 col-12 col-md-4 col-lg-12 col-xxl-4 d-flex align-items-center" data-viewport="opacity">
                        <i class="fa <?php echo esc_attr($item['icon_value']); ?>"></i>
                        <div>
                            <h4 class="fs-6 text-uppercase"><?php echo esc_html($item['text']); ?></h4>
                            <span><?php echo esc_html($item['text2']); ?></span>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <div class="row">
                    <div class="col-12" data-viewport="opacity">
                        <div class="contact__inner">
                            <?php echo do_shortcode($form);?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
}
?>
