import $ from 'jquery';
import { debounce, hasTouchScreen } from '../utils';

class GlobalService {

	constructor() {
		this.props = {};
		this.newProps = {};
		this.renderCallbacks = [];
		this.resizeCallbacks = [];
		this.observeCallbacks = [];
		this.scrollCallbacks = [];
		this.currentMutationList = [];
		this.frameRendered = true;
		this.useOrientation = hasTouchScreen() && 'orientation' in window;

		this._init();
	}

	_init() {
		const $window = $( window );
		const updateProps = this._updateProps.bind( this );
		const renderLoop = this._renderLoop.bind( this );

		updateProps();

		$( updateProps );

		this._bindOnResize();
		this._bindOnScroll();
		this._bindOnLoad();
		this._bindObserver();
		this._bindCustomizer();

		requestAnimationFrame( renderLoop );
	}

	_bindOnResize() {
		const $window = $( window );
		const updateProps = this._updateProps.bind( this );

		if ( this.useOrientation ) {
			$window.on( 'orientationchange', () => {
				$window.one( 'resize', updateProps );
			} );
		} else {
			$window.on( 'resize', updateProps );
		}
	}

	_bindOnScroll() {
		$( window ).on( 'scroll', this._updateScroll.bind( this ) );
	}

	_bindOnLoad() {
		$( window ).on( 'load', this._updateProps.bind( this ) );
	}

	_bindObserver() {
		const self = this;
		const updateProps = this._updateProps.bind( this );
		const observeCallback = this._observeCallback.bind( this );

		const observeAndUpdateProps = () => {
			observeCallback();
			self._updateProps( true );
			self.currentMutationList = [];
		};

		const debouncedObserveCallback = debounce( observeAndUpdateProps, 300 );

		if ( ! window.MutationObserver ) {
			return;
		}

		const observer = new MutationObserver( function( mutationList ) {
			self.currentMutationList = self.currentMutationList.concat( mutationList );
			debouncedObserveCallback();
		} );

		observer.observe( document.body, {
			childList: true,
			subtree: true
		} );
	}

	_bindCustomizer() {
		if ( typeof wp !== "undefined" && typeof wp.customize !== "undefined" ) {
			if ( typeof wp.customize.selectiveRefresh !== "undefined" ) {
				wp.customize.selectiveRefresh.bind( 'partial-content-rendered', this._updateProps.bind( this ) );
			}
			wp.customize.bind( 'change', this._updateProps.bind( this ) );
		}
	}

	_updateProps( force = false ) {
		this._updateSize( force );
		this._updateScroll( force );
	}

	_observeCallback() {
		const mutationList = this.currentMutationList;

		$.each(this.observeCallbacks, function( i, fn ) {
			fn( mutationList );
		});
	}

	_renderLoop() {
		if ( ! this.frameRendered ) {
			this._renderCallback();
			this.frameRendered = true;
		}
		window.requestAnimationFrame( this._renderLoop.bind( this ) );
	}

	_renderCallback() {
		const passedArguments = arguments;
		$.each( this.renderCallbacks, function( i, fn ) {
			fn( ...passedArguments );
		} );
	}

	_resizeCallback() {
		const passedArguments = arguments;
		$.each( this.resizeCallbacks, function( i, fn ) {
			fn( ...passedArguments );
		} );
	}

	_scrollCallback() {
		const passedArguments = arguments;
		$.each( this.scrollCallbacks, function( i, fn ) {
			fn( ...passedArguments );
		} );
	}

	_updateScroll( force = false ) {
		this.newProps = Object.assign( {}, this.newProps, {
			scrollY: window.pageYOffset,
			scrollX: window.pageXOffset,
		} );

		this._shouldUpdate( this._scrollCallback.bind( this ) );
	}

	_updateSize( force = false ) {
		const body = document.body;
		const html = document.documentElement;
		const bodyScrollHeight = Math.max( body.scrollHeight, body.offsetHeight, html.clientHeight );
		const htmlScrollHeight = Math.max( html.scrollHeight, html.offsetHeight );

		this.newProps = Object.assign( {}, this.newProps, {
			scrollHeight: Math.max( bodyScrollHeight, htmlScrollHeight ),
			adminBarHeight: this.getAdminBarHeight(),
			windowWidth: this.useOrientation && window.screen && window.screen.availWidth || window.innerWidth,
			windowHeight: this.useOrientation && window.screen && window.screen.availHeight || window.innerHeight,
		} );

		this._shouldUpdate( this._resizeCallback.bind( this ) );
	}

	_shouldUpdate( callback, force = false ) {

		if ( this._hasNewProps() || force ) {
			this.props = Object.assign( {}, this.props, this.newProps );
			this.newProps = {};
			this.frameRendered = false;

			if ( typeof callback === "function" ) {
				callback();
			}
		}
	}

	_hasNewProps() {
		return Object.keys( this.newProps ).some( key => {
			return this.newProps[key] !== this.props[key];
		} )
	}

	getAdminBarHeight() {
		const adminBar = document.getElementById( 'wpadminbar' );

		if ( adminBar ) {
			const box = adminBar.getBoundingClientRect();
			return box.height;
		}

		return 0;
	}

	registerOnResize( fn ) {
		if ( typeof fn === "function" && this.resizeCallbacks.indexOf( fn ) < 0 ) {
			this.resizeCallbacks.push( fn );
		}
	}

	registerOnScroll( fn ) {
		if ( typeof fn === "function" && this.scrollCallbacks.indexOf( fn ) < 0 ) {
			this.scrollCallbacks.push( fn );
		}
	}

	registerObserverCallback( fn ) {
		if ( typeof fn === "function" && this.observeCallbacks.indexOf( fn ) < 0 ) {
			this.observeCallbacks.push( fn );
		}
	}

	registerRender( fn ) {
		if ( typeof fn === "function" && this.renderCallbacks.indexOf( fn ) < 0 ) {
			this.renderCallbacks.push( fn );
		}
	}

	getProps() {
		return this.props;
	}
}

export default new GlobalService();
