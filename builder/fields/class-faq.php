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

namespace WPO\Fields;

if ( ! class_exists( 'WPO\Fields\Faq' ) ) {
	/**
	 * Class Faq
	 *
	 * @package WPO\Fields
	 * @author Varun Sridharan <varunsridharan23@gmail.com>
	 * @since 1.0
	 */
	class Faq extends \WPO\Field {
		/**
		 * Faq constructor.
		 *
		 * @param bool  $title
		 * @param array $args
		 */
		public function __construct( $title = false, $args = array() ) {
			parent::__construct( 'faq', false, $title, $args );
		}

		/**
		 * @param $heading
		 * @param $content
		 *
		 * @return \WPO\Fields\Faq
		 */
		public function faq( $heading, $content ) {
			return $this->option( microtime( true ), array(
				'heading' => $heading,
				'content' => $content,
			) );
		}

		/**
		 * @param $faqs
		 *
		 * @return \WPO\Fields\Faq
		 */
		public function faqs( $faqs ) {
			return $this->options( $faqs );
		}
	}
}
