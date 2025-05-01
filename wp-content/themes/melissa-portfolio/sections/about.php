<?php
if ( ! get_theme_mod( 'melissa_portfolio_enable_about_section', false ) ) {
	return;
}

$section_content = array();
$section_content['section_about_headline'] = get_theme_mod( 'melissa_portfolio_about_section_headline', __( 'About me', 'melissa-portfolio' ) );
$section_content['section_about_avatar'] = get_theme_mod( 'melissa_portfolio_about_avatar') ? get_theme_mod( 'melissa_portfolio_about_avatar') : get_template_directory_uri() . '/assets/images/13.jpg';
$section_content['section_about_name'] = get_theme_mod( 'melissa_portfolio_about_section_name', __( 'I Am Melissa Anderson.', 'melissa-portfolio' ) );
$section_content['section_about_short_job'] = get_theme_mod( 'melissa_portfolio_about_section_short_job', __( 'UI/UX Designer & Developer', 'melissa-portfolio' ) );
$section_content['section_about_residence'] = get_theme_mod( 'melissa_portfolio_about_section_residence', __( 'Residence', 'melissa-portfolio' ) );
$section_content['section_about_residence_value'] = get_theme_mod( 'melissa_portfolio_about_section_residence_value', __( 'Singapore', 'melissa-portfolio' ) );
$section_content['section_about_experience'] = get_theme_mod( 'melissa_portfolio_about_section_experience', __( 'Experience', 'melissa-portfolio' ) );
$section_content['section_about_experience_value'] = get_theme_mod( 'melissa_portfolio_about_section_experience_value', __( '7+ Years', 'melissa-portfolio' ) );
$section_content['section_about_birthday'] = get_theme_mod( 'melissa_portfolio_about_section_birthday', __( 'Date of Birth', 'melissa-portfolio' ) );
$section_content['section_about_birthday_value'] = get_theme_mod( 'melissa_portfolio_about_section_birthday_value', __( '01 July 1990', 'melissa-portfolio' ) );
$section_content['section_about_description'] = get_theme_mod( 'melissa_portfolio_about_section_description', '<p>Senior UX designer with 7+years experience and specialization in complex web application design.</p><p>Achieved 15% increase in user satisfaction and 20% increase in conversions through the creation of interactively tested, data-driven, and user-centered design.</p>');

$section_content = apply_filters( 'melissa_portfolio_about_section_content', $section_content );

melissa_portfolio_render_about_section( $section_content );

/**
 * Render About Section
 */
function melissa_portfolio_render_about_section( $section_content ) {
?>
<section id="about-me" class="about-me px-50 w-50 offset-6">
    <?php
    if ( is_customize_preview() ) :
        melissa_portfolio_section_link( 'melissa_portfolio_about_section' );
    endif;
    ?>
    <div class="container-xl">
        <div class="row">
            <div class="col-12">
                <h2 class="heading-default" data-viewport="custom"><?php echo esc_html($section_content['section_about_headline']); ?></h2>
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="mb-5" data-viewport="about-me__avatar--custom" data-delay="600">
                            <figure class="about-me__avatar rounded-circle mx-auto mb-3 ratio ratio-1x1 bg-cover" style="background-image: url(<?php echo esc_url( $section_content['section_about_avatar'] ); ?>)"></figure>
                        </div>
                    </div>
                    <div class="col-12 col-xxl-10 offset-xxl-1 d-flex align-content-center">
                        <div class="" data-viewport="opacity" data-delay="600">
                            <h3 class="fs-4 mb-2 text-center"><?php echo esc_html($section_content['section_about_name']); ?></h3>
                            <p class="text-center mb-3 mb-md-5"><?php echo esc_html($section_content['section_about_short_job']); ?></p>
                            <div class="about-me__list d-flex justify-content-between flex-column flex-sm-row">
                                <?php if(!empty($section_content['section_about_residence_value'])): ?>
                                    <div class="about-me__item" data-viewport="custom" data-delay="600">
                                        <h4 class="fs-6 text-uppercase"><?php echo esc_html($section_content['section_about_residence']); ?></h4>
                                        <span><?php echo esc_html($section_content['section_about_residence_value']); ?></span>
                                    </div>
                                <?php endif; ?>
                                <?php if(!empty($section_content['section_about_experience_value'])): ?>
                                    <div class="about-me__item" data-viewport="custom" data-delay="600">
                                        <h4 class="fs-6 text-uppercase"><?php echo esc_html($section_content['section_about_experience']); ?></h4>
                                        <span><?php echo esc_html($section_content['section_about_experience_value']); ?></span>
                                    </div>
                                <?php endif; ?>
                                <?php if(!empty($section_content['section_about_birthday_value'])): ?>
                                    <div class="about-me__item" data-viewport="custom" data-delay="600">
                                        <h4 class="fs-6 text-uppercase"><?php echo esc_html($section_content['section_about_birthday']); ?></h4>
                                        <span><?php echo esc_html($section_content['section_about_birthday_value']); ?></span>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="about-me__intro">
                                <?php echo wp_kses_post($section_content['section_about_description']); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
}
