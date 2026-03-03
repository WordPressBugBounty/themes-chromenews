<?php

/**
 * Option Panel
 *
 * @package ChromeNews
 */

$chromenews_default = chromenews_get_default_theme_options();
/*theme option panel info*/
require get_template_directory() . '/inc/customizer/frontpage-options.php';

//font and color options
require get_template_directory() . '/inc/customizer/font-color-options.php';

//selective refresh
require get_template_directory() . '/inc/customizer/customizer-refresh.php';


/**
 * Front-page options section
 *
 * @package ChromeNews
 */


// Add Front-page Options Panel.
$wp_customize->add_panel(
  'site_header_option_panel',
  array(
    'title' => __('Header Options', 'chromenews'),
    'priority' => 29,
    'capability' => 'edit_theme_options',
  )
);

/**
 * Header section
 *
 * @package ChromeNews
 */

// Front-page Section.
$wp_customize->add_section(
  'header_options_settings',
  array(
    'title' => __('Header Settings', 'chromenews'),
    'priority' => 49,
    'capability' => 'edit_theme_options',
    'panel' => 'site_header_option_panel',
  )
);

// Setting - global content alignment of news.
$wp_customize->add_setting(
  'enable_site_mode_switch',
  array(
    'default' => $chromenews_default['enable_site_mode_switch'],
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'chromenews_sanitize_select',
  )
);

$wp_customize->add_control(
  'enable_site_mode_switch',
  array(
    'label' => __('Site Light/Dark Mode', 'chromenews'),
    'section' => 'header_builder',
    'settings' => 'enable_site_mode_switch',
    'type' => 'select',
    'choices' => array(
      'aft-enable-mode-switch' => __('Enable', 'chromenews'),
      'aft-disable-mode-switch' => __('Disable', 'chromenews'),
    ),
    'priority' => 5,
  )
);



//section title
$wp_customize->add_setting(
  'show_top_header_section_title',
  array(
    'sanitize_callback' => 'sanitize_text_field',
  )
);

$wp_customize->add_control(
  new ChromeNews_Section_Title(
    $wp_customize,
    'show_top_header_section_title',
    array(
      'label' => __("Top Header Section", 'chromenews'),
      'section' => 'header_builder',
      'priority' => 10,

    )
  )
);


// Setting - show_site_title_section.
$wp_customize->add_setting(
  'show_top_header_section',
  array(
    'default' => $chromenews_default['show_top_header_section'],
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'chromenews_sanitize_checkbox',
  )
);

$wp_customize->add_control(
  'show_top_header_section',
  array(
    'label' => __('Show Top Header', 'chromenews'),
    'section' => 'header_builder',
    'type' => 'checkbox',
    'priority' => 10,
    'active_callback' => 'chromenews_is_inactive_builder'
  )
);

// Setting - show_site_title_section.
$wp_customize->add_setting(
  'show_social_menu_section',
  array(
    'default' => $chromenews_default['show_social_menu_section'],
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'chromenews_sanitize_checkbox',
  )
);

$wp_customize->add_control(
  'show_social_menu_section',
  array(
    'label' => __('Show Social Menu', 'chromenews'),
    'section' => 'header_builder',
    'type' => 'checkbox',
    'priority' => 10,
    'active_callback' => function ($control) {
      return (
        chromenews_top_header_status($control)
        &&
        chromenews_is_inactive_builder($control)
      );
    },
  )
);


// Setting - show_site_title_section.
$wp_customize->add_setting(
  'show_date_section',
  array(
    'default' => $chromenews_default['show_date_section'],
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'chromenews_sanitize_checkbox',
  )
);
$wp_customize->add_control(
  'show_date_section',
  array(
    'label' => __('Show Date', 'chromenews'),
    'section' => 'header_builder',
    'type' => 'checkbox',
    'priority' => 10,
    'active_callback' => function ($control) {
      return (
        chromenews_top_header_status($control)
        &&
        chromenews_is_inactive_builder($control)
      );
    },
  )
);
// Setting - show_site_title_section.
$wp_customize->add_setting(
  'show_time_section',
  array(
    'default' => $chromenews_default['show_time_section'],
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'chromenews_sanitize_checkbox',
  )
);
$wp_customize->add_control(
  'show_time_section',
  array(
    'label' => __('Show Time', 'chromenews'),
    'section' => 'header_builder',
    'type' => 'checkbox',
    'priority' => 10,
    'active_callback' => 'chromenews_top_header_status'
  )
);

