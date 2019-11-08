import GlobalService from "./globalService";
import $ from 'jquery';

const defaults = {
	offsetTargetElement: null,
};

class Header {

	constructor( element, args ) {
		if ( ! element ) return;

		this.element = element;
		this.options = Object.assign( {}, defaults, args );

		this.$header = $( this.element );
		this.$toggle = $( '.c-menu-toggle' );
		this.$toggleWrap = $( '.c-menu-toggle__wrap' );

		this.scrolled = false;
		this.inversed = false;
		this.wasSticky = $( 'body' ).is( '.has-site-header-fixed' );

		this.offset = 0;
		this.scrollOffset = 0;
		this.mobileHeaderHeight = 0;

		this.createMobileHeader();

		this.onResize();
		this.render( false );
		GlobalService.registerOnResize( this.onResize.bind( this ) );

		this.initialize();
	}

	initialize() {

		$( '.site-header__wrapper' ).css( 'transition', 'none' );

		this.$header.addClass( 'site-header--fixed site-header--ready' );
		this.$mobileHeader.addClass( 'site-header--fixed site-header--ready' );
	}

	update() {
		this.updatePageOffset();
		this.updateHeaderOffset();
		this.updateMobileHeaderOffset();
	}

	onHeightUpdate( tween ) {
		this.getProps();
		this.box = Object.assign( this.box, { height: tween.target.height } );
		this.setVisibleHeaderHeight();
		this.update();
	}

	getMobileHeaderHeight() {
		const mobileHeaderHeight = this.$mobileHeader.css( 'height', '' ).outerHeight();
		const toggleHeight = this.$toggleWrap.css( 'height', '' ).outerHeight();

		return Math.max( mobileHeaderHeight, toggleHeight );
	}

	isMobileHeaderVisibile() {
		return this.$mobileHeader.is( ':visible' );
	}

	setVisibleHeaderHeight() {
		this.visibleHeaderHeight = this.isMobileHeaderVisibile() ? this.mobileHeaderHeight : this.box.height;
	}

	getProps() {
		this.box = this.element.getBoundingClientRect();
		this.scrollOffset = this.getScrollOffset();
		this.mobileHeaderHeight = this.getMobileHeaderHeight();
	}

	onResize() {
		const $header = $( this.element );
		const wasScrolled = $header.hasClass( 'site-header--scrolled' );

		$header.css( 'transition', 'none' );
		$header.removeClass( 'site-header--scrolled' );

		this.shouldMakeHeaderStatic();
		this.getProps();
		this.setVisibleHeaderHeight();

		$header.toggleClass( 'site-header--scrolled', wasScrolled );

		if ( window.requestIdleCallback ) {
			requestIdleCallback( () => {
				$header.css( 'transition', '' );
			} );
		} else {
			setTimeout( () => {
				$header.css( 'transition', '' );
			}, 0 );
		}

		this.update();
	}

	shouldMakeHeaderStatic() {
		const $body = $( 'body' );
		const { windowHeight } = GlobalService.getProps();

		if ( this.wasSticky ) {
			$body.toggleClass( 'has-site-header-fixed', this.visibleHeaderHeight < windowHeight * 0.2 );
		}
	}

	updateHeaderOffset() {
		if ( ! this.element ) return;

		this.element.style.marginTop = this.offset + 'px';
	}

	updateMobileHeaderOffset() {
		if ( ! this.$mobileHeader ) return;

		this.$mobileHeader.css( {
			height: this.mobileHeaderHeight,
			marginTop: this.offset + 'px',
		} );

		$( '.site-header__inner-container' ).css( {
			marginTop: this.mobileHeaderHeight
		} );

		this.$toggleWrap.css( {
			height: this.mobileHeaderHeight,
			marginTop: this.offset + 'px',
		} );
	}

	getScrollOffset() {
		const { adminBarHeight, scrollY } = GlobalService.getProps();
		const { offsetTargetElement } = this.options;

		if ( offsetTargetElement ) {
			const offsetTargetBox = offsetTargetElement.getBoundingClientRect();
			const targetBottom = offsetTargetBox.top + scrollY + offsetTargetBox.height;
			const headerOffset = adminBarHeight + this.offset + this.box.height / 2;
			return targetBottom - headerOffset;
		}

		return 0;
	}

	updatePageOffset() {
		const $page = $( '#page' );
		const $hero = $( '.has-hero .novablocks-hero' ).first().find( '.novablocks-hero__foreground' );

		$page.css( 'paddingTop', this.visibleHeaderHeight + this.offset + 'px' );
		$hero.css( 'marginTop', this.offset + 'px' );
	}

	createMobileHeader() {
		if ( this.createdMobileHeader ) return;

		const $mobileHeader = $( '.site-header--mobile' );

		if ( $mobileHeader.length ) {
			this.$mobileHeader = $mobileHeader;
			this.createdMobileHeader = true;
			return;
		}

		this.$mobileHeader = $( '<div class="site-header--mobile">' );

		$( '.c-branding' ).first().clone().appendTo( this.$mobileHeader );
		$( '.menu-item--cart' ).first().clone().appendTo( this.$mobileHeader );

		this.$mobileHeader.insertAfter( this.$toggle );
		this.createdMobileHeader = true;
	}

	render( inversed ) {
		if ( ! this.element ) return;

		const { scrollY } = GlobalService.getProps();
		const scrolled = scrollY > this.scrollOffset;

		if ( inversed !== this.inversed ) {
			this.$header.toggleClass( 'site-header--normal', ! inversed );
			this.inversed = inversed;
		}

		if ( scrolled !== this.scrolled ) {
			this.$header.toggleClass( 'site-header--scrolled', scrolled );
			this.scrolled = scrolled;
		}
	}
}

export default Header;
