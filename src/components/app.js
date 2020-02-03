import $ from 'jquery';

import { insideHalf, debounce } from "../utils";
import GlobalService from './globalService';
import Hero from './hero';
import CommentsArea from './commentsArea';
import Header from './header';
import Navbar from "./navbar";

export default class App {

	constructor() {
		this.initializeHero();
		this.initializeHeader();
		this.initializeNavbar();
		this.initializeImages();
		this.initializeCommentsArea();
		this.initializeReservationForm();

		// trigger resize
		GlobalService.registerObserverCallback( function( mutationList ) {
			$( window )
				.trigger( 'orientationchange' )
				.trigger( 'resize' );
		} );

		GlobalService.registerRender( this.render.bind( this ) );
	}

	render() {
		const { scrollY, adminBarHeight } = GlobalService.getProps();

		const header = this.header;
		const HeroCollection = this.HeroCollection;

		const overlap = HeroCollection.some( function( hero ) {
			return insideHalf( {
				x: header.box.x,
				y: header.box.y + scrollY,
				width: header.box.width,
				height: header.box.height,
			}, {
				x: hero.box.x,
				y: hero.box.y,
				width: hero.box.width,
				height: hero.box.height,
			} );
		} );

		header.render( overlap );
	}

	initializeImages() {
		const showLoadedImages = this.showLoadedImages.bind( this );
		showLoadedImages();

		GlobalService.registerObserverCallback( function( mutationList ) {
			$.each( mutationList, ( i, mutationRecord ) => {
				$.each( mutationRecord.addedNodes, ( j, node ) => {
					const nodeName = node.nodeName && node.nodeName.toLowerCase();
					if ( 'img' === nodeName || node.childNodes.length ) {
						showLoadedImages( node );
					}
				} );
			} );
		} );
	}

	initializeReservationForm() {
		GlobalService.registerObserverCallback( function( mutationList ) {
			$.each( mutationList, ( i, mutationRecord ) => {
				$.each( mutationRecord.addedNodes, ( j, node ) => {
					const $node = $( node );
					if ( $node.is( '#ot-reservation-widget' ) ) {
						$node.closest( '.novablocks-opentable' ).addClass( 'is-loaded' );
					}
				} )
			} );
		} );
	}

	showLoadedImages( container = document.body ) {
		$( container ).imagesLoaded().progress( ( instance, image ) => {
			const className = image.isLoaded ? 'is-loaded' : 'is-broken';
			$( image.img ).addClass( className );
		} );
	}

	initializeHero() {
		const heroElements = document.getElementsByClassName( 'novablocks-hero' );
		const heroElementsArray = Array.from( heroElements );

		this.HeroCollection = heroElementsArray.map( element => new Hero( element ) );
		this.firstHero = heroElementsArray[0];
	}

	initializeCommentsArea() {
		const $commentsArea = $( '.comments-area' );

		if ( $commentsArea.length ) {
			this.commentsArea = new CommentsArea( $commentsArea.get(0) );
		}
	}

	initializeHeader() {
		const $header = $( '.site-header' );

		if ( $header.length ) {
			this.header = new Header( $header.get(0) );
		}
	}

	initializeNavbar() {
		this.navbar = new Navbar();
	}
}
