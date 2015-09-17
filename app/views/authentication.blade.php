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

            <form class="form-signin" name="login-form" method="POST" action="/login">

                <h2 class="form-signin-heading">Please sign in</h2>
                <div class="alert"></div>

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Email Address" required autofocus>    
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>    
                </div>
                
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember_me" value="TRUE"> Remember me
                    </label>
                </div> 
                
                <div class="form-group">
                    Not Yet A Member?
                    <a href="javascript:void(0);" class="go-to-registration">Please Register Here</a>
                </div>
                
                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>

                <br />

                <div class="pull-right col-md-5">
                    <a href="{{ $facebook_url }}"><img src="images/facebook-connect-button.png" width="200" /></a>
                    <a href="{{ $github_url }}"><img src="images/github-connect-button.png" width="200" /></a>
                </div>

            </form>

        </div> <!-- /container -->

        <div class="container" id="register-container" style="display: none;">

            <form class="form-register" name="register-form" method="POST" action="/register">

                <h2 class="form-signin-heading">Registration</h2>
                <div class="alert"></div>

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Email Address" required autofocus>    
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Name" required autofocus>    
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>    
                </div>
                
                <div class="form-group">
                    Already A Member?
                    <a href="javascript:void(0);" class="go-to-signin">Please Sign In Here</a>
                </div>
                
                <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>

            </form>

        </div> <!-- /container -->

        @include( 'blocks/js-config' )
        
        {{ HTML::script( 'js/app-all.js' ) }}

        <!-- Page level scripts -->
        {{ HTML::script( 'js/views/authentication.js' ) }}
    </body>
</html>