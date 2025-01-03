<?php
if (!function_exists('chromenews_loop_grid')) :
  /**
   * Banner Slider
   *
   * @since Newsical 1.0.0
   *
   */
  function chromenews_loop_grid($chromenews_post_id, $chromenews_grid_design = 'grid-design-default', $chromenews_thumbnail_size = 'medium_large', $chromenews_show_excerpt = false, $archive_content_view = 'archive-content-excerpt', $chromenews_title_position = 'bottom', $chromenews_count = 0)
  {
    $chromenews_post_display = 'spotlight-post';
    if ($chromenews_thumbnail_size == 'medium_large') {
      $chromenews_post_display = 'grid-post';
    }
    $chromenews_post_thumbnail = chromenews_the_post_thumbnail($chromenews_thumbnail_size, $chromenews_post_id, true);
    $chromenews_no_thumbnail_class = "has-post-image";
    if (!isset($chromenews_post_thumbnail) && empty($chromenews_post_thumbnail)) {
      $chromenews_no_thumbnail_class = "no-post-image";
    }
?>

    <div class="pos-rel read-single color-pad clearfix af-cat-widget-carousel <?php echo esc_attr($chromenews_grid_design); ?> <?php echo esc_attr($chromenews_no_thumbnail_class); ?>">
      <?php if ($chromenews_title_position == 'top'): ?>
        <div class="read-title">
          <h3>
            <a href="<?php the_permalink(); ?>" aria-label="<?php echo esc_attr(get_the_title($chromenews_post_id)); ?>"><?php the_title(); ?></a>
          </h3>
        </div>
        <div class=" post-item-metadata entry-meta">
              <?php chromenews_post_item_meta($chromenews_post_display); ?>
              <?php chromenews_get_comments_views_share($chromenews_post_id); ?>
        </div>
      <?php endif; ?>
      <div class="read-img pos-rel read-bg-img">
        <a class="aft-post-image-link"
          href="<?php the_permalink(); ?>" aria-label="<?php echo esc_attr(get_the_title($chromenews_post_id)) ?>"></a>
        <?php
        if ($chromenews_post_thumbnail) {

          echo wp_kses_post($chromenews_post_thumbnail);
        }
        ?>

        <?php if (absint($chromenews_count) > 0): ?>
          <span class="trending-no"><?php echo esc_html($chromenews_count); ?></span>
        <?php endif; ?>
        <div class="post-format-and-min-read-wrap">
          <?php chromenews_post_format($chromenews_post_id); ?>
          <?php chromenews_count_content_words($chromenews_post_id); ?>
        </div>

        <?php if ($chromenews_grid_design == 'grid-design-default'): ?>
          <div class="category-min-read-wrap">
            <div class="read-categories">
              <?php chromenews_post_categories(); ?>
            </div>
          </div>
        <?php endif; ?>

      </div>
      <div class="pad read-details color-tp-pad">

        <?php if ($chromenews_grid_design == 'grid-design-texts-over-image'): ?>
          <div class="read-categories">
            <?php chromenews_post_categories(); ?>
          </div>
        <?php endif; ?>

        <?php if ($chromenews_title_position == 'bottom'): ?>
          <div class="read-title">
            <h3>
              <a href="<?php the_permalink(); ?>" aria-label="<?php echo esc_attr(get_the_title($chromenews_post_id)); ?>"><?php the_title(); ?></a>
            </h3>
          </div>
          <?php //if ($chromenews_small_grid == false): 


          ?>
          <div class=" post-item-metadata entry-meta">
                <?php chromenews_post_item_meta($chromenews_post_display); ?>
                <?php chromenews_get_comments_views_share($chromenews_post_id); ?>
          </div>
        <?php endif; ?>
        <?php //endif; 
        ?>

        <?php if ($chromenews_show_excerpt == true): ?>
          <div class="post-description">
            <?php
            if ($archive_content_view == 'archive-content-full') {
              the_content();
            } else {
              $chromenews_excerpt = chromenews_get_the_excerpt($chromenews_post_id);
              if ($chromenews_excerpt) {
                echo wp_kses_post($chromenews_excerpt);
              }
            }
            ?>
          </div>
        <?php endif; ?>
      </div>
    </div>

<?php
  }
endif;
add_action('chromenews_action_loop_grid', 'chromenews_loop_grid', 10, 7);
