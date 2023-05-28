<?php

/**
 * KeesTalksTech Post Lists
 *
 * @package       KTTPL
 * @author        Kees . Bakker
 * @license       gplv2
 * @version       0.5
 *
 * @wordpress-plugin
 * Plugin Name:   KeesTalksTech Post Lists
 * Plugin URI:    https://github.com/KeesCBakker/ktt-wp-post-lists
 * Description:   A plugin to show a list of posts in WordPress.
 * Version:       0.5
 * Author:        Kees C. Bakker
 * Author URI:    https://keestalkstech.com/
 * Text Domain:   ktt-wp-post-lists
 * Domain Path:   /languages
 * License:       GPLv2
 * License URI:   https://www.gnu.org/licenses/gpl-2.0.html
 *
 * You should have received a copy of the GNU General Public License
 * along with KeesTalksTech Post Lists. If not, see <https://www.gnu.org/licenses/gpl-2.0.html/>.
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) exit;

/**
 * HELPER COMMENT START
 * 
 * This file contains the main information about the plugin.
 * It is used to register all components necessary to run the plugin.
 * 
 * The comment above contains all information about the plugin 
 * that are used by WordPress to differenciate the plugin and register it properly.
 * It also contains further PHPDocs parameter for a better documentation
 * 
 * The function KTTPL() is the main function that you will be able to 
 * use throughout your plugin to extend the logic. Further information
 * about that is available within the sub classes.
 * 
 * HELPER COMMENT END
 */

/* REGISTER THE UPDATER */
if (!class_exists('KttPostListsUpdater')) {
	include_once(plugin_dir_path(__FILE__) . 'updater.php');
}

$updater = new KttPostListsUpdater(__FILE__);
$updater->set_username('KeesCBakker');
$updater->set_repository('ktt-wp-post-lists');
$updater->initialize();

/* REGISTER THUMBNAILS */
add_image_size('widget-tn',     140, 140, true);
add_image_size('widget-tn-sm',   70,  70, true);

/* REGISTER THE SHORT CODES */
require plugin_dir_path(__FILE__) . 'shortcodes/sh_changed.php';
require plugin_dir_path(__FILE__) . 'shortcodes/sh_highlights.php';
require plugin_dir_path(__FILE__) . 'shortcodes/sh_latest.php';
