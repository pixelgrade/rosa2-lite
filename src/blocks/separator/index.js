wp.domReady( () => {

	wp.blocks.unregisterBlockStyle( 'core/separator', 'default' );
	wp.blocks.unregisterBlockStyle( 'core/separator', 'wide' );
	wp.blocks.unregisterBlockStyle( 'core/separator', 'dots' );

	wp.blocks.registerBlockStyle( 'core/separator', {
		name: 'decorative',
		label: 'Decorative',
	} );

	wp.blocks.registerBlockStyle( 'core/separator', {
		name: 'simple',
		label: 'Simple',
	} );

	wp.blocks.registerBlockStyle( 'core/separator', {
		name: 'elaborate',
		label: 'Elaborate',
	} );

} );
