<?php
/**
 *
 *
 * @author Varun Sridharan <varunsridharan23@gmail.com>
 * Initial version created 05-05-2018 / 03:38 PM
 * @version 1.0
 * @since 1.0
 * @package bullet-wp
 * @link http://github.com/bullet-wp
 * @copyright 2018 Varun Sridharan
 * @license GPLV3 Or Greater (https://www.gnu.org/licenses/gpl-3.0.txt)
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
defined( 'WPONION_VERSION' ) or define( 'WPONION_VERSION', '0.0.1' );
defined( 'WPONION_NAME' ) or define( 'WPONION_NAME', __( 'WPOnion' ) );
defined( 'WPONION_FILE' ) or define( 'WPONION_FILE', __FILE__ );
defined( 'WPONION_PATH' ) or define( 'WPONION_PATH', plugin_dir_path( __FILE__ ) );
defined( 'WPONION_URL' ) or define( 'WPONION_URL', plugin_dir_url( __FILE__ ) );


if ( ! function_exists( 'wponion_init' ) ) {
	function wponion_init() {
		/**
		 * Include All Functions Files.
		 */
		require_once WPONION_PATH . 'core/helpers/base.php';
		require_once WPONION_PATH . 'core/class-autoloader.php';
		do_action( 'wponion_loaded' );
	}

	add_action( 'init', 'wponion_init' );
}


if ( file_exists( WPONION_PATH . '/i18n/' . get_locale() . '.mo' ) ) {
	load_textdomain( 'wponion', WPONION_PATH . '/i18n/' . get_locale() . '.mo' );
}
