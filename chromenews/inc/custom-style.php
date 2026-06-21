<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}


/**
 * Customizer
 *
 * @class   chromenews
 */

if (!function_exists('chromenews_custom_style')) {

    function chromenews_custom_style()
    {

        global $chromenews_google_fonts;
        $chromenews_background_color = get_background_color();
        $light_background_color = '#' . $chromenews_background_color;
        $dark_background_color = chromenews_get_option('dark_background_color');
        $secondary_color = chromenews_get_option('secondary_color');
        $text_over_secondary_color = chromenews_get_option('text_over_secondary_color');
        $global_font_family_type = chromenews_get_option('global_font_family_type');
        if ($global_font_family_type == 'google') {
            $site_title_font = $chromenews_google_fonts[chromenews_get_option('site_title_font')];
            $primary_font = $chromenews_google_fonts[chromenews_get_option('primary_font')];
            $secondary_font = $chromenews_google_fonts[chromenews_get_option('secondary_font')];
        } else {
            $site_title_font = 'system-ui, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol"';
            $primary_font = 'system-ui, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol"';
            $secondary_font = 'system-ui, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol"';
        }
        $title_font_weight = chromenews_get_option('title_font_weight');
        $chromenews_section_title_font_size = chromenews_get_option('chromenews_section_title_font_size');
        $main_navigation_custom_background_color = chromenews_get_option('main_navigation_custom_background_color');
        ob_start();
?>

<?php if (!empty($dark_background_color)) : ?>
            body.aft-dark-mode #loader::before{
            border-color: <?php chromenews_esc_custom_style($dark_background_color) ?>;
            }
            body.aft-dark-mode #sidr,
            body.aft-dark-mode,
            body.aft-dark-mode.custom-background,
            body.aft-dark-mode #af-preloader {
            background-color: <?php chromenews_esc_custom_style($dark_background_color) ?>;
            }
        <?php endif; ?>

        <?php if (!empty($light_background_color)) : ?>
            body.aft-light-mode #loader::before{
            border-color: <?php chromenews_esc_custom_style($light_background_color) ?> ;
            }
            body.aft-light-mode #sidr,
            body.aft-light-mode #af-preloader,
            body.aft-light-mode {
            background-color: <?php chromenews_esc_custom_style($light_background_color) ?> ;
            }
        <?php endif; ?>


        <?php if (!empty($secondary_color)) : ?>
            #loader,
            .wp-block-search .wp-block-search__button,
            .woocommerce-account .entry-content .woocommerce-MyAccount-navigation ul li.is-active,
            .woocommerce :is(#respond input#submit, a.button, button.button, input.button):is(.disabled, :disabled, :disabled[disabled]),
            .woocommerce #respond input#submit,
            .woocommerce a.button,
            .woocommerce button.button,
            .woocommerce input.button,
            .woocommerce :is(#respond input#submit, a.button, button.button, input.button):is(:hover, .alt, .alt:hover),
            .widget-title-border-top .wp_post_author_widget .widget-title::before,
            .widget-title-border-bottom .wp_post_author_widget .widget-title::before,
            .widget-title-border-top .heading-line::before,
            .widget-title-border-bottom .heading-line::before,
            .widget-title-border-top .sub-heading-line::before,
            .widget-title-border-bottom .sub-heading-line::before,
            .widget-title-background-side .wp-block-group .wp-block-search__label,
            .widget-title-background-side .wp-block-group .wp-block-heading,
            .widget-title-background-side .widget_block .wp-block-search__label,
            .widget-title-background-side .widget_block .wp-block-heading,
            .widget-title-background-side .wp_post_author_widget .widget-title,
            .widget-title-background-side .widget-title .heading-line,
            .widget-title-background-side .wp-block-search__label::before,
            .widget-title-background-side .heading-line-before,
            .widget-title-background-side .sub-heading-line,
            .widget-title-background-side .wp-block-group .wp-block-heading::before,
            .widget-title-background-side .widget_block .wp-block-heading::before,
            body:is(.aft-dark-mode,.aft-light-mode) .is-style-fill a.wp-block-button__link:not(.has-background),
            body:is(.aft-dark-mode,.aft-light-mode) .aft-main-banner-section.aft-banner-background-secondary,
            .aft-dark-mode span.heading-line-after,
            .aft-dark-mode span.heading-line-before,
            body.widget-title-border-bottom .header-after1 .heading-line-before,
            body.widget-title-border-bottom .widget-title .heading-line-before,
            body .af-cat-widget-carousel a.chromenews-categories.category-color-1,
            a.sidr-class-sidr-button-close,
            .aft-posts-tabs-panel .nav-tabs>li>a.active,
            body:is(.aft-dark-mode,.aft-light-mode) .entry-content > [class*="wp-block-"] .wp-block-button:not(.is-style-outline) a.wp-block-button__link,
            body:is(.aft-dark-mode,.aft-light-mode) .entry-content > [class*="wp-block-"] .wp-block-button:not(.is-style-outline) a.wp-block-button__link:hover,
            .widget-title-border-bottom .sub-heading-line::before,
            .widget-title-border-bottom .wp-post-author-wrap .header-after::before,
            .widget-title-border-side .wp_post_author_widget .widget-title::before,
            .widget-title-border-side .heading-line::before,
            .widget-title-border-side .sub-heading-line::before,
            .single-post .entry-content-title-featured-wrap .af-post-format i,
            .single-post article.post .af-post-format i,
            .aft-archive-wrapper .no-post-image:not(.grid-design-texts-over-image) .af-post-format i,
            span.heading-line::before,
            .read-img .trending-no,
            .wp-post-author-wrap .header-after::before,
            body.aft-dark-mode :is(input[type="button"], input[type="reset"], input[type="submit"], .inner-suscribe input[type=submit]),
            .af-youtube-slider .af-video-wrap .af-bg-play i,
            .af-youtube-video-list .entry-header-yt-video-wrapper .af-yt-video-play i,
            body .btn-style1 :is(a,a:visited),
            body .chromenews-pagination .nav-links .page-numbers.current,
            body #scroll-up,
            body article.sticky .read-single:before,
            body .trending-posts-vertical .trending-no{
            background-color: <?php chromenews_esc_custom_style($secondary_color) ?>;
            }
            body .aft-see-more a {
            background-image: linear-gradient(120deg, <?php chromenews_esc_custom_style($secondary_color) ?> , <?php chromenews_esc_custom_style($secondary_color) ?>);
            }
            .comment-content > p a,
            .comment-body .reply a:hover,
            .entry-content .wp-block-table td a,
            .entry-content :is(h1,h2,h3,h4,h5,h6) a,
            .chromenews_youtube_video_widget .af-youtube-slider-thumbnail .slick-slide.slick-current::before,
            .post-description a:not(.aft-readmore),
            .chromenews-widget.widget_text a,
            .chromenews-widget .textwidget a,
            body .aft-see-more a, mark,
            body:is(.aft-dark-mode,.aft-light-mode) .aft-readmore-wrapper a.aft-readmore:hover,
            body:is(.aft-dark-mode,.aft-light-mode) .grid-design-texts-over-image .aft-readmore-wrapper a.aft-readmore:hover,
            body.single .entry-header .aft-post-excerpt-and-meta .post-excerpt,
            body:is(.aft-dark-mode,.aft-light-mode).single span.tags-links a:hover,
            .chromenews-pagination .nav-links .page-numbers.current,
            .aft-light-mode p.awpa-more-posts a:hover,
            p.awpa-more-posts a:hover,
            .wp-post-author-meta .wp-post-author-meta-more-posts a.awpa-more-posts:hover{
            border-color: <?php chromenews_esc_custom_style($secondary_color) ?>;
            }
            .woocommerce div.product form.cart .reset_variations,
            .wp-calendar-nav a, .comment-metadata a:hover, .fn a:hover,
            body:is(.aft-dark-mode,.aft-light-mode) main ul > li a:hover,
            body:is(.aft-dark-mode,.aft-light-mode) main ol > li a:hover,
            body:is(.aft-dark-mode,.aft-light-mode) .aft-main-banner-section .aft-popular-taxonomies-lists ul li a:hover,
            :is(.aft-dark-mode,.aft-light-mode) .read-details .entry-meta span.aft-view-count a:hover,
            body:is(.aft-dark-mode,.aft-light-mode) .entry-meta span.posts-author a:hover,
            body:is(.aft-dark-mode,.aft-light-mode) .entry-meta span.posts-date a:hover,
            body:is(.aft-dark-mode,.aft-light-mode) .entry-meta span.aft-comment-count a:hover,
            body:is(.aft-dark-mode,.aft-light-mode) .chromenews-pagination .nav-links a.page-numbers:hover,
            body:is(.aft-dark-mode,.aft-light-mode) .entry-content p.wp-block-tag-cloud a.tag-cloud-link:hover,
            body:is(.aft-dark-mode,.aft-light-mode) :is(.wp-block-tag-cloud,.tagcloud) a:hover,
            .aft-dark-mode .wp-post-author-meta .wp-post-author-meta-more-posts a:hover,
            body footer.site-footer :is(.wp-block-tag-cloud,.tagcloud) a:hover,
            body footer.site-footer .wp-post-author-meta .wp-post-author-meta-more-posts a:hover{
            border-color: <?php chromenews_esc_custom_style($secondary_color) ?>;
            }
            body:is(.aft-dark-mode,.aft-light-mode) main .entry-content ul.wc-block-grid__products > li a:hover .wc-block-grid__product-title,
            body .entry-content > [class*="wp-block-"] a:not(.has-text-color),
            body .entry-content > [class*="wp-block-"] li,
            body .entry-content > :is(ul,ol,p) a ,
            .post-excerpt a,
            body:is(.aft-dark-mode,.aft-light-mode) #secondary .chromenews-widget ul[class*="wp-block-"] a:hover,
            body:is(.aft-dark-mode,.aft-light-mode) #secondary .chromenews-widget ol[class*="wp-block-"] a:hover,
            body:is(.aft-dark-mode,.aft-light-mode) .af-breadcrumbs a:hover,
            body:is(.aft-dark-mode,.aft-light-mode) ul.trail-items li a:hover,
            :is(.aft-dark-mode,.aft-light-mode) ul.cat-links > li a,
            :is(.aft-dark-mode,.aft-light-mode) .widget ul.cat-links > li a,
            :is(.comment-form, .read-title h3, .read-title h2) a:hover,
            #scroll-up::after{
            border-bottom-color: <?php chromenews_esc_custom_style($secondary_color) ?>;
            }
            .hover-title-secondary-color.aft-dark-mode .aft-banner-background-custom:not(.data-bg) .read-single:not(.grid-design-texts-over-image) .read-title h3 a:hover,
            .hover-title-secondary-color.aft-light-mode .aft-banner-background-custom:not(.data-bg) .read-single:not(.grid-design-texts-over-image) .read-title h3 a:hover,
            .hover-title-secondary-color.aft-dark-mode .aft-banner-background-alternative:not(.data-bg) .read-single:not(.grid-design-texts-over-image) .read-title h3 a:hover,
            .hover-title-secondary-color.aft-light-mode .aft-banner-background-alternative:not(.data-bg) .read-single:not(.grid-design-texts-over-image) .read-title h3 a:hover,
            .hover-title-secondary-color.aft-dark-mode .aft-banner-background-default:not(.data-bg) .read-single:not(.grid-design-texts-over-image) .read-title h3 a:hover,
            .hover-title-secondary-color.aft-light-mode .aft-banner-background-default:not(.data-bg) .read-single:not(.grid-design-texts-over-image) .read-title h3 a:hover,
            .hover-title-secondary-color:is(.aft-dark-mode,.aft-light-mode) #secondary .chromenews-widget ul[class*="wp-block-"] a:hover,
            .hover-title-secondary-color:is(.aft-dark-mode,.aft-light-mode) #secondary .chromenews-widget ol[class*="wp-block-"] a:hover,
            .hover-title-secondary-color.aft-dark-mode .read-single:not(.grid-design-texts-over-image) .read-title h2 a:hover,
            .hover-title-secondary-color.aft-dark-mode .read-single:not(.grid-design-texts-over-image) .read-title h3 a:hover,
            .hover-title-secondary-color .read-title h3 a:hover,
            .hover-title-secondary-color .read-title h2 a:hover,
            .hover-title-secondary-color .nav-links a:hover .post-title,
            .hover-title-secondary-color:is(.aft-dark-mode,.aft-light-mode) .banner-exclusive-posts-wrapper a:hover .exclusive-post-title,
            .hover-title-secondary-color.aft-light-mode .aft-main-banner-section.aft-banner-background-default:not(.data-bg) .banner-exclusive-posts-wrapper a:hover .exclusive-post-title,
            .hover-title-secondary-color.aft-light-mode .aft-main-banner-section.aft-banner-background-alternative:not(.data-bg) .banner-exclusive-posts-wrapper a:hover .exclusive-post-title,
            .hover-title-secondary-color.aft-light-mode .aft-main-banner-section.aft-banner-background-custom:not(.data-bg) .banner-exclusive-posts-wrapper a:hover .exclusive-post-title,
            .hover-title-secondary-color.aft-dark-mode .aft-main-banner-section.aft-banner-background-default:not(.data-bg) .banner-exclusive-posts-wrapper a:hover .exclusive-post-title,
            .hover-title-secondary-color.aft-dark-mode .aft-main-banner-section.aft-banner-background-alternative:not(.data-bg) .banner-exclusive-posts-wrapper a:hover .exclusive-post-title,
            .hover-title-secondary-color.aft-dark-mode .aft-main-banner-section.aft-banner-background-custom:not(.data-bg) .banner-exclusive-posts-wrapper a:hover .exclusive-post-title,
            .hover-title-secondary-color:is(.aft-dark-mode,.aft-light-mode) .widget ul:not([class]) > li a:hover,
            .hover-title-secondary-color:is(.aft-dark-mode,.aft-light-mode) .widget ol:not([class]) > li a:hover,
            .hover-title-secondary-color.aft-light-mode .read-single:not(.grid-design-texts-over-image) .read-title h2 a:hover,
            .hover-title-secondary-color.aft-light-mode .read-single:not(.grid-design-texts-over-image) .read-title h3 a:hover,
            .page-links a.post-page-numbers,
            body:is(.aft-dark-mode,.aft-light-mode) .entry-content > [class*="wp-block-"] a.wp-block-file__button:not(.has-text-color),
            body.wp-post-author-meta .awpa-display-name a:hover,
            body footer.site-footer .wp-post-author-meta .wp-post-author-meta-more-posts a:hover,
            body footer.site-footer .wp_post_author_widget .awpa-display-name a:hover,
            body .site-footer .secondary-footer a:hover,
            body:is(.aft-dark-mode,.aft-light-mode) p.awpa-website a:hover {
            color:<?php chromenews_esc_custom_style($secondary_color) ?>;
            }
        <?php endif; ?>

        <?php if (!empty($secondary_color)) : ?>
            .widget-title-border-top .wp-block-group .wp-block-search__label::before,
            .widget-title-border-top .wp-block-group .wp-block-heading::before,
            .widget-title-border-top .widget_block .wp-block-search__label::before,
            .widget-title-border-top .widget_block .wp-block-heading::before,
            .widget-title-border-bottom .wp-block-group .wp-block-search__label::before,
            .widget-title-border-bottom .wp-block-group .wp-block-heading::before,
            .widget-title-border-bottom .widget_block .wp-block-search__label::before,
            .widget-title-border-bottom .widget_block .wp-block-heading::before,
            .widget-title-border-side .wp-block-group .wp-block-search__label::before,
            .widget-title-border-side .wp-block-group .wp-block-heading::before,
            .widget-title-border-side .widget_block .wp-block-search__label::before,
            .widget-title-border-side .widget_block .wp-block-heading::before,
            .wp-block-group .wp-block-search__label::before,
            .wp-block-group .wp-block-heading::before,
            .widget_block .wp-block-search__label::before,
            .widget_block .wp-block-heading::before,
            body .aft-main-banner-section .aft-popular-taxonomies-lists strong::before,
            .entry-content form.mc4wp-form input[type=submit],.inner-suscribe input[type=submit],
            body:is(.aft-dark-mode,.aft-light-mode) .woocommerce-MyAccount-content a.button,
            body:is(.aft-dark-mode,.aft-light-mode).woocommerce-account .addresses .title .edit,
            .fpsml-front-form.fpsml-template-1 .fpsml-field input[type="submit"],
            .fpsml-front-form.fpsml-template-2 .fpsml-field input[type="submit"],
            .fpsml-front-form.fpsml-template-3 .fpsml-field input[type="submit"],
            .fpsml-front-form.fpsml-template-4 .fpsml-field input[type="submit"],
            .fpsml-front-form.fpsml-template-5 .fpsml-field input[type="submit"],
            .fpsml-front-form.fpsml-template-1 .qq-upload-button,
            .fpsml-front-form.fpsml-template-2 .qq-upload-button,
            .fpsml-front-form.fpsml-template-3 .qq-upload-button,
            .fpsml-front-form.fpsml-template-4 .qq-upload-button,
            .fpsml-front-form.fpsml-template-5 .qq-upload-button,
            body:is(.aft-dark-mode,.aft-light-mode) #wp-calendar tbody td#today,
            body:is(.aft-dark-mode,.aft-light-mode) .entry-content > [class*="wp-block-"] .wp-block-button:not(.is-style-outline) a.wp-block-button__link,
            .widget-title-border-top .sub-heading-line::before,
            .widget-title-border-bottom .sub-heading-line::before,
            .widget-title-border-side .sub-heading-line::before,
            .btn-style1 :is(a,a:visited),
            button,input[type="button"],input[type="reset"],input[type="submit"],
            body:is(.aft-dark-mode,.aft-light-mode).woocommerce nav.woocommerce-pagination ul li .page-numbers.current,
            .woocommerce-product-search button[type="submit"],
            .widget_mc4wp_form_widget input[type=submit],
            input.search-submit{
            background-color: <?php chromenews_esc_custom_style($secondary_color) ?>;
            }
            body:is(.aft-dark-mode,.aft-light-mode) .aft-readmore-wrapper a.aft-readmore:hover,
            .main-navigation .menu-description,
            .woocommerce-product-search button[type="submit"],
            input.search-submit, body.single span.tags-links a:hover,
            :is(.aft-dark-mode,.aft-light-mode) .banner-exclusive-posts-wrapper a .exclusive-post-title:hover,
            :is(.aft-dark-mode,.aft-light-mode) .widget :is(ul.menu,ul,ol) >li a:hover,
            :is(.aft-dark-mode,.aft-light-mode) .read-title h3 a:hover,
            :is(.aft-dark-mode,.aft-light-mode) .read-details .entry-meta span a:hover,
            .aft-dark-mode .featured-category-item .read-img a:hover,
            .aft-dark-mode .nav-links a:hover .post-title,
            body.aft-dark-mode .entry-content > [class*="wp-block-"] a:not(.has-text-color):hover,
            body.aft-dark-mode .entry-content > :is(ol,ul,p) a:hover,
            body:is(.aft-dark-mode,.aft-light-mode).entry-content :is(.wp-block-tag-cloud,.tagcloud) a:hover,
            body:is(.aft-dark-mode,.aft-light-mode).woocommerce nav.woocommerce-pagination ul li .page-numbers.current,
            body:is(.aft-dark-mode,.aft-light-mode).woocommerce nav.woocommerce-pagination ul li .page-numbers:hover,
            body:is(.aft-dark-mode,.aft-light-mode) .wp-post-author-meta .awpa-display-name a:hover,
            body .nav-links a .post-title:hover,
            body ul.trail-items li a:hover,
            body .post-edit-link:hover,
            body p.logged-in-as a,
            body #wp-calendar tbody td a,
            body .chromenews-customizer p:not([class]) > a,
            body .widget_block p:not([class]) > a,
            body .entry-content > [class*="wp-block-"] a:not(.wp-block-button__link):hover,
            body .entry-content > [class*="wp-block-"] a:not(.has-text-color),
            body .entry-content > :is(ul,ol,p) :is(a,a:visited){
            border-color: <?php chromenews_esc_custom_style($secondary_color) ?>;
            }
            body .aft-main-banner-section .aft-popular-taxonomies-lists strong::after {
            border-color: transparent transparent transparent <?php chromenews_esc_custom_style($secondary_color) ?>;
            }
            body.rtl .aft-main-banner-section .aft-popular-taxonomies-lists strong::after {
            border-color: transparent <?php chromenews_esc_custom_style($secondary_color) ?> transparent transparent;
            }
            @media only screen and (min-width: 993px){
            .main-navigation .menu-desktop > li.current-menu-item::after,
            .main-navigation .menu-desktop > ul > li.current-menu-item::after,
            .main-navigation .menu-desktop > li::after, .main-navigation .menu-desktop > ul > li::after{
            background-color: <?php chromenews_esc_custom_style($secondary_color) ?>;
            }
            }
        <?php endif; ?>

        <?php if (!empty($text_over_secondary_color)) : ?>
            body:is(.aft-dark-mode,.aft-light-mode) .is-style-fill a.wp-block-button__link:not(.has-text-color),
            .woocommerce-account .entry-content .woocommerce-MyAccount-navigation ul li.is-active a,
            .wp-block-search .wp-block-search__button,
            .woocommerce :is(#respond input#submit, a.button, button.button, input.button):is(.disabled, :disabled, :disabled[disabled]),
            .woocommerce #respond input#submit,
            .woocommerce a.button,
            .woocommerce button.button,
            .woocommerce input.button,
            .woocommerce :is(#respond input#submit, a.button, button.button, input.button):is(:hover, .alt, .alt:hover),
            body .entry-content > [class*="wp-block-"] .woocommerce a:not(.has-text-color).button,
            body:is(.aft-light-mode,.aft-dark-mode) .woocommerce-MyAccount-content a.button,
            body:is(.aft-light-mode,.aft-dark-mode).woocommerce-account .addresses .title .edit,
            body .aft-main-banner-section .aft-popular-taxonomies-lists strong,
            body .aft-main-banner-section.aft-banner-background-secondary:not(.data-bg) .aft-popular-taxonomies-lists ul li a,
            body .aft-main-banner-section.aft-banner-background-secondary:not(.data-bg) .af-main-banner-thumb-posts .small-grid-style .grid-design-default .read-details .read-title h3 a,
            body .aft-main-banner-section.aft-banner-background-secondary:not(.data-bg) .widget-title .heading-line,
            body .aft-main-banner-section.aft-banner-background-secondary:not(.data-bg) .aft-posts-tabs-panel .nav-tabs>li>a,
            body .aft-main-banner-section.aft-banner-background-secondary:not(.data-bg) .aft-comment-view-share > span > a,
            body .aft-main-banner-section.aft-banner-background-secondary:not(.data-bg) .read-single:not(.grid-design-texts-over-image) .read-details .entry-meta span,
            body .aft-main-banner-section.aft-banner-background-secondary:not(.data-bg) .banner-exclusive-posts-wrapper :is(a,a:visited),
            body .aft-main-banner-section.aft-banner-background-secondary:not(.data-bg) .featured-category-item .read-img a,
            body .aft-main-banner-section.aft-banner-background-secondary:not(.data-bg) .read-single:not(.grid-design-texts-over-image) .read-title h2 a,
            body .aft-main-banner-section.aft-banner-background-secondary:not(.data-bg) .read-single:not(.grid-design-texts-over-image) .read-title h3 a,
            body .aft-main-banner-section.aft-banner-background-secondary:not(.data-bg) :is(.widget-title,.header-after1),
            body .aft-main-banner-section.aft-banner-background-secondary:not(.data-bg) .aft-yt-video-item-wrapper .slide-icon,
            body .aft-main-banner-section.aft-banner-background-secondary:not(.data-bg) .af-slick-navcontrols .slide-icon,
            #wp-calendar tbody td#today a,
            body:is(.aft-dark-mode,.aft-light-mode) .aft-see-more a:hover,
            body .chromenews-pagination .nav-links .page-numbers.current,
            body .aft-posts-tabs-panel .nav-tabs>li>a.active::before,
            body .aft-posts-tabs-panel .nav-tabs>li>a.active,
            .single-post .entry-content-title-featured-wrap .af-post-format i,
            .single-post article.post .af-post-format i,
            .aft-archive-wrapper .no-post-image:not(.grid-design-texts-over-image) .af-post-format i,
            body:is(.aft-dark-mode,.aft-light-mode) .entry-content > [class*="wp-block-"] .wp-block-button:not(.is-style-outline) a.wp-block-button__link,
            body:is(.aft-dark-mode,.aft-light-mode) .entry-content > [class*="wp-block-"] .wp-block-button:not(.is-style-outline) a.wp-block-button__link:hover,
            body:is(.aft-dark-mode,.aft-light-mode) .entry-content .wc-block-grid__product-add-to-cart.wp-block-button .wp-block-button__link:hover,
            body:is(.aft-dark-mode,.aft-light-mode) .entry-content .wc-block-grid__product-add-to-cart.wp-block-button .wp-block-button__link,
            body:is(.aft-dark-mode,.aft-light-mode) footer.site-footer .aft-posts-tabs-panel .nav-tabs>li>a.active,
            body.aft-light-mode .aft-main-banner-section.aft-banner-background-custom:not(.data-bg) .aft-posts-tabs-panel .nav-tabs>li>a.active,
            body:is(.aft-dark-mode,.aft-light-mode) .aft-main-banner-section.aft-banner-background-alternative:not(.data-bg) .aft-posts-tabs-panel .nav-tabs>li>a.active,
            body:is(.aft-dark-mode,.aft-light-mode) .aft-main-banner-section.aft-banner-background-default:not(.data-bg) .aft-posts-tabs-panel .nav-tabs>li>a.active,
            body:is(.aft-dark-mode,.aft-light-mode) .aft-main-banner-section.aft-banner-background-alternative .aft-posts-tabs-panel .nav-tabs>li>a.active,
            body:is(.aft-dark-mode,.aft-light-mode) .aft-main-banner-section.aft-banner-background-default .aft-posts-tabs-panel .nav-tabs>li>a.active,
            .fpsml-front-form.fpsml-template-1 .fpsml-field input[type="submit"],
            .fpsml-front-form.fpsml-template-2 .fpsml-field input[type="submit"],
            .fpsml-front-form.fpsml-template-3 .fpsml-field input[type="submit"],
            .fpsml-front-form.fpsml-template-4 .fpsml-field input[type="submit"],
            .fpsml-front-form.fpsml-template-5 .fpsml-field input[type="submit"],
            .fpsml-front-form.fpsml-template-1 .qq-upload-button,
            .fpsml-front-form.fpsml-template-2 .qq-upload-button,
            .fpsml-front-form.fpsml-template-3 .qq-upload-button,
            .fpsml-front-form.fpsml-template-4 .qq-upload-button,
            .fpsml-front-form.fpsml-template-5 .qq-upload-button,
            body:is(.aft-dark-mode,.aft-light-mode) #wp-calendar tbody td#today,
            body.aft-light-mode.widget-title-background-side .aft-main-banner-section.aft-banner-background-custom:not(.data-bg) .widget-title .heading-line,
            body.aft-light-mode.widget-title-background-side .aft-main-banner-section.aft-banner-background-alternative:not(.data-bg) .widget-title .heading-line,
            body:is(.aft-dark-mode,.aft-light-mode).widget-title-background-side footer.site-footer .widget-title .heading-line,
            body:is(.aft-dark-mode,.aft-light-mode).widget-title-background-side .wp-block-group .wp-block-search__label,
            body:is(.aft-dark-mode,.aft-light-mode).widget-title-background-side .wp-block-group .wp-block-heading,
            body:is(.aft-dark-mode,.aft-light-mode).widget-title-background-side .widget_block .wp-block-search__label,
            body:is(.aft-dark-mode,.aft-light-mode).widget-title-background-side .widget_block .wp-block-heading,
            body:is(.aft-dark-mode,.aft-light-mode).widget-title-background-side .wp_post_author_widget .widget-title,
            body:is(.aft-dark-mode,.aft-light-mode).widget-title-background-side .widget-title .heading-line ,
            body.aft-dark-mode.widget-title-background-side .aft-main-banner-section.aft-banner-background-custom:not(.data-bg) .widget-title .heading-line,
            body.aft-dark-mode.widget-title-background-side .aft-main-banner-section.aft-banner-background-alternative:not(.data-bg) .widget-title .heading-line,
            :is(.aft-dark-mode,.aft-light-mode).widget-title-background-side .aft-main-banner-section.aft-banner-background-default:not(.data-bg) .widget-title .heading-line,
            .af-youtube-slider .af-video-wrap .af-hide-iframe i,
            .af-youtube-slider .af-video-wrap .af-bg-play i,
            .af-youtube-video-list .entry-header-yt-video-wrapper .af-yt-video-play i,
            .woocommerce-product-search button[type="submit"],input.search-submit,
            body footer.site-footer :is(.search-icon:visited,.search-icon:hover,.search-icon:focus,.search-icon:active),
            .wp-block-search__button svg.search-icon,
            .wp-block-search__button svg.search-icon:hover,
            body footer.site-footer .widget_mc4wp_form_widget input[type=submit],
            body footer.site-footer .woocommerce-product-search button[type="submit"],
            body:is(.aft-dark-mode,.aft-light-mode).woocommerce nav.woocommerce-pagination ul li .page-numbers.current,
            body:is(.aft-dark-mode,.aft-light-mode) :is(button,input[type="button"],input[type="reset"],input[type="submit"]),
            body footer.site-footer input.search-submit,
            .widget_mc4wp_form_widget input[type=submit],
            .read-img .trending-no,
            body .trending-posts-vertical .trending-no,
            body.aft-dark-mode .btn-style1 a,
            body.aft-dark-mode #scroll-up {
            color: <?php chromenews_esc_custom_style($text_over_secondary_color) ?>;
            }
            body #scroll-up::before {border-bottom-color: <?php chromenews_esc_custom_style($text_over_secondary_color) ?>;}
            a.sidr-class-sidr-button-close::before, a.sidr-class-sidr-button-close::after {background-color: <?php chromenews_esc_custom_style($text_over_secondary_color) ?>;}
        <?php endif; ?>

        <?php if (!empty($main_navigation_custom_background_color)) : ?>
            body div#main-navigation-bar{background-color: <?php chromenews_esc_custom_style($main_navigation_custom_background_color) ?>;}
        <?php endif; ?>

        <?php if (!empty($site_title_font)) : ?>
            .site-description,.site-title {font-family: <?php chromenews_esc_custom_style($site_title_font) ?> , sans-serif;}
        <?php endif; ?>

        <?php if (!empty($primary_font)) : ?>
            table,body p,
            .blockspare-posts-block-post-grid-excerpt-content,
            .archive-description,
            .woocommerce form label,
            .nav-previous h4, .nav-next h4,
            .exclusive-posts .marquee a,
            .widget ul.menu >li,.widget ul ul li,
            .widget ul > li,.widget ol > li,
            main ul li,main ol li, p,input,textarea,
            body .blockspare-posts-block-post-grid-excerpt,
            body.primary-post-title-font.single h1.entry-title,
            body.primary-post-title-font.page h1.entry-title,
            body.primary-post-title-font .bs-marquee-wrapper,
            body.primary-post-title-font .blockspare-title-wrapper .blockspare-title,
            body.primary-post-title-font h4.blockspare-posts-block-post-grid-title,
            body.primary-post-title-font .read-title h3,
            body.primary-post-title-font .exclusive-post-title,
            .chromenews-customizer .post-description,
            .chromenews-widget .post-description{
            font-family: <?php chromenews_esc_custom_style($primary_font) ?> , sans-serif;
            }
        <?php endif; ?>

        <?php if (!empty($secondary_font)) : ?>
            body,button,select,optgroup,input[type="reset"],input[type="submit"],input.button,
            .widget ul.af-tabs > li a,p.awpa-more-posts,
            .post-description .aft-readmore-wrapper,
            body.secondary-post-title-font.single h1.entry-title,
            body.secondary-post-title-font.page h1.entry-title,
            body.secondary-post-title-font .blockspare-title-wrapper .blockspare-title,
            body.secondary-post-title-font .bs-marquee-wrapper,
            body.secondary-post-title-font h4.blockspare-posts-block-post-grid-title,
            body.secondary-post-title-font .read-title h3,
            body.secondary-post-title-font .exclusive-post-title,
            .cat-links li a,.min-read,
            .woocommerce form label.wp-block-search__label,
            .woocommerce ul.order_details li,
            .woocommerce .woocommerce-customer-details address p,
            .woocommerce nav.woocommerce-pagination ul li .page-numbers,
            .af-social-contacts .social-widget-menu .screen-reader-text {
            font-family: <?php chromenews_esc_custom_style($secondary_font) ?> , sans-serif;
            }
        <?php endif; ?>

        <?php if (!empty($title_font_weight)) : ?>
            label,.nav-previous h4, .nav-next h4,
            .aft-readmore-wrapper a.aft-readmore,
            button, input[type="button"], input[type="reset"], input[type="submit"],
            .aft-posts-tabs-panel .nav-tabs>li>a,
            .aft-main-banner-wrapper .widget-title .heading-line,
            .exclusive-posts .exclusive-now ,
            .exclusive-posts .marquee a,
            div.custom-menu-link > a,
            .main-navigation #primary-menu > ul > li,
            .main-navigation .menu-desktop > li, .main-navigation .menu-desktop > ul > li,
            .site-title, h1, h2, h3, h4, h5, h6 {
            font-weight: <?php chromenews_esc_custom_style($title_font_weight) ?>;
            }
        <?php endif; ?>

        <?php if (!empty($chromenews_section_title_font_size)) : ?>
            .woocommerce h2, .cart-collaterals h3, .woocommerce-tabs.wc-tabs-wrapper h2,
            :is(.wp-block-group,.widget_block) .wp-block-heading,
            h4.af-author-display-name,
            body.widget-title-border-top .widget-title,
            body.widget-title-border-bottom .widget-title,
            body.widget-title-border-side .widget-title,
            body.widget-title-border-none .widget-title{
            font-size: <?php chromenews_esc_custom_style($chromenews_section_title_font_size) ?>px;
            }
            .widget-title-background-side .aft-posts-tabs-panel .nav-tabs>li>a,
            .widget-title-background-side :is(.wp-block-group,.widget_block) .wp-block-search__label,
            .widget-title-background-side :is(.wp-block-group,.widget_block) .wp-block-heading,
            .widget-title-background-side .wp_post_author_widget .widget-title,
            .widget-title-background-side .widget-title .heading-line {
            font-size: calc(<?php chromenews_esc_custom_style($chromenews_section_title_font_size) ?>px - 8px);
            }
            @media screen and (max-width: 480px) {
            .woocommerce h2, .cart-collaterals h3, .woocommerce-tabs.wc-tabs-wrapper h2,
            h4.af-author-display-name,
            body.widget-title-border-top .widget-title,
            body.widget-title-border-bottom .widget-title,
            body.widget-title-border-side .widget-title,
            body.widget-title-border-none .widget-title{
            font-size: 20px;
            }
            }
        <?php endif; ?>

        .container-wrapper .elementor {max-width: 100%;}
        .full-width-content .elementor-section-stretched,.align-content-left .elementor-section-stretched,.align-content-right .elementor-section-stretched {max-width: 100%;left: 0 !important;}

<?php
        
        $css = ob_get_clean();

        // Minify CSS: remove comments, newlines, extra spaces
        $css = preg_replace(
            array('!/\*.*?\*/!s', '/\s+/', '/\s*([\{\};:,])\s*/'),
            array('', ' ', '$1'),
            $css
        );

        return trim($css);
        // return ob_get_clean();
    }
}

if (!function_exists('chromenews_esc_custom_style(')) {

    function chromenews_esc_custom_style($props)
    {
        echo wp_kses($props, array("\'", '\"'));
    }
}
