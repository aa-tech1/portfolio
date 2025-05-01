<?php
if ( ! get_theme_mod( 'melissa_portfolio_enable_resume_section', false ) ) {
    return;
}

$section_content = array();
$section_content['section_resume_headline'] = get_theme_mod( 'melissa_portfolio_resume_section_headline', __( 'My Resume', 'melissa-portfolio' ) );
$section_content['section_resume_list_skill'] = json_to_array(get_theme_mod( 'melissa_portfolio_resume_section_skill_list' ));

$section_content = apply_filters( 'melissa_portfolio_resume_section_content', $section_content );
melissa_portfolio_render_resume_section( $section_content );

/**
 * Render Resume Section
 */
function melissa_portfolio_render_resume_section( $section_content ) {
    $list_skill = $section_content['section_resume_list_skill'];
?>
<section id="my-resume" class="my-resume px-50 w-50 offset-6">
    <?php
    if ( is_customize_preview() ) :
        melissa_portfolio_section_link( 'melissa_portfolio_resume_section' );
    endif;
    ?>
    <div class="container-xl">
        <div class="row">
            <div class="col-12">
                <h2 class="heading-default" data-viewport="custom"><?php echo esc_html($section_content['section_resume_headline']); ?></h2>
                <div class="my-resume__inner">
                    <div class="row">
                        <?php foreach ($list_skill as $skill) { ?>
                            <?php if($skill['field_type'] == 'type_1'): ?>
                                <div class="col-12 col-md-6 col-lg-12 col-xxl-6 mb-3 mb-md-0">
                                    <div class="row">
                                        <div class="col-12 col-md-12 py-0 py-md-3">
                                            <h3 class="heading-default__small" data-viewport="opacity"><?php echo esc_html($skill['title']); ?></h3>
                                            <div class="my-resume__skill highlight">
                                                <?php foreach ( $skill['field_repeater'] as $item_skill ) { ?>
                                                    <div class="my-resume__skill--item highlight__item" data-viewport="opacity">
                                                        <label><?php echo esc_html($item_skill['skill_title']); ?></label>
                                                        <div class="" data-precent="<?php echo esc_attr($item_skill['skill_precent']); ?>">
                                                            <span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span><span></span>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php elseif($skill['field_type'] == 'type_2'): ?>
                                <div class="col-12 col-md-6 col-lg-12 col-xxl-6 mb-3 mb-md-0">
                                    <div class="row">
                                        <div class="col-12 col-md-12 py-0 py-md-3">
                                            <h3 class="heading-default__small" data-viewport="opacity"><?php echo esc_html($skill['title']); ?></h3>
                                            <div class="education__list highlight">
                                            <?php foreach ( $skill['field_repeater'] as $item_skill ) { ?>
                                                <div class="education__item highlight__item" data-viewport="opacity">
                                                    <div class="education__date"><?php echo esc_html($item_skill['skill_title']); ?></div>
                                                    <div class="education__name"><?php echo wp_kses_post($item_skill['skill_content']); ?></div>
                                                </div>
                                            <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php }