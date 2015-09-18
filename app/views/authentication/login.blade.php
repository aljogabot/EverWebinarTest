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