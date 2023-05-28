<?php

function  ktt_post_lists_highlights($atts)
{
    ob_start();

    if (!isset($atts['ids'])) return "";
    $ids = explode(',', $atts['ids']);
?>
    <ul class="highlights posts-widget">
        <?php
        $recent_posts = wp_get_recent_posts(array('include' => $ids));
        foreach ($recent_posts as $post) : ?>
            <li>
                <a href="<?php echo get_permalink($post['ID']) ?>">
                    <?php echo get_the_post_thumbnail($post['ID'], 'widget-tn'); ?>
                    <span class="title"><?php echo $post['post_title'] ?></span>
                </a>
            </li>
        <?php endforeach;
        wp_reset_query(); ?>
    </ul>
<?php

    $content = ob_get_contents();
    ob_end_clean();
    return $content;
}

add_shortcode('ktt_highlights', 'ktt_post_lists_highlights');
