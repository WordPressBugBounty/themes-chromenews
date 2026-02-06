<?php
function athfb_render_builder_structure($structure, $context = 'header')
{

  $current_device = athfb_get_current_device();
  $builder_key = $context . '_' . $current_device . '_items';

  if (!isset($structure[$builder_key])) {
    return;
  }


  $chromenews_class = '';
  $chromenews_background = '';
  if (has_header_image()) {
    $chromenews_class = 'af-header-image  data-bg';
    $chromenews_background = get_header_image();
  }

  $device_structure = $structure[$builder_key];



  foreach ($device_structure as $row_id => $row_data) {
    if (empty($row_data) || ! athfb_has_elements_in_row($row_data)) {
      continue;
    }


    switch ($row_id) {
      case 'top': ?>

        <div class="top-header">
          <div class="container-wrapper">
            <div class="top-bar-flex">

              <?php
              if (isset($row_data['top_left'])) {
                echo '<div class="top-bar-left col-2">';
                foreach ($row_data['top_left'] as $element_type) {
                  $element = array(
                    'type' => $element_type,
                    'id' => $element_type . '_1'
                  );
                  athfb_render_element($element, $context);
                }
                echo '</div>';
              } ?>
              <?php
              if (isset($row_data['top_center'])) {
                echo '<div class="top-bar-center col-2">';
                foreach ($row_data['top_center'] as $element_type) {
                  $element = array(
                    'type' => $element_type,
                    'id' => $element_type . '_1'
                  );
                  athfb_render_element($element, $context);
                }
                echo '</div>';
              } ?>
              <?php
              if (isset($row_data['top_right'])) {
                echo '<div class="top-bar-right col-2">';
                foreach ($row_data['top_right'] as $element_type) {
                  $element = array(
                    'type' => $element_type,
                    'id' => $element_type . '_1'
                  );
                  athfb_render_element($element, $context);
                }
                echo '</div>';
              } ?>
            </div>

          </div>
        </div>

      <?php
        break;

      case 'main':
      ?>

        <div class="mid-header-wrapper <?php echo esc_attr($chromenews_class); ?>" data-background="<?php echo esc_attr($chromenews_background); ?>">
          <div class="mid-header">
            <div class="container-wrapper">
              <div class="mid-bar-flex">
                <?php if (isset($row_data['main_left'])) {
                  echo '<div class="main-bar-left ">';
                  foreach ($row_data['main_left'] as $element_type) {
                    $element = array(
                      'type' => $element_type,
                      'id' => $element_type . '_1'
                    );
                    athfb_render_element($element, $context);
                  }
                  echo '</div>';
                } ?>

                <?php if (isset($row_data['main_center'])) {
                  echo '<div class="main-bar-center">';
                  foreach ($row_data['main_center'] as $element_type) {
                    $element = array(
                      'type' => $element_type,
                      'id' => $element_type . '_1'
                    );
                    athfb_render_element($element, $context);
                  }
                  echo '</div>';
                } ?>

                <?php if (isset($row_data['main_right'])) {
                  echo '<div class="main-bar-right">';
                  foreach ($row_data['main_right'] as $element_type) {
                    $element = array(
                      'type' => $element_type,
                      'id' => $element_type . '_1'
                    );
                    athfb_render_element($element, $context);
                  }
                  echo '</div>';
                } ?>

              </div>
            </div>
          </div>
        </div>

      <?php
        break;
      case 'bottom':

      ?>
        <div id="main-navigation-bar" class="bottom-header">
          <div class="container-wrapper">
            <div class="bottom-nav">
              <div class="bottom-bar-flex">
                <?php if (isset($row_data['bottom_left'])) {
                  echo '<div class="bottom-bar-left">';
                  foreach ($row_data['bottom_left'] as $element_type) {
                    $element = array(
                      'type' => $element_type,
                      'id' => $element_type . '_1'
                    );
                    athfb_render_element($element, $context);
                  }
                  echo '</div>';
                } ?>

                <?php if (isset($row_data['bottom_center'])) {
                  echo '<div class="bottom-bar-center ">';
                  foreach ($row_data['bottom_center'] as $element_type) {
                    $element = array(
                      'type' => $element_type,
                      'id' => $element_type . '_1'
                    );
                    athfb_render_element($element, $context);
                  }
                  echo '</div>';
                } ?>

                <?php if (isset($row_data['bottom_right'])) {
                  echo '<div class="bottom-bar-right search-watch ">';
                  foreach ($row_data['bottom_right'] as $element_type) {
                    $element = array(
                      'type' => $element_type,
                      'id' => $element_type . '_1'
                    );
                    athfb_render_element($element, $context);
                  }
                  echo '</div>';
                } ?>
              </div>
            </div>
          </div>
        </div>

<?php

        break;
    }
  }
}
