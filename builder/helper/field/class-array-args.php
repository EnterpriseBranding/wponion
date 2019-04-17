<?php
/**
 *
 * @author Varun Sridharan <varunsridharan23@gmail.com>
 * @version 1.0
 * @since 1.0
 * @link
 * @copyright 2019 Varun Sridharan
 * @license GPLV3 Or Greater (https://www.gnu.org/licenses/gpl-3.0.txt)
 */

namespace WPO\Helper\Field;

if ( ! class_exists( '\WPO\Helper\Field\Array_Args' ) ) {
	/**
	 * Class Array_Args
	 *
	 * @package WPO\Helper\Field
	 * @author Varun Sridharan <varunsridharan23@gmail.com>
	 * @since 1.0
	 *
	 * @method mixed sanitize
	 * @method mixed validate
	 * @method mixed attributes
	 * @method mixed dependency
	 * @method mixed wrap_attributes
	 */
	class Array_Args extends Helper {
		/**
		 * @param bool $key
		 * @param null $data
		 * @param bool $merge
		 *
		 * @return $this
		 */
		protected function _set_array_handler( $key = false, $data = null, $merge = true ) {
			if ( true === $merge ) {
				if ( wponion_is_array( $this[ $key ] ) ) {
					$this[ $key ] = $this->parse_args( $data, $this[ $key ] );
				} else {
					$this[ $key ] = $data;
				}
			} else {
				$this[ $key ] = $data;
			}
			return $this;
		}

		/**
		 * Field Sanitize Functions.
		 * It can be either a single function or multiple.
		 * if you want to override all and have only 1 function then add like below
		 * $field->sanitize('yourcallbac',false);
		 *
		 * @param null $sanitize
		 * @param bool $merge
		 *
		 * @return $this
		 */
		public function set_sanitize( $sanitize = null, $merge = true ) {
			$this->_set_array_handler( 'sanitize', $sanitize, $merge );
			return $this;
		}

		/**
		 * Field Validate Functions.
		 * It can be either a single function or multiple.
		 * if you want to override all and have only 1 function then add like below
		 * $field->validate('yourcallbac',false);
		 *
		 * @param null $validate
		 * @param bool $merge
		 *
		 * @return $this
		 */
		public function set_validate( $validate = null, $merge = true ) {
			$this->_set_array_handler( 'validate', $validate, $merge );
			return $this;
		}

		/**
		 * Adds Field Attributes.
		 *
		 * @param null $attributes
		 * @param bool $merge
		 *
		 * @return $this
		 */
		public function set_attributes( $attributes = null, $merge = true ) {
			$this->_set_array_handler( 'attributes', $attributes, $merge );
			return $this;
		}

		/**
		 * Adds A Single Attribute To Field.
		 *
		 * @param null $key
		 * @param null $value
		 *
		 * @return $this
		 */
		public function attribute( $key = null, $value = null ) {
			return $this->set_attributes( array( $key => $value ) );
		}

		/**
		 * Field Wrap Attribute.
		 *
		 * @param null $attributes
		 * @param bool $merge
		 *
		 * @return $this
		 */
		public function set_wrap_attributes( $attributes = null, $merge = true ) {
			$this->_set_array_handler( 'wrap_attributes', $attributes, $merge );
			return $this;
		}

		/**
		 * Adds A Single Attribute To Field.
		 *
		 * @param null $key
		 * @param null $value
		 *
		 * @return $this
		 */
		public function wrap_attribute( $key = null, $value = null ) {
			return $this->set_attributes( array( $key => $value ) );
		}

		/**
		 * Set Field Dependency
		 *
		 * @param null $dependency
		 *
		 * @return $this
		 */
		public function set_dependency( $dependency = null ) {
			$this['dependency'] = $dependency;
			return $this;
		}

		/**
		 * @param array $options
		 * @param bool  $merge
		 *
		 * @return $this
		 */
		public function set_options( $options = array(), $merge = true ) {
			$this->_set_array_handler( 'options', $options, $merge );
			return $this;
		}

		/**
		 * @param string $key
		 * @param mixed  $value
		 *
		 * @return $this
		 */
		public function set_option( $key = null, $value = null ) {
			if ( null === $key && null === $value ) {
				return $this;
			}
			$value = ( null === $value && null !== $key ) ? $key : $value;
			return $this->set_options( array( $key => $value ) );
		}

		/**
		 * @param string $key
		 * @param mixed  $value
		 *
		 * @return $this
		 */
		public function option( $key = null, $value = null ) {
			return $this->set_option( $key, $value );
		}
	}
}