<!-- Navigation -->
    <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">Forumm</a>
            </div>



            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    @if(!Auth::check())
                        {{--Register--}}
                        <li>
                            <a href="/register">Register</a>
                        </li>
                        {{--Login--}}
                        <li>
                            <a href="/login">Login</a>
                        </li>                        
                    @endif 

                    @if(Auth::check())
                        <li>
                            {{ HTML::linkAction('UserController@logout','Logout') }}
                        </li> 
                        <li>
                            <a href="/create">Create</a>
                        </li>
                    @endif                                           
                </ul>
                <form action="{{ action('PostController@search') }}" class="navbar-form pull-right" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search Posts" name="srch-term">
                            <div class="input-group-btn">
                                <button onclick="submit();" class="btn btn-default" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                </form>
            </div>
            
            <!-- /.navbar-collapse -->
        <!-- /.container -->
    </nav>
