var elixir = require( 'laravel-elixir' );


// Optionally change default paths:
elixir.config.assetsDir = 'assets/';
elixir.config.cssOutput = 'public/css';
elixir.config.jsOutput  = 'public/js';
elixir.config.imgOutput = 'public/images';
elixir.config.bowerDir  = 'assets/bower_components';

/**
 * Start Gulp Tasks ...
 */
elixir(
	function( $mix ) {

		// Move Dependencies to Certain Paths ...
		$mix.copy( 'resources/assets/bower_components/jquery/dist/jquery.min.js', 'resources/assets/js/libs/jquery.min.js' );

		$mix.copy( 'resources/assets/js/views', 'public/js/views' );
		$mix.copy( 'resources/assets/fonts', 'public/fonts' );
		$mix.copy( 'resources/assets/images', 'public/images' );

		$mix.styles(
			[
				'fonts.css',
				'bootstrap.min.css'
			],
			'public/css/app-all.css'
		);

		$mix.scripts(
			[
				'libs/jquery.min.js',
				'services/UrlService.js',
				'services/AjaxService.js',
				'services/FormMessageService.js',
				'services/BootstrapModalService.js'
			],
			'public/js/app-all.js'
		);

	}
);