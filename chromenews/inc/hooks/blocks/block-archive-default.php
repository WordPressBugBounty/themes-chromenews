<?php
    /**
     * Full block part for displaying page content in page.php
     *
     * @package ChromeNews
     */
    
    global $post;
    $chromenews_img_url = chromenews_get_freatured_image_url($post->ID, 'medium_large');
    $chromenews_img_thumb_id = get_post_thumbnail_id($post->ID);
    $chromenews_show_excerpt = chromenews_get_option('archive_content_view');
?>
<div class="read-single color-pad">
    <div class="read-item">
        <div class="data-bg read-img pos-rel read-bg-img"
             data-background="<?php echo esc_url($chromenews_img_url); ?>">
            <img src="<?php echo esc_url($chromenews_img_url); ?>"
                 alt="<?php echo esc_attr(chromenews_get_img_alt($chromenews_img_thumb_id)); ?>">
            <a class="aft-post-image-link" aria-label="<?php echo esc_attr(get_the_title($post->ID)) ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            <?php chromenews_archive_social_share_icons($post->ID); ?>
            <?php chromenews_post_format($post->ID); ?>
            <?php chromenews_count_content_words($post->ID); ?>

        </div>

        <div class="read-details pad-archive">
            
            <?php if ('post' === get_post_type()) : ?>
                <div class="read-categories">
                    <?php chromenews_post_categories(); ?>
                </div>
            <?php endif; ?>
            <div class="read-title">
                <?php the_title('<h4 class="entry-title">
                    <a href="' . esc_url(get_permalink()) . '" aria-label="'.esc_attr(get_the_title($post->ID)).'" rel="bookmark">', '</a>
                </h4>'); ?>
            </div>
            
            <?php if ('post' === get_post_type()) : ?>
                <div class="post-item-metadata entry-meta">
                    <?php chromenews_post_item_meta(); ?>
                    <?php chromenews_get_comments_views_share($post->ID); ?>
                </div>
            <?php endif; ?>
        </div>

    </div>
    <?php if ($chromenews_show_excerpt != 'archive-content-none'): ?>
        <div class="read-descprition full-item-discription">
            <div class="post-description">
                <?php
                    if ($chromenews_show_excerpt == 'archive-content-excerpt') {
                        $chromenews_excerpt = chromenews_get_the_excerpt($post->ID);
                        if($chromenews_excerpt){
                            echo wp_kses_post($chromenews_excerpt);
                        }
                        
                    } else {
                        the_content();
                    }
                ?>
            </div>
        </div>
    <?php endif; ?>

</div>