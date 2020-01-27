/* global wp */

/**
 * WordPress dependencies.
 */
const { Component } = wp.element;
const { compose } = wp.compose;
const { withSelect } = wp.data;
const { registerPlugin } = wp.plugins;

/**
 * Generate a valid CSS class name from a string.
 *
 * @param {string} string The string to validate.
 * @return string Correct CSS class name.
 */
const getCssClassName = ( string ) => {
	const dot = string.replace( /\./g, '-' );
	const other = dot.replace( /[!\"#$%&'\(\)\*\+,\/:;<=>\?\@\[\\\]\^`\{\|\}~]/g, '' );

	return `page-template-${ other }`;
};

class UpdateBody extends Component {
	/**
	 * Add initial class.
	 */
	componentDidMount() {
		const wrapper = document.querySelector( '.editor-styles-wrapper' );

		if ( wrapper && this.props.selectedTemplate ) {
			wrapper.classList.add( getCssClassName( this.props.selectedTemplate ) );
		}
	}

	/**
	 * Update when page template has changed.
	 *
	 * @param {Object} prevProps Previous properties.
	 */
	componentDidUpdate( prevProps ) {
		const wrapper = document.querySelector( '.editor-styles-wrapper' );

		wrapper.classList.remove( getCssClassName( prevProps.selectedTemplate ) );

		if ( this.props.selectedTemplate ) {
			wrapper.classList.add( getCssClassName( this.props.selectedTemplate ) );
		}
	}

	render() {
		return null;
	}
}

const EditorBodyClass = compose(
	withSelect( ( select ) => {
		const { getEditedPostAttribute } = select( 'core/editor' );

		return {
			selectedTemplate: getEditedPostAttribute( 'template' ),
		};
	} ),
)( UpdateBody );

registerPlugin( 'bigbox-editor-page-template-class', {
	render: EditorBodyClass,
} );
