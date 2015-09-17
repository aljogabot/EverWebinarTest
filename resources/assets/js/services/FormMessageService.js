function FormMessageService() {};

FormMessageService.prototype = {

	element : false,

	setElement : function( $form ) {
		this.element = $form.find( '.alert' );
	},

	error : function( $message ) {
		this.normal();
		this.element.addClass( 'alert-danger' ).html( $message );
	},

	success : function( $message ) {
		this.normal();
		this.element.addClass( 'alert-success' ).html( $message );
	},

	notify : function( $message ) {
		this.normal();
		this.element.addClass( 'alert-info' ).html( $message );
	},

	normal : function() {
		this.element.attr( 'class', 'alert' );
	}

};

var $FormMessageService;

$( document ).ready(
	function() {
		$FormMessageService = new FormMessageService();		
	}
);