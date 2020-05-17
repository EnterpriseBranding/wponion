<?php

namespace WPOnion\Field;

use WPOnion\Field;

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( '\WPOnion\Field\Divider' ) ) {
	/**
	 * Class Divider
	 *
	 * @package WPOnion\Field
	 * @author Varun Sridharan <varunsridharan23@gmail.com>
	 */
	class Divider extends Field {
		/**
		 * Generates Final HTML Output.
		 */
		protected function output() {
			echo "<hr class=\"hr-text\" data-content=\"{$this->option( 'text', '' )}\"/>";
		}

		/**
		 * Handles Fields Assets.
		 */
		public function assets() {
		}

		/**
		 * Returns Field's Default Value.
		 *
		 * @return array
		 */
		protected function defaults() {
			return array( 'text' => false );
		}
	}
}
