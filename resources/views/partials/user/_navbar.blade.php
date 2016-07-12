<!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top maumenu" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" id="name" href="#">Borror Book</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav" id="menu">
                    <li>
                        <a href="#" title="Home">Home</a>
                    </li>
                    @if(Auth::check())
                    <li>
                        <a href="#" title="BorrowList" >Borrow List</a>
                    </li>
                    <li>
                        <a href="#" title="Profile">Profile</a>
                    </li>
                    @endif
                    <li>
                        <a href="#" title="Contac">Contact</a>
                    </li>
                    <li id="search">
                        <form class="navbar-form navbar-left"  role="search">
                        <div class="form-group">
                            <input id="search-input" type="text" class="form-control" placeholder="Search" >
                        </div>
                            <button type="submit" class="btn btn-success" title="Search">Search</button>
                        </form>
                    </li>
                </ul>
                @if(Auth::check())
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Username <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Password change</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#" title="Log Out">Log Out</a></li>
                        </ul>
                     </li>
                </ul>
                @else
                    <ul id="right" class="nav navbar-nav navbar-right">
                        <li id="log"><a data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" id="login" href="#" title="Login">Log in</a></li>
                    </ul>
                @endif
            </div>
            
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <style type="text/css">
        
    </style>