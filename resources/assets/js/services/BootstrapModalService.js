function BootstrapModalService() {
	this.construct();
};

BootstrapModalService.prototype = {

	modal : false,

	construct : function() {
		this.initialize();
	},

	initialize : function() {

		$( 'body' ).append( '<div id="modal-container" class="modal fade"><div class="modal-dialog"></div></div></div>' );

	},

	load : function( callback ) {
		this.modal = $( '#modal-container' ).modal( 'show' );

		$( 'div#modal-container' ).on( 'shown.bs.modal', function (e) {
  			callback();
		});

		return this;
	},

	unload : function() {
		$( 'div#modal-container .modal-dialog' ).html( '' );
		this.modal.modal( 'hide' );
		$( 'div#modal-container' ).unbind( 'shown' );
	},

	setContent : function( $content ) {
		$( 'div#modal-container .modal-dialog' ).html( $content );
		return this;
	},

	getContent : function() {
		return $( 'div#modal-container .modal-dialog' ).html();
	}
};

var $BootstrapModalService;

$( document ).ready(
	function() {
		$BootstrapModalService = new BootstrapModalService();
	}
);