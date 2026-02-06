<?php

if (!function_exists('athfb_render_header_builder')) {
  function athfb_render_header_builder()
  {

    $header_data = get_option('header_builder_data', athfb_get_default_header_structure());


    $header_structure = json_decode($header_data, true);
    if (!$header_structure) {
      return;
    }

    wp_enqueue_style('chromenews_builder');
    athfb_render_builder_structure($header_structure, 'header');
  }
}

/**
 * Render Footer Builder
 */
if (!function_exists('athfb_render_footer_builder')) {

  function athfb_render_footer_builder()
  {

    $footer_data = get_option('footer_builder_data', athfb_get_default_footer_structure());

    $footer_structure = json_decode($footer_data, true);
    if (!$footer_structure) {
      return;
    } ?>


    <?php athfb_render_footer_structure($footer_structure, 'footer');
    ?>

  <?php
  }
}


if (!function_exists('athfb_render_element')) {
  function athfb_render_element($element, $context)
  {
    if (!isset($element['type']) || !isset($element['id'])) {
      return;
    }

    $element_type = $element['type'];
    $element_id = $element['id'];


    switch ($element_type) {
      case 'header_logo':
        athfb_render_logo_element($element_id, $context);
        break;
      case 'header_navigation':
        athfb_render_navigation_element($element_id, $context);
        break;

      case 'header_promotion':
        athfb_render_promotion_element($element_id, $context);
        break;
      case 'header_off_canvas':
        athfb_render_header_off_canvas_element($element_id, $context);
        break;
      case 'header_date';
        athfb_render_header_date_element($element_id, $context);
        break;

      case 'header_top_navigation';
        athfb_render_top_menu_element($element_id, $context);
        break;

      case 'header_site_mode';
        athfb_render_header_site_mode_element($element_id, $context);
        break;

      case 'header_html';
        athfb_render_header_html_element($element_id, $context);
        break;
      case 'header_search':

        athfb_render_search_element($element_id, $context);
        break;
      case 'header_button':

        athfb_render_button_element($element_id, $context);
        break;

      case 'header_widget_1':
        athfb_render_widget_element($element_id, $context, 1);
        break;

      case 'header_widget_2':
        athfb_render_widget_element($element_id, $context, 2);
        break;

      case 'header_widget_3':
        athfb_render_widget_element($element_id, $context, 3);
        break;
      case 'header_social_icons':
        athfb_render_social_icons_element($element_id, $context);
        break;
      //Footer Part
      case 'footer_navigation':
        athfb_render_footer_navigation_element($element_id, $context);
        break;

      case 'footer_date';
        athfb_render_header_date_element($element_id, $context);
        break;
      case 'footer_site_mode';
        athfb_render_header_site_mode_element($element_id, $context);
        break;

      case 'footer_html';
        athfb_render_header_html_element($element_id, $context);
        break;

      case 'footer_search':
        athfb_render_search_element($element_id, $context);
        break;

      case 'footer_button':

        athfb_render_button_element($element_id, $context);
        break;

      case 'footer_social_icons': // Added specific case for footer social icons
        athfb_render_social_icons_element($element_id, $context); // Re-use existing render function if logic is same
        break;
      case 'footer_copyright':
        athfb_render_copyright_element($element_id);
        break;
      case 'footer_widget_1':
        athfb_render_footer_widget_element($element_id, $context, 1);
        break;
      case 'footer_widget_2':
        athfb_render_footer_widget_element($element_id, $context, 2);
        break;
      case 'footer_widget_3':
        athfb_render_footer_widget_element($element_id, $context, 3);
        break;
        //
    }
  }
}


/**
 * Render Logo Element
 */
if (!function_exists('athfb_render_logo_element')) {
  function athfb_render_logo_element($element_id)
  { ?>

    <div class="logo">
      <?php do_action('chromenews_load_site_branding'); ?>
    </div>
    <?php }
}

/**
 * Render Offcanvas
 */

if (!function_exists('athfb_render_header_off_canvas_element')) {
  function athfb_render_header_off_canvas_element($element_id, $context)
  {
    //if (!chromenews_is_amp()) {
    if (is_active_sidebar('express-off-canvas-panel')) :
      wp_enqueue_style('sidr');
      wp_enqueue_script('sidr');
    ?>

      <?php if (is_active_sidebar('express-off-canvas-panel')) : ?>

        <div class="off-cancas-panel">
          <?php do_action('chromenews_load_off_canvas'); ?>
        </div>
        <div id="sidr" class="primary-background">
          <a class="sidr-class-sidr-button-close" href="#sidr-nav" aria-label="Close"></a>
          <?php dynamic_sidebar('express-off-canvas-panel'); ?>
        </div>

      <?php endif;
    endif;
  }
}

