function UrlService() {};

UrlService.prototype = {

	redirect : function( $url ) {

	},

	redirectOutside : function() {

	},

	base : function() {
		return '';
	}

};

var $Url;

$( document ).ready(
	function() {
		$url = new UrlService();
	}
);