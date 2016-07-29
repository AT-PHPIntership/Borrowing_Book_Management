<!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top maumenu" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">{!! trans('labels.tog_nav') !!}</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" id="name" href="{!! route('/') !!}">{!! trans('labels.title_home') !!}</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav" id="menu">
                    <li>
                        <a href="{!! route('/') !!}" title="{!! trans('labels.home') !!}">{!! trans('labels.home') !!}</a>
                    </li>
                    @if(Auth::check())
                    <li>
                        <a href="{!! route('borrow.index') !!}" title="{!! trans('user.borrow_list') !!}" >{!! trans('user.borrow_list') !!}</a>
                    </li>
                    <li>
                        <a href="{!! route('profile.show',Auth::guard('web')->user()->id) !!}" title="{!! trans('user.profile') !!}">{!! trans('user.profile') !!}</a>
                    </li>
                    @endif
                    <li>
                        <a href="#" title="{!! trans('labels.contact') !!}">{!! trans('labels.contact') !!}</a>
                    </li>
                    <li id="search">
                        {!! Form::open(['class' => 'navbar-form navbar-left', 'role' => 'search', 'route' => 'search', 'method' => 'GET']) !!}
                        <div class="form-group">
                            {!! Form::text('valuesearch',null, ['class' => 'form-control', 'id' => 'search-input', 'placeholder' => trans('labels.search')]) !!}
                        </div>
                        {{ Form::submit(trans('labels.search'),['class' => 'btn btn-success']) }}
                        {!!Form::close() !!}
                    </li>
                </ul>
                @if (route('login') != Request::url())
                    @if(Auth::check())
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                @if(Auth::user()->image == null)
                                <img class="user-image" src="{{ url(config('path.img_default').'profile_default.png') }}">
                                @else
                                <img class="user-image" src="{{ url(config('path.upload_user').Auth::user()->image) }}">
                                @endif
                                {{ Auth::guard('web')->user()->username }} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('profile.show',Auth::guard('web')->user()->id) }}">{!! trans('user.profile') !!}</a></li>
                                <li><a href="{{ route('getChangePassword') }}">{!! trans('user.change_password') !!}</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="{{ route('logout') }}" title="{!! trans('labels.logout') !!}">{!! trans('labels.logout') !!}</a></li>
                            </ul>
                         </li>
                    </ul>
                    @else
                        <ul id="right" class="nav navbar-nav navbar-right">
                            <li id="log"><a href="{!! route('login') !!}" title="{!! trans('labels.login_user') !!}">{!! trans('labels.login_user') !!}</a></li>
                        </ul>
                    @endif
                @endif
            </div>
            
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>