function BootstrapModalService() {
	this.construct();
};

BootstrapModalService.prototype = {

	construct : function() {
		this.initialize();
	},

	initialize : function() {

		$( 'body' ).append( '<div id="modal-container"></div>' );

	},

	load : function() {

	},

	unload : function() {

	},

	setContent : function( $content ) {
		$( 'div#modal-container' ).html( $content );
	},

	getContent : function() {
		return $( 'div#modal-container' ).html();
	}
};

var $BootstrapModalService;

$( document ).ready(
	function() {
		$BootstrapModalService = new BootstrapModalService();
	}
);