<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Ecommerce Landing Page 
 */
?>

    <footer role="contentinfo">
        <?php if (get_theme_mod('ecommerce_landing_page_footer_hide_show', true)){ ?>
            <aside id="footer" class="copyright-wrapper" role="complementary" aria-label="<?php esc_attr_e( 'Footer', 'ecommerce-landing-page' ); ?>">
                <div class="container">
                    <?php
                        $ecommerce_landing_page_count = 0;
                        
                        if ( is_active_sidebar( 'footer-1' ) ) {
                            $ecommerce_landing_page_count++;
                        }
                        if ( is_active_sidebar( 'footer-2' ) ) {
                            $ecommerce_landing_page_count++;
                        }
                        if ( is_active_sidebar( 'footer-3' ) ) {
                            $ecommerce_landing_page_count++;
                        }
                        if ( is_active_sidebar( 'footer-4' ) ) {
                            $ecommerce_landing_page_count++;
                        }
                        // $ecommerce_landing_page_count == 0 none
                        if ( $ecommerce_landing_page_count == 1 ) {
                            $ecommerce_landing_page_colmd = 'col-md-12 col-sm-12';
                        } elseif ( $ecommerce_landing_page_count == 2 ) {
                            $ecommerce_landing_page_colmd = 'col-md-6 col-sm-6';
                        } elseif ( $ecommerce_landing_page_count == 3 ) {
                            $ecommerce_landing_page_colmd = 'col-md-4 col-sm-4';
                        } else {
                            $ecommerce_landing_page_colmd = 'col-lg-3 col-md-6 col-sm-6';
                        }
                    ?>
                    <div class="row">
                        <div class="<?php echo !is_active_sidebar('footer-1') ? 'footer_hide' : esc_attr($ecommerce_landing_page_colmd); ?> col-xl-3 col-lg-3 col-md-3 col-xs-12 footer-block">
                            <?php if (is_active_sidebar('footer-1')) : ?>
                                <?php dynamic_sidebar('footer-1'); ?>
                            <?php else : ?>
                                <aside id="search" class="widget py-3" role="complementary" aria-label="firstsidebar">
                                    <h3 class="widget-title"><?php esc_html_e( 'Search', 'ecommerce-landing-page' ); ?></h3>
                                    <?php get_search_form(); ?>
                                </aside>
                            <?php endif; ?>
                        </div>

                        <div class="<?php echo !is_active_sidebar('footer-2') ? 'footer_hide' : esc_attr($ecommerce_landing_page_colmd); ?> col-xl-3 col-lg-3 col-md-3 col-xs-12 footer-block pe-2">
                            <?php if (is_active_sidebar('footer-2')) : ?>
                                <?php dynamic_sidebar('footer-2'); ?>
                            <?php else : ?>
                                <aside id="archives" class="widget py-3" role="complementary" >
                                    <h3 class="widget-title"><?php esc_html_e( 'Archives', 'ecommerce-landing-page' ); ?></h3>
                                    <ul>
                                        <?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
                                    </ul>
                                </aside>
                            <?php endif; ?>
                        </div>  

                        <div class="<?php echo !is_active_sidebar('footer-3') ? 'footer_hide' : esc_attr($ecommerce_landing_page_colmd); ?> col-xl-3 col-lg-3 col-md-3 col-xs-12 footer-block">
                            <?php if (is_active_sidebar('footer-3')) : ?>
                                <?php dynamic_sidebar('footer-3'); ?>
                            <?php else : ?>
                                <aside id="meta" class="widget py-3" role="complementary" >
                                    <h3 class="widget-title"><?php esc_html_e( 'Meta', 'ecommerce-landing-page' ); ?></h3>
                                    <ul>
                                        <?php wp_register(); ?>
                                        <li><?php wp_loginout(); ?></li>
                                        <?php wp_meta(); ?>
                                    </ul>
                                </aside>
                            <?php endif; ?>
                        </div>

                        <div class="<?php echo !is_active_sidebar('footer-4') ? 'footer_hide' : esc_attr($ecommerce_landing_page_colmd); ?> col-xl-3 col-lg-3 col-md-3 col-xs-12 footer-block">
                            <?php if (is_active_sidebar('footer-4')) : ?>
                                <?php dynamic_sidebar('footer-4'); ?>
                            <?php else : ?>
                                <aside id="categories" class="widget py-3" role="complementary"> 
                                    <h3 class="widget-title"><?php esc_html_e( 'Categories', 'ecommerce-landing-page' ); ?></h3>          
                                    <ul>
                                        <?php wp_list_categories('title_li=');  ?>
                                    </ul>
                                </aside>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>
            </aside>
        <?php }?>
        <?php if (get_theme_mod('ecommerce_landing_page_copyright_hide_show', true)) {?>
            <div id="footer-2" class="pt-3 pb-3 text-center">
              	<div class="copyright container">
                    <p class="mb-0"> <?php ecommerce_landing_page_credit(); ?> <?php echo esc_html(get_theme_mod('ecommerce_landing_page_footer_text',__('By VWThemes','ecommerce-landing-page'))); ?></p>
                    <?php if(get_theme_mod('ecommerce_landing_page_footer_icon',false) != false) {?>
                        <?php dynamic_sidebar('footer-icon'); ?>
                    <?php }?>
                    <?php if( get_theme_mod( 'ecommerce_landing_page_hide_show_scroll',true) == 1 || get_theme_mod( 'ecommerce_landing_page_resp_scroll_top_hide_show',true) == 1) { ?>
                        <?php $ecommerce_landing_page_theme_lay = get_theme_mod( 'ecommerce_landing_page_scroll_top_alignment','Right');
                        if($ecommerce_landing_page_theme_lay == 'Left'){ ?>
                            <a href="#" class="scrollup left"><i class="<?php echo esc_attr(get_theme_mod('ecommerce_landing_page_scroll_top_icon','fas fa-long-arrow-alt-up')); ?>"></i><span class="screen-reader-text"><?php esc_html_e( 'Scroll Up', 'ecommerce-landing-page' ); ?></span></a>
                        <?php }else if($ecommerce_landing_page_theme_lay == 'Center'){ ?>
                            <a href="#" class="scrollup center"><i class="<?php echo esc_attr(get_theme_mod('ecommerce_landing_page_scroll_top_icon','fas fa-long-arrow-alt-up')); ?>"></i><span class="screen-reader-text"><?php esc_html_e( 'Scroll Up', 'ecommerce-landing-page' ); ?></span></a>
                        <?php }else{ ?>
                            <a href="#" class="scrollup"><i class="<?php echo esc_attr(get_theme_mod('ecommerce_landing_page_scroll_top_icon','fas fa-long-arrow-alt-up')); ?>"></i><span class="screen-reader-text"><?php esc_html_e( 'Scroll Up', 'ecommerce-landing-page' ); ?></span></a>
                        <?php }?>
                    <?php }?>
              	</div>
              	<div class="clear"></div>
            </div>
        <?php }?>
    </footer>
        <?php wp_footer(); ?>
    </body>
</html>