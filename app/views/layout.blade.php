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

        @include( 'blocks/navigation' )

        <div class="container theme-showcase" role="main" style="padding-top: 100px;">
            @yield( 'content' )
        </div>
        
        @include( 'blocks/js-config' )

        {{ HTML::script( 'js/app-all.js' ) }}

        <!-- Page level scripts -->
        @section( 'page-level-scripts' )@show

        @include( 'blocks/logout' )

    </body>
</html>