// Setting - select_main_banner_section_mode.
$wp_customize->add_setting(
  'top_header_time_format',
  array(
    'default' => $chromenews_default['top_header_time_format'],
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'chromenews_sanitize_select',
  )
);

$wp_customize->add_control(
  'top_header_time_format',
  array(
    'label' => __('Time Format', 'chromenews'),
    'section' => 'header_builder',
    'settings' => 'top_header_time_format',
    'type' => 'select',
    'choices' => array(
      'en-US' => __('12 hours', 'chromenews'),
      'en-GB' => __('24 hours', 'chromenews'),
      'en-WP' => __('From WordPress Settings', 'chromenews'),
    ),
    'priority' => 10,
    'active_callback' => function ($control) {
      return (
        chromenews_top_header_status($control)
        &&
        chromenews_show_time_status($control)

      );
    },

  )
);



// Advertisement Section.
$wp_customize->add_section(
  'frontpage_advertisement_settings',
  array(
    'title' => __('Header Advertisement', 'chromenews'),
    'priority' => 50,
    'capability' => 'edit_theme_options',
    'panel' => 'site_header_option_panel',
  )
);


// Setting banner_advertisement_section.
$wp_customize->add_setting(
  'banner_advertisement_section',
  array(
    'default' => $chromenews_default['banner_advertisement_section'],
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'absint',
  )
);


$wp_customize->add_control(
  new WP_Customize_Cropped_Image_Control(
    $wp_customize,
    'banner_advertisement_section',
    array(
      'label' => __('Header Section Advertisement', 'chromenews'),
      'description' => sprintf(__('Recommended Size %1$s px X %2$s px', 'chromenews'), 930, 110),
      'section' => 'header_builder',
      'width' => 930,
      'height' => 110,
      'flex_width' => true,
      'flex_height' => true,
      'priority' => 120,
    )
  )
);

/*banner_advertisement_section_url*/
$wp_customize->add_setting(
  'banner_advertisement_section_url',
  array(
    'default' => $chromenews_default['banner_advertisement_section_url'],
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'esc_url_raw',
  )
);
$wp_customize->add_control(
  'banner_advertisement_section_url',
  array(
    'label' => __('URL Link', 'chromenews'),
    'section' => 'header_builder',
    'type' => 'text',
    'priority' => 130,
  )
);

// Add Theme Options Panel.
$wp_customize->add_panel(
  'theme_option_panel',
  array(
    'title' => __('Theme Options', 'chromenews'),
    'priority' => 30,
    'capability' => 'edit_theme_options',
  )
);





// Breadcrumb Section.
$wp_customize->add_section(
  'site_breadcrumb_settings',
  array(
    'title' => __('Breadcrumb Options', 'chromenews'),
    'priority' => 10,
    'capability' => 'edit_theme_options',
    'panel' => 'theme_option_panel',
  )
);


// Setting - breadcrumb.
$wp_customize->add_setting(
  'enable_breadcrumb',
  array(
    'default' => $chromenews_default['enable_breadcrumb'],
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'chromenews_sanitize_checkbox',
  )
);

$wp_customize->add_control(
  'enable_breadcrumb',
  array(
    'label' => __('Show breadcrumbs', 'chromenews'),
    'section' => 'site_breadcrumb_settings',
    'type' => 'checkbox',
    'priority' => 10,
  )
);

// Setting - global content alignment of news.
$wp_customize->add_setting(
  'select_breadcrumb_mode',
  array(
    'default' => $default['select_breadcrumb_mode'],
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'chromenews_sanitize_select',
  )
);

