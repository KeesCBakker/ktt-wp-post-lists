<?php

function ktt_sh_latest($atts)
{
    ob_start();

    $top = 5;
    if (!empty($atts['top'])) {
        $top = $atts['top'];
    }

?><ul class="latest posts posts-widget">
        <?php
        $recent_posts = wp_get_recent_posts(array(
            'numberposts' => $top, // Number of recent posts thumbnails to display
            'post_status' => 'publish' // Show only the published posts
        ));
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

add_shortcode('latest', 'ktt_post_lists_latest');
