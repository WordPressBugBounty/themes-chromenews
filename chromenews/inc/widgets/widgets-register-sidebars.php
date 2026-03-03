<?php

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function chromenews_widgets_init()
{


  register_sidebar(array(
    'name' => __('Main Sidebar', 'chromenews'),
    'id' => 'sidebar-1',
    'description' => __('Add widgets for main sidebar.', 'chromenews'),
    'before_widget' => '<div id="%1$s" class="widget chromenews-widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="widget-title widget-title-1"><span class="heading-line-before"></span><span class="heading-line">',
    'after_title' => '</span><span class="heading-line-after"></span></h2>',
  ));
  register_sidebar(array(
    'name' => __('Header Widget 1', 'chromenews'),
    'id' => 'header-1-widgets',
    'description' => __('Add widgets for header section.', 'chromenews'),
    'before_widget' => '<div id="%1$s" class="header-widget %2$s">',
    'after_widget' => '</div>',

  ));

  register_sidebar(array(
    'name' => __('Header Widget 2', 'chromenews'),
    'id' => 'header-2-widgets',
    'description' => __('Add widgets for header section.', 'chromenews'),
    'before_widget' => '<div id="%1$s" class="header-widget %2$s">',
    'after_widget' => '</div>',

  ));
  register_sidebar(array(
    'name' => __('Header Widget 3', 'chromenews'),
    'id' => 'header-3-widgets',
    'description' => __('Add widgets for header section.', 'chromenews'),
    'before_widget' => '<div id="%1$s" class="header-widget %2$s">',
    'after_widget' => '</div>',

  ));
  register_sidebar(array(
    'name' => __('Front-page Content Section', 'chromenews'),
    'id' => 'home-content-widgets',
    'description' => __('Add widgets to front-page contents section.', 'chromenews'),
    'before_widget' => '<div id="%1$s" class="widget chromenews-widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="widget-title widget-title-1"><span class="heading-line-before"></span><span class="heading-line">',
    'after_title' => '</span><span class="heading-line-after"></span></h2>',
  ));

  register_sidebar(array(
    'name' => __('Front-page Sidebar Section', 'chromenews'),
    'id' => 'home-sidebar-widgets',
    'description' => __('Add widgets to front-page sidebar section.', 'chromenews'),
    'before_widget' => '<div id="%1$s" class="widget chromenews-widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="widget-title widget-title-1"><span class="heading-line-before"></span><span class="heading-line">',
    'after_title' => '</span><span class="heading-line-after"></span></h2>',
  ));

  register_sidebar(array(
    'name'          => __('Off Canvas', 'chromenews'),
    'id'            => 'express-off-canvas-panel',
    'description'   => __('Add widgets for off-canvas section.', 'chromenews'),
    'before_widget' => '<div id="%1$s" class="widget chromenews-widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="widget-title widget-title-1"><span class="heading-line-before"></span><span class="heading-line">',
    'after_title' => '</span><span class="heading-line-after"></span></h2>',
  ));

  register_sidebar(array(
    'name' => __('Footer First Section', 'chromenews'),
    'id' => 'footer-first-widgets-section',
    'description' => __('Displays items on footer first column.', 'chromenews'),
    'before_widget' => '<div id="%1$s" class="widget chromenews-widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="widget-title widget-title-1"><span class="heading-line-before"></span><span class="heading-line">',
    'after_title' => '</span><span class="heading-line-after"></span></h2>',
  ));


  register_sidebar(array(
    'name' => __('Footer Second Section', 'chromenews'),
    'id' => 'footer-second-widgets-section',
    'description' => __('Displays items on footer second column.', 'chromenews'),
    'before_widget' => '<div id="%1$s" class="widget chromenews-widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="widget-title widget-title-1"><span class="heading-line-before"></span><span class="heading-line">',
    'after_title' => '</span><span class="heading-line-after"></span></h2>',
  ));

  register_sidebar(array(
    'name' => __('Footer Third Section', 'chromenews'),
    'id' => 'footer-third-widgets-section',
    'description' => __('Displays items on footer third column.', 'chromenews'),
    'before_widget' => '<div id="%1$s" class="widget chromenews-widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h2 class="widget-title widget-title-1"><span class="heading-line-before"></span><span class="heading-line">',
    'after_title' => '</span><span class="heading-line-after"></span></h2>',
  ));
}

add_action('widgets_init', 'chromenews_widgets_init');
