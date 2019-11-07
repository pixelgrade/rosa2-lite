wp.domReady( () => {

	wp.blocks.unregisterBlockStyle( 'core/button', 'fill' );
	wp.blocks.unregisterBlockStyle( 'core/button', 'outline' );
	wp.blocks.unregisterBlockStyle( 'core/button', 'squared' );

	wp.blocks.registerBlockStyle( 'core/button', {
		name: 'primary',
		label: 'Primary',
		isDefault: true,
	} );

	wp.blocks.registerBlockStyle( 'core/button', {
		name: 'secondary',
		label: 'Secondary',
	} );

	wp.blocks.registerBlockStyle( 'core/button', {
		name: 'text',
		label: 'Text',
	} );

} );
