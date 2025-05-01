<?php
if ( ! get_theme_mod( 'melissa_portfolio_enable_project_section', false ) ) {
    return;
}

$section_content = array();
$section_content['section_project_headline'] = get_theme_mod( 'melissa_portfolio_project_section_headline', __( 'My Project', 'melissa-portfolio' ) );
$section_content['section_project_list'] = json_to_array(get_theme_mod( 'melissa_portfolio_resume_section_project_list' ));
$section_content = apply_filters( 'melissa_portfolio_project_section_content', $section_content );
melissa_portfolio_render_project_section( $section_content );

/**
 * Render Project Section
 */
function melissa_portfolio_render_project_section( $section_content ) {
    $list_project = $section_content['section_project_list'];
?>
<section id="my-project" class="my-project px-50 w-50 offset-6">
    <?php
    if ( is_customize_preview() ) :
        melissa_portfolio_section_link( 'melissa_portfolio_project_section' );
    endif;
    ?>
    <div class="container-xl">
        <div class="row">
            <div class="col-12">
                <h2 class="heading-default" data-viewport="custom"><?php echo esc_html($section_content['section_project_headline']); ?></h2>
                <?php if(!empty($list_project)) { ?>
                    <div class="row">
                        <div class="col-12 pb-3 pb-lg-2">
                            <ul class="my-project__nav nav d-flex justify-content-center" data-viewport="opacity">
                                <li class="nav-item" role="presentation">
                                    <button class="active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab" aria-controls="all" aria-selected="true"><?php echo esc_html__( 'All', 'melissa-portfolio' ) ?></button>
                                </li>
                                <?php foreach ($list_project as $nav) { ?>
                                    <li class="nav-item" role="presentation">
                                        <button class="" id="<?php echo esc_attr(sanitize_title($nav['title'])); ?>-tab" data-bs-toggle="tab" data-bs-target="#<?php echo esc_attr(sanitize_title($nav['title'])); ?>" type="button" role="tab" aria-controls="<?php echo esc_attr(sanitize_title($nav['title'])); ?>" aria-selected="false"><?php echo esc_html($nav['title']); ?></button>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="col-12 py-1">
                            <div class="tab-content" data-viewport="opacity">
                                <!-- start all project -->
                                <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                                    <div class="project__list">
                                        <?php foreach ($list_project as $items) {
                                            foreach ($items['field_repeater'] as $item) { ?>
                                                <div class="product__item">
                                                    <figure class="ratio ratio-4x3 lazy" data-src="<?php echo esc_attr($item['project_image']); ?>">
                                                        <div class="product__content">
                                                            <a class="<?php echo esc_attr(empty($item['project_url']) ? 'button-image':'') ?>" href="<?php echo esc_attr(!empty($item['project_url']) ? $item['project_url']:$item['project_image']); ?>">
                                                                <h4 class="product__name mt-0 mb-2"><?php echo esc_html($item['project_name']); ?></h4>
                                                                <p class="product__score mb-0"><?php echo esc_html($item['project_category']); ?></p>
                                                            </a>
                                                        </div>
                                                    </figure>
                                                </div>
                                            <?php } ?>
                                        <?php } ?>
                                    </div>
                                </div>
                                <!-- end all project -->

                                <!-- start project item -->
                                <?php foreach ($list_project as $items) { ?>
                                <div class="tab-pane fade" id="<?php echo esc_attr(sanitize_title($items['title'])); ?>" role="tabpanel" aria-labelledby="<?php echo esc_attr(sanitize_title($items['title'])); ?>-tab">
                                    <div class="project__list">
                                        <?php foreach ($items['field_repeater'] as $item) { ?>
                                            <div class="product__item">
                                                <figure class="ratio ratio-4x3 lazy" data-src="<?php echo esc_attr($item['project_image']); ?>">
                                                    <div class="product__content">
                                                        <a class="<?php echo esc_attr(empty($item['project_url']) ? 'button-image':'') ?>" href="<?php echo esc_attr(!empty($item['project_url']) ? $item['project_url']:$item['project_image']); ?>">
                                                            <h4 class="product__name mt-0 mb-2"><?php echo esc_html($item['project_name']); ?></h4>
                                                            <p class="product__score mb-0"><?php echo esc_html($item['project_category']); ?></p>
                                                        </a>
                                                    </div>
                                                </figure>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <!-- end project item -->
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<?php }