$wp_customize->add_control(
  'select_breadcrumb_mode',
  array(
    'label' => __('Select Breadcrumbs', 'chromenews'),
    'description' => __("Please ensure that you have enabled the plugin's breadcrumbs before choosing other than Default", 'chromenews'),
    'section' => 'site_breadcrumb_settings',
    'settings' => 'select_breadcrumb_mode',
    'type' => 'select',
    'choices' => array(
      'default' => __('Default', 'chromenews'),
      'yoast' => __('Yoast SEO', 'chromenews'),
      'rankmath' => __('Rank Math', 'chromenews'),
      'bcn' => __('NavXT', 'chromenews'),
    ),
    'priority' => 100,
  )
);




/**
 * Layout options section
 *
 * @package ChromeNews
 */

// Layout Section.
$wp_customize->add_section(
  'site_layout_settings',
  array(
    'title' => __('Global Settings', 'chromenews'),
    'priority' => 9,
    'capability' => 'edit_theme_options',
    'panel' => 'theme_option_panel',
  )
);


// Setting - preloader.
$wp_customize->add_setting(
  'enable_site_preloader',
  array(
    'default' => $chromenews_default['enable_site_preloader'],
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'chromenews_sanitize_checkbox',
  )
);

$wp_customize->add_control(
  'enable_site_preloader',
  array(
    'label' => __('Enable Preloader', 'chromenews'),
    'section' => 'site_layout_settings',
    'type' => 'checkbox',
    'priority' => 10,
  )
);