/**
 * Render Promotion
 */
if (!function_exists('athfb_render_promotion_element')) {
  function athfb_render_promotion_element($element_id, $context)
  {
    $chromenews_banner_advertisement_scope = chromenews_get_option('banner_advertisement_scope');
    if ($chromenews_banner_advertisement_scope == 'front-page-only'):
      if (is_home() || is_front_page()):
      ?>
        <div class="below-mid-header">
          <div class="container-wrapper">
            <div class="header-promotion">
              <?php do_action('chromenews_action_banner_advertisement'); ?>
            </div>
          </div>
        </div>
      <?php endif; ?>
    <?php else: ?>
      <div class="below-mid-header">
        <div class="container-wrapper">
          <div class="header-promotion">
            <?php do_action('chromenews_action_banner_advertisement'); ?>
          </div>
        </div>
      </div>
    <?php endif;
  }
}
/**
 * Render Navigation Element
 */
if (!function_exists('athfb_render_navigation_element')) {
  function athfb_render_navigation_element($element_id, $context)
  {
    do_action('chromenews_action_main_menu_nav');
  }
}

if (!function_exists('athfb_render_footer_navigation_element')) {
  function athfb_render_footer_navigation_element($element, $context)
  {
    if (has_nav_menu('aft-footer-nav')): ?>
      <div class="float-l color-pad">
        <div class="footer-nav-wrapper">
          <?php
          wp_nav_menu(array(
            'theme_location' => 'aft-footer-nav',
            'menu_id' => 'footer-menu',
            'depth' => 1,
            'container' => 'div',
            'container_class' => 'footer-navigation'
          )); ?>
        </div>
      </div>
    <?php endif;
  }
}

/**
 * Render Search Element
 */
if (!function_exists('athfb_render_search_element')) {
  function athfb_render_search_element($element_id, $contex)
  {


    if ($contex === 'header') {
      do_action('chromenews_load_search_form');
    }
  }
}


/**
 * Render Button Element
 */
if (!function_exists('athfb_render_button_element')) {
  function athfb_render_button_element($element_id, $context)
  {

    do_action('chromenews_load_watch_online');
  }
}

/**
 * Render Social Icons Element (used for both generic and footer-specific social icons)
 */
if (!function_exists('athfb_render_social_icons_element')) {
  function athfb_render_social_icons_element($element_id, $context)
  {
    if ($context === 'header') { ?>

      <?php if (has_nav_menu('aft-social-nav')) { ?>
        <div class="aft-small-social-menu">
          <?php
          wp_nav_menu(array(
            'theme_location' => 'aft-social-nav',
            'link_before' => '<span class="screen-reader-text">',
            'link_after' => '</span>',
            'container' => 'div',
            'container_class' => 'social-navigation'
          ));
          ?>
        </div>

      <?php } else {

        wp_nav_menu(array(
          'theme_location' => 'primary-menu',
          'menu_id' => 'top-navigation',
          'menu_class' => 'menu menu-mobile',
          'container' => 'div',
          'container_class' => 'menu main-menu menu-desktop show-menu-border'

        ));
      };
      ?>

      <?php } else {

      if (has_nav_menu('aft-social-nav')): ?>
        <div class="float-l color-pad">
          <div class="footer-social-wrapper">
            <div class="aft-small-social-menu">
              <?php
              wp_nav_menu(array(
                'theme_location' => 'aft-social-nav',
                'link_before' => '<span class="screen-reader-text">',
                'link_after' => '</span>',
                'container' => 'div',
                'container_class' => 'social-navigation'
              ));
              ?>
            </div>
          </div>
        </div>
      <?php endif;
    }
  }
}

/**
 * Render Copyright Element
 */
if (!function_exists('athfb_render_copyright_element')) {
  function athfb_render_copyright_element($element_id)
  {

    $chromenews_copy_right = chromenews_get_option('footer_copyright_text');


    // Get the current year based on WordPress date settings
    $current_year = date_i18n('Y');
    // Replace {year} placeholder with the current year
    $chromenews_copy_right = str_replace('{year}', $current_year, $chromenews_copy_right);
    if (!empty($chromenews_copy_right)): ?>
      <?php echo esc_html($chromenews_copy_right); ?>
    <?php endif; ?>
    <?php $chromenews_theme_credits = chromenews_get_option('hide_footer_copyright_credits'); ?>
    <?php if ($chromenews_theme_credits != 1): ?>
      <span class="sep"> | </span>
    <?php
      /* translators: 1: Theme name, 2: Theme author. */
      printf(esc_html__('%1$s by %2$s.', 'chromenews'), '<a href="https://afthemes.com/products/chromenews/" target="_blank">ChromeNews</a>', 'AF themes');

    endif;
  }
}

