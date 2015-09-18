<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">

        <title>{{ $pageTitle }}</title>

        <!-- styles for this layout -->
        {{ HTML::style( 'css/app-all.css' ) }}
    </head>

    <body>

        <div class="container" id="signin-container">

            @include( 'authentication.login' )

        </div> <!-- /container -->

        <div class="container" id="register-container" style="display: none;">

            @include( 'authentication.register' )

        </div> <!-- /container -->

        @include( 'blocks/js-config' )
        
        {{ HTML::script( 'js/app-all.js' ) }}

    </body>
</html>