// Setting - Disable Emoji Script.
$wp_customize->add_setting(
  'disable_wp_emoji',
  array(
    'default'           => $chromenews_default['disable_wp_emoji'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'chromenews_sanitize_checkbox',
  )
);

$wp_customize->add_control(
  'disable_wp_emoji',
  array(
    'label'    => __('Disable Emoji Script', 'chromenews'),
    'description'       => __('GDPR friendly & better performance', 'chromenews'),
    'section'  => 'site_layout_settings', // Use your preferred section.
    'type'     => 'checkbox',
    'priority' => 10,
  )
);


// Setting - global content alignment of news.
$wp_customize->add_setting(
  'global_content_alignment',
  array(
    'default' => $chromenews_default['global_content_alignment'],
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'chromenews_sanitize_select',
  )
);

$wp_customize->add_control(
  'global_content_alignment',
  array(
    'label' => __('Global Content Alignment', 'chromenews'),
    'section' => 'site_layout_settings',
    'type' => 'select',
    'choices' => array(
      'align-content-left' => __('Content - Primary sidebar', 'chromenews'),
      'align-content-right' => __('Primary sidebar - Content', 'chromenews'),
      'full-width-content' => __('Full width content', 'chromenews')
    ),
    'priority' => 130,
  )
);


// Setting - global content alignment of news.
$wp_customize->add_setting(
  'global_fetch_content_image_setting',
  array(
    'default'           => $chromenews_default['global_fetch_content_image_setting'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'chromenews_sanitize_select',
  )
);

$wp_customize->add_control(
  'global_fetch_content_image_setting',
  array(
    'label'       => __('Also Show Content Image in Archive', 'chromenews'),
    'description' => __('If there is no Post Featured image set', 'chromenews'),
    'section'     => 'site_layout_settings',
    'type'        => 'select',
    'choices'               => array(
      'enable' => __('Enable ', 'chromenews'),
      'disable' => __('Disable', 'chromenews'),

    ),
    'priority'    => 130,
  )
);



// Global Section.
$wp_customize->add_section(
  'site_categories_settings',
  array(
    'title' => __('Categories Settings', 'chromenews'),
    'priority' => 10,
    'capability' => 'edit_theme_options',
    'panel' => 'theme_option_panel',
  )
);

// Setting - global content alignment of news.
$wp_customize->add_setting(
  'global_show_categories',
  array(
    'default' => $chromenews_default['global_show_categories'],
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'chromenews_sanitize_select',
  )
);

$wp_customize->add_control(
  'global_show_categories',
  array(
    'label' => __('Post Categories', 'chromenews'),
    'section' => 'site_categories_settings',
    'type' => 'select',
    'choices' => array(
      'yes' => __('Show', 'chromenews'),
      'no' => __('Hide', 'chromenews'),

    ),
    'priority' => 130,
  )
);




// Global Section.
$wp_customize->add_section(
  'site_author_and_date_settings',
  array(
    'title' => __('Author and Date Settings', 'chromenews'),
    'priority' => 9,
    'capability' => 'edit_theme_options',
    'panel' => 'theme_option_panel',
  )
);


// Setting - global content alignment of news.
$wp_customize->add_setting(
  'global_post_date_author_setting',
  array(
    'default' => $chromenews_default['global_post_date_author_setting'],
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'chromenews_sanitize_select',
  )
);

$wp_customize->add_control(
  'global_post_date_author_setting',
  array(
    'label' => __('For Spotlight Posts', 'chromenews'),
    'section' => 'site_author_and_date_settings',
    'type' => 'select',
    'choices' => array(
      'show-date-author' => __('Show Date and Author', 'chromenews'),
      'show-date-only' => __('Show Date Only', 'chromenews'),
      'hide-date-author' => __('Hide All', 'chromenews'),
    ),
    'priority' => 130,
  )
);


// Setting - global content alignment of news.
$wp_customize->add_setting(
  'small_grid_post_date_author_setting',
  array(
    'default' => $chromenews_default['small_grid_post_date_author_setting'],
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'chromenews_sanitize_select',
  )
);

$wp_customize->add_control(
  'small_grid_post_date_author_setting',
  array(
    'label' => __('For Small Grid', 'chromenews'),
    'section' => 'site_author_and_date_settings',
    'type' => 'select',
    'choices' => array(
      'show-date-author' => __('Show Date and Author', 'chromenews'),
      'show-date-only' => __('Show Date', 'chromenews'),
      'hide-date-author' => __('Hide All', 'chromenews'),
    ),
    'priority' => 130,
  )
);

// Setting - global content alignment of news.
$wp_customize->add_setting(
  'list_post_date_author_setting',
  array(
    'default' => $chromenews_default['list_post_date_author_setting'],
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'chromenews_sanitize_select',
  )
);

$wp_customize->add_control(
  'list_post_date_author_setting',
  array(
    'label' => __('For List', 'chromenews'),
    'section' => 'site_author_and_date_settings',
    'type' => 'select',
    'choices' => array(
      'show-date-only' => __('Show Date', 'chromenews'),
      'hide-date-author' => __('Hide All', 'chromenews'),
    ),
    'priority' => 130,
  )
);

// Setting - global content alignment of news.
$wp_customize->add_setting(
  'global_author_icon_gravatar_display_setting',
  array(
    'default' => $chromenews_default['global_author_icon_gravatar_display_setting'],
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'chromenews_sanitize_select',
  )
);

$wp_customize->add_control(
  'global_author_icon_gravatar_display_setting',
  array(
    'label' => __('Author Icon/Gravatar', 'chromenews'),
    'section' => 'site_author_and_date_settings',
    'type' => 'select',
    'choices' => array(
      'display-gravatar' => __('Show Gravatar', 'chromenews'),
      'display-icon' => __('Show Icon', 'chromenews'),
      'display-none' => __('None', 'chromenews'),
    ),
    'priority' => 130,
    'active_callback' => 'chromenews_display_author_status'
  )
);

// Setting - global content alignment of news.
$wp_customize->add_setting(
  'global_date_display_type',
  array(
    'default' => $chromenews_default['global_date_display_type'],
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'chromenews_sanitize_select',
  )
);

$wp_customize->add_control(
  'global_date_display_type',
  array(
    'label' => __('Post Date Type', 'chromenews'),
    'section' => 'site_author_and_date_settings',
    'type' => 'select',
    'choices' => array(
      'published' => __('Published Date', 'chromenews'),
      'modified' => __('Modified Date', 'chromenews'),


    ),
    'priority' => 130,
    'active_callback' => 'chromenews_display_date_status'
  )
);

// Setting - global content alignment of news.
$wp_customize->add_setting(
  'global_date_display_setting',
  array(
    'default' => $chromenews_default['global_date_display_setting'],
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'chromenews_sanitize_select',
  )
);

$wp_customize->add_control(
  'global_date_display_setting',
  array(
    'label' => __('Date Format', 'chromenews'),
    'section' => 'site_author_and_date_settings',
    'type' => 'select',
    'choices' => array(
      'default-date' => __('WordPress Default Date Format', 'chromenews'),
      'theme-date' => __('Ago Date Format', 'chromenews'),


    ),
    'priority' => 130,
    'active_callback' => 'chromenews_display_date_status'
  )
);


//========== minutes read count options ===============

// Global Section.
$wp_customize->add_section(
  'site_min_read_settings',
  array(
    'title' => __('Minutes Read Count', 'chromenews'),
    'priority' => 9,
    'capability' => 'edit_theme_options',
    'panel' => 'theme_option_panel',
  )
);


// Setting - global content alignment of news.
$wp_customize->add_setting(
  'global_show_min_read',
  array(
    'default' => $chromenews_default['global_show_min_read'],
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'chromenews_sanitize_select',
  )
);

$wp_customize->add_control(
  'global_show_min_read',
  array(
    'label' => __('Minutes Read Count', 'chromenews'),
    'section' => 'site_min_read_settings',
    'type' => 'select',
    'choices' => array(
      'yes' => __('Show', 'chromenews'),
      'no' => __('Hide', 'chromenews'),

    ),
    'priority' => 130,
  )
);




// Global Section.
$wp_customize->add_section(
  'site_excerpt_settings',
  array(
    'title' => __('Excerpt Settings', 'chromenews'),
    'priority' => 10,
    'capability' => 'edit_theme_options',
    'panel' => 'theme_option_panel',
  )
);


// Setting - related posts.
$wp_customize->add_setting(
  'global_read_more_texts',
  array(
    'default' => $chromenews_default['global_read_more_texts'],
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
  )
);

$wp_customize->add_control(
  'global_read_more_texts',
  array(
    'label' => __('Global Excerpt Read More', 'chromenews'),
    'section' => 'site_excerpt_settings',
    'type' => 'text',
    'priority' => 130,

  )
);


//============= Watch Online Section ==========
//section title
$wp_customize->add_setting(
  'show_watch_online_section_section_title',
  array(
    'sanitize_callback' => 'sanitize_text_field',
  )
);

$wp_customize->add_control(
  new ChromeNews_Section_Title(
    $wp_customize,
    'show_watch_online_section_section_title',
    array(
      'label' => __("Custom Menu Section", 'chromenews'),
      'section' => 'header_builder',
      'priority' => 100,

    )
  )
);

$wp_customize->add_setting(
  'show_watch_online_section',
  array(
    'default' => $chromenews_default['show_watch_online_section'],
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'chromenews_sanitize_checkbox',
  )
);

$wp_customize->add_control(
  'show_watch_online_section',
  array(
    'label' => __('Enable Custom Menu Section', 'chromenews'),
    'section' => 'header_builder',
    'type' => 'checkbox',
    'priority' => 100,

  )
);

$wp_customize->add_setting(
  'aft_custom_icon_preset',
  array(
    'default' => $chromenews_default['aft_custom_icon_preset'],
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'chromenews_sanitize_select',
  )
);

$wp_customize->add_control(
  'aft_custom_icon_preset',
  array(
    'label' => __('Icon', 'chromenews'),
    'section' => 'header_builder',
    'type' => 'select',
    'choices' => array(
      'fas fa-bell' => __('Bell', 'chromenews'),
      'fas fa-play' => __('Play', 'chromenews'),
      'fas fa-user' => __('User', 'chromenews'),
    ),
    'priority' => 100,
    'active_callback' => 'chromenews_show_watch_online_section_status'
  )
);



// Setting - related posts.
$wp_customize->add_setting(
  'aft_custom_title',
  array(
    'default' => $chromenews_default['aft_custom_title'],
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
  )
);

$wp_customize->add_control(
  'aft_custom_title',
  array(
    'label' => __('Title', 'chromenews'),
    'section' => 'header_builder',
    'type' => 'text',
    'priority' => 100,
    'active_callback' => 'chromenews_show_watch_online_section_status'
  )
);

// Setting - related posts.
$wp_customize->add_setting(
  'aft_custom_link',
  array(
    'default' => $chromenews_default['aft_custom_link'],
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'esc_url_raw',
  )
);

$wp_customize->add_control(
  'aft_custom_link',
  array(
    'label' => __('Link', 'chromenews'),
    'section' => 'header_builder',
    'settings' => 'aft_custom_link',
    'type' => 'text',
    'priority' => 100,
    'active_callback' => 'chromenews_show_watch_online_section_status'
  )
);



//========== single posts options ===============

// Single Section.
$wp_customize->add_section(
  'site_single_posts_settings',
  array(
    'title' => __('Single Post', 'chromenews'),
    'priority' => 10,
    'capability' => 'edit_theme_options',
    'panel' => 'theme_option_panel',
  )
);

// Setting - related posts.
$wp_customize->add_setting(
  'single_show_featured_image',
  array(
    'default' => $chromenews_default['single_show_featured_image'],
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'chromenews_sanitize_checkbox',
  )
);

$wp_customize->add_control(
  'single_show_featured_image',
  array(
    'label' => __('Show Featured Image', 'chromenews'),
    'section' => 'site_single_posts_settings',
    'settings' => 'single_show_featured_image',
    'type' => 'checkbox',
    'priority' => 100,
  )
);


$wp_customize->add_setting(
  'single_post_title_view',
  array(
    'default' => $chromenews_default['single_post_title_view'],
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'chromenews_sanitize_select',
  )
);

$wp_customize->add_control(
  'single_post_title_view',
  array(
    'label' => __('Featured Image Position', 'chromenews'),
    'section' => 'site_single_posts_settings',

    'type' => 'select',
    'choices' => array(
      'boxed' => __('Default', 'chromenews'),
      'title-below-image' => __('Title below image', 'chromenews'),


    ),
    'priority' => 100,
    'active_callback' => 'chromenews_featured_image_posts_status'
  )
);


// Setting - global content alignment of news.
$wp_customize->add_setting(
  'global_single_content_mode',
  array(
    'default'           => $default['global_single_content_mode'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'chromenews_sanitize_select',
  )
);

$wp_customize->add_control(
  'global_single_content_mode',
  array(
    'label'       => __('Single Content', 'chromenews'),
    'section'     => 'site_single_posts_settings',
    'settings'     => 'global_single_content_mode',
    'type'        => 'select',
    'choices'               => array(
      'single-content-mode-boxed' => __('Spacious', 'chromenews'),
      'single-content-mode-compact' => __('Compact', 'chromenews'),
    ),
    'priority'    => 100,
  )
);


// Setting - trending posts.
$wp_customize->add_setting(
  'single_show_tags_list',
  array(
    'default' => $default['single_show_tags_list'],
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'chromenews_sanitize_checkbox',
  )
);

$wp_customize->add_control(
  'single_show_tags_list',
  array(
    'label' => __('Show Tags under Content', 'chromenews'),
    'section' => 'site_single_posts_settings',
    'settings' => 'single_show_tags_list',
    'type' => 'checkbox',
    'priority' => 100,
  )
);


//Social share option

if (class_exists('Jetpack') && Jetpack::is_module_active('sharedaddy')) :
  $wp_customize->add_setting(
    'single_post_social_share_view',
    array(
      'default' => $chromenews_default['single_post_social_share_view'],
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'chromenews_sanitize_select',
    )
  );

  $wp_customize->add_control(
    'single_post_social_share_view',
    array(
      'label' => __('Social Share Option', 'chromenews'),
      'description' => __('Social Share from Jetpack plugin', 'chromenews'),
      'section' => 'site_single_posts_settings',
      'type' => 'select',
      'choices' => array(
        'after-title-default' => __('After Title', 'chromenews'),
        'before-title' => __('Before Title', 'chromenews'),
        'after-content' => __('After Content', 'chromenews'),
      ),
      'priority' => 100,
    )
  );
endif;



//========== related posts  options ===============

$wp_customize->add_setting(
  'single_related_posts_section_title',
  array(
    'sanitize_callback' => 'sanitize_text_field',
  )
);

$wp_customize->add_control(
  new ChromeNews_Section_Title(
    $wp_customize,
    'single_related_posts_section_title',
    array(
      'label' => __("Related Posts Settings", 'chromenews'),
      'section' => 'site_single_posts_settings',
      'priority' => 100,

    )
  )
);

// Setting - related posts.
$wp_customize->add_setting(
  'single_show_related_posts',
  array(
    'default' => $chromenews_default['single_show_related_posts'],
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'chromenews_sanitize_checkbox',
  )
);

$wp_customize->add_control(
  'single_show_related_posts',
  array(
    'label' => __('Enable Related Posts', 'chromenews'),
    'section' => 'site_single_posts_settings',
    'type' => 'checkbox',
    'priority' => 100,
  )
);

// Setting - related posts.
$wp_customize->add_setting(
  'single_related_posts_title',
  array(
    'default' => $chromenews_default['single_related_posts_title'],
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
  )
);

$wp_customize->add_control(
  'single_related_posts_title',
  array(
    'label' => __('Title', 'chromenews'),
    'section' => 'site_single_posts_settings',
    'settigs' => 'single_related_posts_title',
    'type' => 'text',
    'priority' => 100,
    'active_callback' => 'chromenews_related_posts_status'
  )
);





/**
 * Archive options section
 *
 * @package ChromeNews
 */

// Archive Section.
$wp_customize->add_section(
  'site_archive_settings',
  array(
    'title' => __('Archive Settings', 'chromenews'),
    'priority' => 10,
    'capability' => 'edit_theme_options',
    'panel' => 'theme_option_panel',
  )
);


// Disable main banner in blog
$wp_customize->add_setting(
  'disable_main_banner_on_blog_archive',
  array(
    'default'           => $default['disable_main_banner_on_blog_archive'],
    'capability'        => 'edit_theme_options',
    'sanitize_callback' => 'chromenews_sanitize_checkbox',
  )
);

$wp_customize->add_control(
  'disable_main_banner_on_blog_archive',
  array(
    'label'    => __('Disable Main Banner on Blog', 'chromenews'),
    'section'  => 'site_archive_settings',
    'type'     => 'checkbox',
    'priority' => 50,
    'active_callback' => 'chromenews_main_banner_section_status'
  )
);

//Setting - archive content view of news.
$wp_customize->add_setting(
  'archive_layout',
  array(
    'default' => $chromenews_default['archive_layout'],
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'chromenews_sanitize_select',
  )
);

$wp_customize->add_control(
  'archive_layout',
  array(
    'label' => __('Archive layout', 'chromenews'),
    'description' => __('Select layout for archive', 'chromenews'),
    'section' => 'site_archive_settings',
    'settings' => 'archive_layout',
    'type' => 'select',
    'choices' => array(
      'archive-layout-grid' => __('Grid', 'chromenews'),
      'archive-layout-list' => __('List', 'chromenews'),

    ),
    'priority' => 130,
  )
);



//========== sidebar blocks options ===============

// Trending Section.
$wp_customize->add_section(
  'sidebar_block_settings',
  array(
    'title' => __('Sidebar Settings', 'chromenews'),
    'priority' => 10,
    'capability' => 'edit_theme_options',
    'panel' => 'theme_option_panel',
  )
);


// Setting - frontpage_sticky_sidebar.
$wp_customize->add_setting(
  'frontpage_sticky_sidebar',
  array(
    'default' => $default['frontpage_sticky_sidebar'],
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'chromenews_sanitize_checkbox',
  )
);

$wp_customize->add_control(
  'frontpage_sticky_sidebar',
  array(
    'label' => __('Make Sidebar Sticky', 'chromenews'),
    'section' => 'sidebar_block_settings',
    'type' => 'checkbox',
    'priority' => 100,

  )
);

// Setting - global content alignment of news.
$wp_customize->add_setting(
  'frontpage_sticky_sidebar_position',
  array(
    'default' => $default['frontpage_sticky_sidebar_position'],
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'chromenews_sanitize_select',
  )
);

$wp_customize->add_control(
  'frontpage_sticky_sidebar_position',
  array(
    'label' => __('Sidebar Sticky Position', 'chromenews'),
    'section' => 'sidebar_block_settings',
    'settings' => 'frontpage_sticky_sidebar_position',
    'type' => 'select',
    'choices' => array(
      'sidebar-sticky-top' => __('Top', 'chromenews'),
      'sidebar-sticky-bottom' => __('Bottom', 'chromenews'),
    ),
    'priority' => 100,
    'active_callback' => 'chromenews_frontpage_sticky_sidebar_status'
  )
);

//========== footer latest blog carousel options ===============

// Footer Section.
$wp_customize->add_section(
  'frontpage_latest_posts_settings',
  array(
    'title' => __('You May Have Missed', 'chromenews'),
    'priority' => 50,
    'capability' => 'edit_theme_options',
    'panel' => 'theme_option_panel',
  )
);
// Setting - latest blog carousel.
$wp_customize->add_setting(
  'frontpage_show_latest_posts',
  array(
    'default' => $chromenews_default['frontpage_show_latest_posts'],
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'chromenews_sanitize_checkbox',
  )
);

$wp_customize->add_control(
  'frontpage_show_latest_posts',
  array(
    'label' => __('Show Above Footer', 'chromenews'),
    'section' => 'frontpage_latest_posts_settings',
    'type' => 'checkbox',
    'priority' => 100,
  )
);


// Setting - featured_news_section_title.
$wp_customize->add_setting(
  'frontpage_latest_posts_section_title',
  array(
    'default' => $chromenews_default['frontpage_latest_posts_section_title'],
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
  )
);
$wp_customize->add_control(
  'frontpage_latest_posts_section_title',
  array(
    'label' => __('Posts Section Title', 'chromenews'),
    'section' => 'frontpage_latest_posts_settings',
    'settings' => 'frontpage_latest_posts_section_title',
    'type' => 'text',
    'priority' => 100,
    'active_callback' => 'chromenews_latest_news_section_status'

  )
);



//========== footer section options ===============
// Footer Section.
$wp_customize->add_section(
  'site_footer_settings',
  array(
    'title' => __('Footer', 'chromenews'),
    'priority' => 50,
    'capability' => 'edit_theme_options',
    'panel' => 'theme_option_panel',
  )
);


// Setting banner_advertisement_section.
$wp_customize->add_setting(
  'footer_background_image',
  array(
    'default' => $default['footer_background_image'],
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'absint',
  )
);


$wp_customize->add_control(
  new WP_Customize_Cropped_Image_Control(
    $wp_customize,
    'footer_background_image',
    array(
      'label' => __('Footer Background Image', 'chromenews'),
      'description' => sprintf(__('Recommended Size %1$s px X %2$s px', 'chromenews'), 1024, 800),
      'section' => 'footer_builder',
      'settings' => 'footer_background_image',
      'width' => 1024,
      'height' => 800,
      'flex_width' => true,
      'flex_height' => true,
      'priority' => 100,
    )
  )
);

// Setting - global content alignment of news.
$wp_customize->add_setting(
  'footer_copyright_text',
  array(
    'default' => $chromenews_default['footer_copyright_text'],
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'sanitize_text_field',
  )
);

$wp_customize->add_control(
  'footer_copyright_text',
  array(
    'label' => __('Copyright Text', 'chromenews'),
    'section' => 'footer_builder',
    'settings' => 'footer_copyright_text',
    'type' => 'text',
    'priority' => 100,
  )
);


// Setting - global content alignment of news.
$wp_customize->add_setting(
  'hide_footer_menu_section',
  array(
    'default' => $chromenews_default['hide_footer_menu_section'],
    'capability' => 'edit_theme_options',
    'sanitize_callback' => 'chromenews_sanitize_checkbox',
  )
);

$wp_customize->add_control(
  'hide_footer_menu_section',
  array(
    'label' => __('Hide footer Menu Section', 'chromenews'),
    'section' => 'footer_builder',
    'type' => 'checkbox',
    'priority' => 100,
    'active_callback' => 'chromenews_is_inactive_footer_builder'
  )
);
