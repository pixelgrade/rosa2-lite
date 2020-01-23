import $ from 'jquery';

export default class CommentsArea {

	constructor( element ) {
		this.$element = $( element );
		this.$checkbox = this.$element.find( '.c-comments-toggle__checkbox' );
		this.$content = this.$element.find( '.comments-area__content' );
		this.$contentWrap = this.$element.find( '.comments-area__wrap' );

		// overwrite CSS that hides the comments area content
		this.$contentWrap.css( 'display', 'block' );

		this.$checkbox.on( 'change', this.onChange.bind( this ) );

		this.checkWindowLocationComments();
	}

	onChange() {
		this.toggle( false );
	}

	toggle( instant = false ) {
		const $contentWrap = this.$contentWrap;
		const isChecked = this.$checkbox.prop( 'checked' );
		const newHeight = isChecked ? this.$content.outerHeight() : 0;

		if ( instant ) {
			$contentWrap.css( 'height', newHeight );
		} else {
			$contentWrap.css( 'height', newHeight );
			if ( isChecked ) {
				$contentWrap.css( 'height', '' );
			}
		}
	}

	checkWindowLocationComments() {
		if ( window.location.href.indexOf( '#comment' ) === -1 ) {
			this.$checkbox.prop( 'checked', false );
			this.toggle( true );
		}
	}
}
