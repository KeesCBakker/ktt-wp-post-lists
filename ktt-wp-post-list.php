<?php
/*
    Plugin Name: KTT WP Post Lists
    Plugin URI: https://github.com/KeesCBakker/ktt-wp-post-lists
    Description: This plugin adds shortcodes to displays posts.
    Version: 0.2
    Author: Kees C. Bakker
    Author URI: https://keestalkstech.com/
    License: GPL2
*/

/* REGISTER THE UPDATER */
if (!class_exists('KttPostListsUpdater')) {
    include_once(plugin_dir_path(__FILE__) . 'updater.php');
}

$updater = new KttPostListsUpdater(__FILE__);
$updater->set_username('keescbakker');
$updater->set_repository('ktt-wp-post-lists');
$updater->initialize();


/* REGISTER THE SHORT CODES */
require plugin_dir_path(__FILE__) . 'shortcodes/ktt_post_lists_latest.php';
