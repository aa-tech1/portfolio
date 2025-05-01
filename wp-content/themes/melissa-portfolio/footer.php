<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Melissa_Portfolio
 */

?>
<section class="footer px-50 pb-0 w-50 offset-6">
    <div class="container-xl">
        <div class="row">
            <div class="col-12">
                <div class="border-top py-4">
                    <div class="row">
                        <div class="col-12 col-md-7">
                            <div class="footer__copywriter text-center text-md-start">
                                <?php
                                    $left_text = get_theme_mod( 'melissa_portfolio_footer_left_introduction_text', 'Copyright © 2022 All rights reserved.' );
                                    $right_label = get_theme_mod( 'melissa_portfolio_footer_right_label', 'Download CV' );
                                    $right_file_cv = get_theme_mod( 'melissa_portfolio_footer_right_url_cv' );
                                ?>
                                <?php echo esc_html( $left_text ); ?>
                            </div>
                        </div>
                        <div class="col-12 col-md-5 d-flex justify-content-center justify-content-md-end">
                            <?php if(!empty($right_label)): ?>
                                <div class="mt-3 mt-md-0">
                                    <a download href="<?php echo esc_attr( $right_file_cv ); ?>"  class="footer__button-download"><?php echo esc_html( $right_label ); ?></a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php wp_footer(); ?>

</body>
</html>
