import GlobalService from './globalService';
import $ from "jquery";

const MENU_ITEM = '.menu-item, .page_item';
const MENU_ITEM_WITH_CHILDREN = '.menu-item-has-children, .page_item_has_children';
const SUBMENU = '.sub-menu, .children';
const SUBMENU_LEFT_CLASS = 'has-submenu-left';
const HOVER_CLASS = 'hover';

export default class Navbar {

	constructor() {
		this.$menuItems = $( MENU_ITEM );
		this.$menuItemsWithChildren = this.$menuItems.filter( MENU_ITEM_WITH_CHILDREN ).removeClass( HOVER_CLASS );
		this.$menuItemsWithChildrenLinks = this.$menuItemsWithChildren.children( 'a' );

		this.initialize();
	}

	initialize() {
		this.onResize();
		this.addSocialMenuClass();
		this.initialized = true;
		GlobalService.registerOnResize( this.onResize.bind( this ) );
	}

	onResize() {
		const mq = window.matchMedia( "only screen and (min-width: 1000px)" );

		// we are on desktop
		if ( mq.matches ) {

			if ( this.initialized && ! this.desktop ) {
				this.unbindClick();
			}

			if ( ! this.initialized || ! this.desktop ) {
				this.bindHoverIntent();
			}

			this.desktop = true;
			return;
		}

		if ( this.initialized && this.desktop ) {
			this.unbindHoverIntent();
		}

		if ( ! this.initialized || this.desktop ) {
			this.bindClick();
		}

		this.desktop = false;
		return;
	}

	onClickMobile( event ) {
		const $link = $( this );
		const $siblings = $link.parent().siblings().not( $link );

		if ( $link.is( '.active' ) ) {
			return;
		}

		event.preventDefault();

		$link.addClass( 'active' ).parent().addClass( HOVER_CLASS );
		$siblings.removeClass( HOVER_CLASS );
		$siblings.find( '.active' ).removeClass( 'active' );
	}

	bindClick() {
		this.$menuItemsWithChildrenLinks.on( 'click', this.onClickMobile );
	}

	unbindClick() {
		this.$menuItemsWithChildrenLinks.off( 'click', this.onClickMobile );
	}

	bindHoverIntent() {
		this.$menuItems.hoverIntent( {
			out: function() {
				$( this ).removeClass( HOVER_CLASS );
			},
			over: function() {
				$( this ).addClass( HOVER_CLASS );
			},
			timeout: 200
		} );
	}

	unbindHoverIntent() {
		this.$menuItems.off( 'mousemove.hoverIntent mouseenter.hoverIntent mouseleave.hoverIntent' );
		delete this.$menuItems.hoverIntent_t;
		delete this.$menuItems.hoverIntent_s;
	}

	addSocialMenuClass() {
		const $menuItem = $( '.menu-item a' );
		const bodyStyle = window.getComputedStyle( document.documentElement );
		const enableSocialIconsProp = bodyStyle.getPropertyValue( '--enable-social-icons' );
		const enableSocialIcons = !! parseInt( enableSocialIconsProp, 10 );

		if ( enableSocialIcons ) {
			$menuItem.each( function( index, obj ) {
				const elementStyle = window.getComputedStyle( obj );
				const elementIsSocialProp = elementStyle.getPropertyValue( '--is-social' );
				const elementIsSocial = !! parseInt( elementIsSocialProp, 10 );

				if ( elementIsSocial ) {
					$( this ).parent().addClass( 'social-menu-item' )
				}
			} );
		}
	}
}
