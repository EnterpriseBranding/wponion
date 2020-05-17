<?php

namespace WPOnion\Field;


defined( 'ABSPATH' ) || exit;

if ( ! class_exists( '\WPOnion\Field\Range_Slider' ) ) {
	/**
	 * Class Range_Slider
	 *
	 * @package WPOnion\Field
	 * @author Varun Sridharan <varunsridharan23@gmail.com>
	 */
	class Range_Slider extends Spinner {

		/**
		 * Returns Field's Default Value.
		 *
		 * @return array
		 */
		protected function defaults() {
			return $this->parse_args( array(
				'slider_width' => '90%',
			), parent::defaults() );
		}

		/**
		 * @return array
		 */
		protected function js_args() {
			return $this->parse_args( array(
				'slider' => ( ! is_array( $this->data( 'slider' ) ) ) ? array() : $this->data( 'slider' ),
			), parent::defaults() );
		}

		/**
		 * @return bool|mixed|string
		 */
		protected function before() {
			return parent::before() . '<div class="wponion-range-slider-container"><div class="wponion-range-slider" style="width:' . $this->data( 'slider_width' ) . '"></div>';
		}

		/**
		 * @return string
		 */
		protected function after() {
			return '</div>' . parent::after();
		}

		/**
		 * Handles Fields Assets.
		 */
		public function assets() {
			wp_enqueue_script( 'jquery-ui-slider' );
		}
	}
}
