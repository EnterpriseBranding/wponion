import WPOnion_Field from '../class/field';

export default class extends WPOnion_Field {
	/**
	 * Inits Field.
	 */
	init() {
		let $this_elem = this.element.find( '> .row > .wponion-fieldset > .wponion-tab-wrap ' );
		$this_elem.find( '> ul.wponion-tab-menus li a' ).on( 'click', function( e ) {
			e.preventDefault();
			let $elem = jQuery( this );
			$elem.parent().parent().find( '.wponion-tab-current' ).removeClass( 'wponion-tab-current' );
			$elem.parent().addClass( 'wponion-tab-current' );
			$elem.find( '.wponion-tab-page' ).hide();
			$elem.find( '.wponion-tab-page' ).removeClass( 'wponion-tab-current' );
			let $tab = $elem.attr( 'data-tab-name' );
			$this_elem.find( '> .wponion-tab-pages > div' ).hide().removeClass( 'wponion-tab-current' );
			$elem.parent()
				 .parent()
				 .parent()
				 .find( '> .wponion-tab-pages > div#wponion-tab-' + $tab )
				 .addClass( 'wponion-tab-current' )
				 .show();
		} );

		if( $this_elem.find( '> ul.wponion-tab-menus li.current' ).length > 0 ) {
			$this_elem.find( '> ul.wponion-tab-menus li.current a' ).trigger( 'click' );
		} else {
			$this_elem.find( '> ul.wponion-tab-menus li:first-child a' ).trigger( 'click' );
		}
	}
}