class WPOnion_Fresh_Theme {
	constructor( $elem ) {
		this.element = $elem;

		if( this.element.hasClass( 'wponion-submenu-single-page' ) ) {
			this.init_submenu();
		}

		if( this.element.hasClass( 'wponion-single-page' ) ) {
			this.init_submenu();
			this.init_main_menu();
		}
	}

	init_main_menu() {
		this.element.find( 'ul.wpo-ftnav > li > a' ).on( 'click', ( e ) => {
			e.preventDefault();

			let $elem = jQuery( e.currentTarget ),
				$href = $wponion_helper.url_params( $elem.attr( 'href' ) );

			if( $elem.hasClass( 'dropdown' ) ) {
				$elem.parent().find( '> ul' ).slideToggle();
			} else {
				if( false === $wponion_helper.is_undefined( $href[ 'parent-id' ] ) ) {
					let $parent      = 'wponion-tab-' + $href[ 'parent-id' ];
					let $all_actives = this.element.find( 'div.wponion-parent-wraps' );
					let $current     = this.element.find( 'div#' + $parent );
					$all_actives.hide();
					$current.show();
					$elem.parent().parent().find( 'a.active:not(ul.meta-submenu li a)' ).removeClass( 'active' );
					$elem.addClass( 'active' );
				} else {
					window.location.href = $elem.attr( 'href' );
				}
			}
		} );
	}

	init_submenu() {
		this.element.find( '.wpo-ftnav .meta-submenu a' ).on( 'click', ( e ) => {
			e.preventDefault();
			let $elem = jQuery( e.currentTarget );
			let $href = $wponion_helper.url_params( $elem.attr( 'href' ) );

			if( false === $wponion_helper.is_undefined( $href[ 'section-id' ] ) && false === $wponion_helper.is_undefined( $href[ 'parent-id' ] ) ) {
				let $parent      = 'wponion-tab-' + $href[ 'parent-id' ],
					$section     = $parent + '-' + $href[ 'section-id' ],
					$all_actives = this.element.find( 'div#' + $parent + ' div.wponion-section-wraps' ),
					$current     = this.element.find( 'div#' + $parent + ' div#' + $section );
				$all_actives.hide();

				jQuery( 'div.wponion-parent-wraps' ).hide();
				jQuery( 'div#' + $parent ).show();

				$current.show();
				this.element.find( '.wpo-ftnav  a' ).removeClass( 'active' );
				$elem.parent().parent().parent().find( '> a' ).addClass( 'active' );
				$elem.addClass( 'active' );
			} else {
				window.location.href = $elem.attr( 'href' );
			}

		} );
	}
}

( ( window, document, wp ) => {
	wp.hooks.addAction( 'wponion_theme_init', function( $elem ) {
		if( $elem.hasClass( 'wponion-fresh-theme' ) ) {
			new WPOnion_Fresh_Theme( $elem );
		}
	} );
} )( window, document, wp );
