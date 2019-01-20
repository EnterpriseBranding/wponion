<?php
/**
 *
 * Initial version created 28-05-2018 / 10:57 AM
 *
 * @author Varun Sridharan <varunsridharan23@gmail.com>
 * @version 1.0
 * @since 1.0
 * @package
 * @link
 * @copyright 2018 Varun Sridharan
 * @license GPLV3 Or Greater (https://www.gnu.org/licenses/gpl-3.0.txt)
 */

namespace WPOnion\Field;

if ( ! defined( 'ABSPATH' ) ) {
	die;
}

if ( ! class_exists( '\WPOnion\Field\Spacing' ) ) {
	/**
	 * Class Color_Picker
	 *
	 * @package WPOnion\Field
	 * @author Varun Sridharan <varunsridharan23@gmail.com>
	 * @since 1.0
	 */
	class Spacing extends Input_Group {

		protected function field_wrap_class() {
			return 'wponion-element-input_group';
		}

		/**
		 * Final HTML Output
		 */
		protected function output() {
			$fields = array();
			$icons  = $this->default_icons();
			$titles = $this->default_title();

			if ( false === $this->data( 'all' ) ) {
				foreach ( $this->field_slugs() as $slug ) {
					if ( false !== $this->data( $slug ) ) {
						$defaults = array(
							'prefix'      => $icons[ $slug ],
							'placeholder' => $titles[ $slug ],
						);

						$fields[ $slug ] = ( true === $this->data( $slug ) ) ? $defaults : $this->handle_args( 'placeholder', $this->data( $slug ), $defaults );
					}
				}
			} else {
				$defaults      = array(
					'prefix'      => $icons['all'],
					'placeholder' => __( 'All' ),
				);
				$fields['all'] = ( true === $this->data( 'all' ) ) ? $defaults : $this->handle_args( 'placeholder', $this->data( 'all' ), $defaults );
			}

			if ( false !== $this->data( 'unit' ) ) {
				if ( true === $this->data( 'unit' ) ) {
					$fields['unit'] = array(
						'type'    => 'select',
						'options' => $this->data( 'unit_options' ),
					);
				} else {
					$fields['unit'] = $this->parse_args( $this->data( 'unit' ), array(
						'options' => $this->data( 'unit_options' ),
						'type'    => 'select',
					) );
				}
			}

			$this->field['fields'] = $fields;
			echo parent::output();
		}

		public function field_assets() {
			// TODO: Implement field_assets() method.
		}

		/**
		 * Returns Proper Field Slugs.
		 *
		 * @return array
		 */
		protected function field_slugs() {
			return array( 'top', 'bottom', 'left', 'right' );
		}

		/**
		 * Returns Default Title.
		 *
		 * @return array
		 */
		protected function default_title() {
			return array(
				'top'    => __( 'Top' ),
				'bottom' => __( 'Bottom' ),
				'left'   => __( 'Left' ),
				'right'  => __( 'Right' ),
				'unit'   => __( 'Unit' ),
			);
		}

		/**
		 * Returns Default Icons.
		 *
		 * @return array
		 */
		protected function default_icons() {
			return array(
				'top'    => '<i class="dashicons dashicons-arrow-up-alt"></i>',
				'bottom' => '<i class="dashicons dashicons-arrow-down-alt"></i>',
				'left'   => '<i class="dashicons dashicons-arrow-left-alt"></i>',
				'right'  => '<i class="dashicons dashicons-arrow-right-alt"></i>',
				'all'    => '<i class="dashicons dashicons-move"></i>',
			);
		}

		/**
		 * Returns all fields default.
		 *
		 * @return array|mixed
		 */
		protected function field_default() {
			return array(
				'top'          => true,
				'bottom'       => true,
				'left'         => true,
				'right'        => true,
				'unit'         => true,
				'unit_options' => array(
					'px' => 'px',
					'%'  => '%',
					'em' => 'em',
				),
				'all'          => false,
				'icons'        => $this->default_icons(),
			);
		}
	}
}