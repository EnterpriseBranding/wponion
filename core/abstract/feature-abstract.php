<?php
/**
 *
 * Initial version created 07-05-2018 / 10:11 AM
 *
 * @author Varun Sridharan <varunsridharan23@gmail.com>
 * @version 1.0
 * @since 1.0
 * @package wponion
 * @link http://github.com/wponion
 * @copyright 2018 Varun Sridharan
 * @license GPLV3 Or Greater (https://www.gnu.org/licenses/gpl-3.0.txt)
 */

if ( ! defined( 'ABSPATH' ) ) {
	die;
}

if ( ! class_exists( 'WPOnion_Feature_Abstract' ) ) {
	abstract class WPOnion_Feature_Abstract extends WPOnion_Abstract {
		/**
		 * Stores Fields MD5.
		 *
		 * @var bool
		 */
		protected $fields_md5 = false;

		/**
		 * Store All Settings Menu.
		 *
		 * @var array
		 */
		protected $menus = array();
		/**
		 * Fields
		 *
		 * @var array
		 */
		protected $fields = array();

		/**
		 * Raw options
		 *
		 * @var array
		 */
		protected $raw_options = array();

		/**
		 * unique for database.
		 *
		 * @var string
		 */
		protected $unique = '';

		/**
		 * WPOnion_Settings constructor.
		 *
		 * @param array $fields Array of settings fields.
		 * @param array $settings array of WPOnion Settings Configuration.
		 */
		public function __construct( $fields = array(), $settings = array() ) {
			$this->fields   = $fields;
			$this->settings = $this->set_args( $settings );
		}

		/**
		 * Generated A Unique ID For each Options Array And stores it.
		 *
		 * @param array $fields
		 *
		 * @return bool|string
		 */
		protected function fields_md5( $fields = array() ) {
			if ( false === $this->fields_md5 ) {
				$fields           = empty( $fields ) ? $this->fields : $fields;
				$this->fields_md5 = md5( wp_json_encode( $fields ) );
			}
			return $this->fields_md5;
		}
	}
}
