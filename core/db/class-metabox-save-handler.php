<?php
/**
 *
 * Initial version created 28-06-2018 / 11:21 AM
 *
 * @author Varun Sridharan <varunsridharan23@gmail.com>
 * @version 1.0
 * @since 1.0
 * @package
 * @link
 * @copyright 2018 Varun Sridharan
 * @license GPLV3 Or Greater (https://www.gnu.org/licenses/gpl-3.0.txt)
 */

namespace WPOnion\DB;

if ( ! defined( 'ABSPATH' ) ) {
	die;
}

if ( ! class_exists( '\WPOnion\DB\Metabox_Save_Handler' ) ) {
	/**
	 * Class Save_Handler
	 *
	 * @package WPOnion\DB\Settings
	 * @author Varun Sridharan <varunsridharan23@gmail.com>
	 * @since 1.0
	 */
	class Metabox_Save_Handler extends \WPOnion\DB\Save_Handler {
		/**
		 * Runs custom loop to work with Settings fields array.
		 */
		public function run() {

			foreach ( $this->fields as $option ) {
				if ( $this->args['settings']->valid_option( $option ) ) {
					if ( $option->has_fields() ) {
						$this->field_loop( $option );
					} elseif ( $option->has_sections() ) {
						foreach ( $option->sections() as $section ) {
							if ( ! $this->args['settings']->valid_option( $section, false, false ) ) {
								continue;
							}
							if ( ! $section->has_fields() ) {
								continue;
							}

							$this->field_loop( $section );
						}
					}
				}
			}
		}
	}
}
