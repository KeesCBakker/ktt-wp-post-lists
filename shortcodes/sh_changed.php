<?php
function ktt_post_lists_changes($atts)
{
    ob_start();

    $top = 5;
    if (!empty($atts['top'])) {
        $top = $atts['top'];
    }

    $filter_func = function ($where = '') {
        $where .= " AND (post_modified > DATE_ADD(post_date, INTERVAL 3 DAY))";
        return $where;
    };

    add_filter('posts_where', $filter_func);
    $recent_posts = new WP_Query(
        array(
            'posts_per_page' => $top,
            'orderby' => 'modified',
            'post_status' => 'publish',
        )
    );
    remove_filter('posts_where', $filter_func);

?>
    <ul class="latest posts posts-widget">
        <?php
        if ($recent_posts->have_posts()) :
            while ($recent_posts->have_posts()) : $recent_posts->the_post(); ?>
                <li>
                    <a href="<?php echo get_permalink() ?>">
                        <?php the_post_thumbnail('widget-tn'); ?>
                        <span class="title"><?php the_title() ?></span>
                    </a>
                </li>
        <?php endwhile;
        endif;
        wp_reset_postdata(); ?>
    </ul>
<?php

    $content = ob_get_contents();
    ob_end_clean();
    return $content;
}

add_shortcode('ktt_changed', 'ktt_post_lists_changes');