/**
 * Render Mobile Menu Element
 */
if (!function_exists('athfb_render_top_menu_element')) {
  function athfb_render_top_menu_element($element_id, $context)
  {
    $topnav = get_option("athfb_{$context}_top_navigation_menu_id", '');

    if (has_nav_menu('aft-top-nav')) :
      wp_nav_menu(array(
        'theme_location' => 'aft-top-nav',
        'container' => 'div',
        'menu_id' => 'top-menu',
        'depth' => 1,
        'container_class' => 'top-navigation'
      ));
    endif;
  }
}

/**
 * Render header date
 */
if (!function_exists('athfb_render_header_date_element')) {
  function athfb_render_header_date_element($element_id, $context)
  {
    $chromenews_show_time = chromenews_get_option('show_time_section'); ?>
    <span class="topbar-date">
      <?php
      $datetime = '';

      $datetime .= date_i18n(get_option('date_format'), current_time('timestamp'));


      if ($chromenews_show_time == true) {
        $chromenews_top_header_time_format = chromenews_get_option('top_header_time_format');
        if ($chromenews_top_header_time_format == 'en-US' || $chromenews_top_header_time_format == 'en-GB') {
          $datetime .=  ' <span id="topbar-time"></span>';
        } else {
          $datetime .=  ' <span id="topbar-time-wp">';
          $datetime .=  date_i18n(get_option('time_format'), current_time('timestamp'));
          $datetime .=  '</span>';
        }
      }

      echo wp_kses_post($datetime);
      ?>
    </span>
  <?php
  }
}

/**
 * Render Site mode
 */
if (!function_exists('athfb_render_header_site_mode_element')) {
  function athfb_render_header_site_mode_element($element_id, $context)
  {

    do_action('chromenews_dark_and_light_mode');
  }
}
/**
 * Render custom html
 */

if (!function_exists('athfb_render_header_html_element')) {
  function athfb_render_header_html_element($element_id, $context)
  {
    $html = get_option("athfb_{$context}_html_custom_html", '');

    if (empty($html)) {
      return;
    }

  ?>
    <span class="aft-<?php echo esc_attr($context) ?>-custom-html">
      <?php echo do_shortcode($html); ?>
    </span>
<?php
  }
}
/**
 * 
 * Render Widget
 */
if (!function_exists('athfb_render_widget_element')) {
  function athfb_render_widget_element($element_id, $context, $widget_number)
  {

    if ($widget_number === 1) {
      $selected_sidebar_id = 'header-1-widgets';
    } elseif ($widget_number === 2) {
      $selected_sidebar_id = 'header-2-widgets';
    } else {
      $selected_sidebar_id = 'header-3-widgets';
    }

    if (! empty($selected_sidebar_id) && is_active_sidebar($selected_sidebar_id)) {
      dynamic_sidebar($selected_sidebar_id);
    }
  }
}

/**
 * 
 * Render Widget
 */
if (!function_exists('athfb_render_footer_widget_element')) {
  function athfb_render_footer_widget_element($element_id, $context, $widget_number)
  {

    if ($widget_number === 1) {
      $selected_sidebar_id = 'footer-first-widgets-section';
    } elseif ($widget_number === 2) {
      $selected_sidebar_id = 'footer-second-widgets-section';
    } else {
      $selected_sidebar_id = 'footer-third-widgets-section';
    }

    if (! empty($selected_sidebar_id) && is_active_sidebar($selected_sidebar_id)) {
      dynamic_sidebar($selected_sidebar_id);
    }
  }
}

if (!function_exists('athfb_has_menu_items')) {
  function athfb_has_menu_items($menu_location)
  {

    $locations = get_nav_menu_locations();

    $has_menu_items = false;

    if (isset($locations[$menu_location])) {
      $menu_id = $locations[$menu_location];
      // Get all menu items for the menu ID
      $menu_items = wp_get_nav_menu_items($menu_id);

      if (!empty($menu_items)) {
        $has_menu_items = true;
      }
    }
    return  $has_menu_items;
  }
}
