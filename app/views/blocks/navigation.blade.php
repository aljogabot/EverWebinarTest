<!-- Fixed navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ URL::route( 'home' ) }}">Contacts Application</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="{{ URL::route( 'contacts' ) }}">Contacts</a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="javascript:void(0);" class="logout-user">Logout</a>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>