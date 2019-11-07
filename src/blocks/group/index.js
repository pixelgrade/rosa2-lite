wp.domReady( () => {

	wp.blocks.registerBlockStyle( 'core/group', {
		name: 'dark',
		label: 'Dark',
	} );

	wp.blocks.registerBlockStyle( 'core/group', {
		name: 'darker',
		label: 'Darker',
	} );

	wp.blocks.registerBlockStyle( 'core/group', {
		name: 'accent',
		label: 'Accent',
	} );

} );
